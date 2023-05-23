<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Core\DTOs\SubscribeToPlanRequestDTO;
use App\Support\Requests\BaseFormRequest;
use Carbon\CarbonImmutable;
use Illuminate\Support\Arr;

final class SubscribeToPlanRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'subscription_plan_id' =>
                'required|int|exists:subscription_plans,id',
            'delivery_day' =>
                'required|string',
            'delivery_time' =>
                'required|date_format:H:i',
            'user_id' =>
                'required|int|exists:users,id',
            'address_id' =>
                'required|int|exists:addresses,id'
        ];
    }

    public function getDto(): SubscribeToPlanRequestDTO
    {
        $validated = $this->validated();

        return new SubscribeToPlanRequestDTO(
            subscriptionPlanId: (int) Arr::get($validated, 'subscription_plan_id'),
            deliveryDay: Arr::get($validated, 'delivery_day'),
            deliveryTime: CarbonImmutable::createFromFormat('H:i', Arr::get($validated, 'delivery_time')),
            userId: (int) Arr::get($validated, 'user_id'),
            addressId: (int) Arr::get($validated, 'address_id')
        );
    }
}
