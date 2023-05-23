<?php

namespace App\Repositories;

use App\Models\Inventory;
use App\Models\Product;
use App\Models\SubscriptionProduct;

final class InventoryRepository
{
    public function getInventoryByProductId(int $productId): ?Inventory
    {
        return Inventory::where('product_id', $productId)->first();
    }

    public function getSubscriptionProduct(int $subscriptionPlanId, int $productId): ?SubscriptionProduct
    {
        return SubscriptionProduct::where('subscription_plan_id', $subscriptionPlanId)
            ->where('product_id', $productId)
            ->first();
    }

    public function isProductAvailable(Product $product, int $subscriptionPlanId): bool
    {
        $inventory = $this->getInventoryByProductId($product->id);
        $subscriptionProduct = $this->getSubscriptionProduct($subscriptionPlanId, $product->id);

        if (!$inventory || !$subscriptionProduct) {
            return false;
        }

        if ($subscriptionProduct->count && $inventory->quantity >= $subscriptionProduct->count) {
            return true;
        }

        if ($subscriptionProduct->weight && $inventory->weight >= $subscriptionProduct->weight) {
            return true;
        }

        return false;
    }

    public function deductProduct(Product $product, int $subscriptionPlanId): void
    {
        $inventory = $this->getInventoryByProductId($product->id);
        $subscriptionProduct = $this->getSubscriptionProduct($subscriptionPlanId, $product->id);

        if ($subscriptionProduct->count && $inventory->quantity) {
            $inventory->quantity -= $subscriptionProduct->count;
            $inventory->save();
        }

        if ($subscriptionProduct->weight && $inventory->weight) {
            $inventory->weight -= $subscriptionProduct->weight;
            $inventory->save();
        }
    }
}
