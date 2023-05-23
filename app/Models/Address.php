<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $user_id
 * @property string $street
 * @property string $apartment_office
 * @property string $entrance
 * @property string $floor
 * @property string $intercom
 * @property Carbon|string $created_at
 * @property Carbon|string $updated_at
 *
 * @property-read Product $productCategory
 */
final class Address extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'street',
        'apartment_office',
        'entrance',
        'floor',
        'intercom'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
