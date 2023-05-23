<?php

declare(strict_types=1);

namespace App\Core\Handlers;

use App\Core\DTOs\SubscribeToPlanRequestDTO;
use App\Models\User;
use App\Repositories\DeliveryRepository;
use App\Repositories\InventoryRepository;
use App\Repositories\ProductRepository;
use App\Repositories\UserRepository;
use Exception;
use Illuminate\Support\Facades\DB;

final class SubscribeToPlanHandler
{
    public function __construct(
        private readonly UserRepository $userRepository,
        private readonly ProductRepository $productRepository,
        private readonly DeliveryRepository $deliveryRepository,
        private readonly InventoryRepository $inventoryRepository
    ) {
    }

    /**
     * @throws Exception
     */
    public function handle(SubscribeToPlanRequestDTO $dto): void
    {
        DB::beginTransaction();

        try {
            $currentUser = User::where('id', $dto->userId)->firstOrFail();

            $this->userRepository->subscribeToPlan($currentUser, $dto->subscriptionPlanId);

            $products = $this->productRepository->getProductsByPlanId($dto->subscriptionPlanId);

            foreach ($products as $product) {
                if ($this->inventoryRepository->isProductAvailable($product, $dto->subscriptionPlanId)) {
                    $this->inventoryRepository->deductProduct($product, $dto->subscriptionPlanId);
                } else {
                    // @TODO: Some kind of notifier logic
                }
            }

            $this->deliveryRepository->createDelivery(
                $currentUser,
                $dto->subscriptionPlanId,
                $dto->deliveryDay,
                $dto->deliveryTime,
                $dto->addressId
            );

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();

            throw $e;
        }
    }
}
