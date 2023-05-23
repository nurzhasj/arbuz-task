<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $subscription_plan_id
 * @property int $product_id
 * @property float $weight
 * @property int $count
 * @property Carbon|string $created_at
 * @property Carbon|string $updated_at
 *
 * @property-read Product $productCategory
 */
final class SubscriptionProduct extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'weight',
        'count',
        'subscription_plan_id',
        'product_id',
    ];
}
