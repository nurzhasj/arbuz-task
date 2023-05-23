<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $product_id
 * @property float|null $weight
 * @property int|null $quantity
 * @property float|null $product_weight
 * @property float $per_unit_price
 * @property float $total_price
 * @property Carbon|string $created_at
 * @property Carbon|string $updated_at
 *
 * @property-read Product $product
 */
final class Inventory extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $primaryKey = 'product_id';

    /**
     * @var string[]
     */
    protected $fillable = [
        'weight',
        'quantity',
        'product_weight',
        'per_unit_price',
        'total_price',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
