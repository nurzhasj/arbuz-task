<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string $name
 * @property float $price
 * @property string $description
 * @property int $duration
 * @property Carbon|string $created_at
 * @property Carbon|string $updated_at
 *
 * @property-read Product[]|Collection $products
 */
final class SubscriptionPlan extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'price',
        'description',
        'duration'
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(
            Product::class,
            'subscription_products',
            'subscription_id',
            'product_id'
        );
    }
}
