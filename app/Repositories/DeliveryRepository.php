<?php

namespace App\Repositories;

use App\Models\Delivery;
use App\Models\User;
use Carbon\CarbonImmutable;

final class DeliveryRepository
{
    public function createDelivery(User $user, int $subscriptionPlanId, string $deliveryDay, CarbonImmutable $deliveryTime, int $addressId): Delivery
    {
        $delivery = new Delivery;

        $delivery->user_id = $user->id;
        $delivery->subscription_plan_id = $subscriptionPlanId;
        $delivery->delivery_day = $deliveryDay;
        $delivery->delivery_time = $deliveryTime;
        $delivery->address_id = $addressId;

        $delivery->save();

        return $delivery;
    }
}
