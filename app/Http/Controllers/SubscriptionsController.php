<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Core\Handlers\SubscribeToPlanHandler;
use App\Http\Requests\SubscribeToPlanRequest;
use Illuminate\Http\JsonResponse;
use Throwable;

final class SubscriptionsController extends Controller
{
    /**
     * @throws Throwable
     */
    public function subscribe(SubscribeToPlanRequest $request, SubscribeToPlanHandler $handler): JsonResponse
    {
        $handler->handle($request->getDto());

        return response()->json([
            'status' => 'success',
            'message' => 'Subscription made successfully. Delivery is pending.',
        ]);
    }
}
