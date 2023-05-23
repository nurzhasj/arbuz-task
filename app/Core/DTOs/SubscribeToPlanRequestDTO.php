<?php

declare(strict_types=1);

namespace App\Core\DTOs;

use Carbon\CarbonImmutable;

final class SubscribeToPlanRequestDTO
{
    public function __construct(
        public int $subscriptionPlanId,
        public string $deliveryDay,
        public CarbonImmutable $deliveryTime,
        public int $userId,
        public int $addressId
    ){
    }
}
