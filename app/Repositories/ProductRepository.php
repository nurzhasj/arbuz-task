<?php

namespace App\Repositories;

use App\Models\SubscriptionPlan;
use Illuminate\Database\Eloquent\Collection;

final class ProductRepository
{
    public function getProductsByPlanId(int $planId): Collection
    {
        $subscriptionPlan = SubscriptionPlan::with('products')->find($planId);

        return $subscriptionPlan->products;
    }
}
