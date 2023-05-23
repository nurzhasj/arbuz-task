<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;

final class UserRepository
{
//    public function getCurrentUser(): ?User
//    {
//        return Auth::user();
//    }

    public function subscribeToPlan(User $user, int $planId): User
    {
        $user->subscription_plan_id = $planId;
        $user->save();

        return $user;
    }
}
