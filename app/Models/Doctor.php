<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 *
 *
 * @property int $id
 * @property int $user_id
 * @property string $license_number
 * @property string $ordination
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, Pet> $pets
 * @property-read int|null $pets_count
 * @property-read User $user
 * @method static Builder<static>|Doctor newModelQuery()
 * @method static Builder<static>|Doctor newQuery()
 * @method static Builder<static>|Doctor query()
 * @method static Builder<static>|Doctor whereCreatedAt($value)
 * @method static Builder<static>|Doctor whereId($value)
 * @method static Builder<static>|Doctor whereLicenseNumber($value)
 * @method static Builder<static>|Doctor whereOrdination($value)
 * @method static Builder<static>|Doctor whereUpdatedAt($value)
 * @method static Builder<static>|Doctor whereUserId($value)
 * @mixin Eloquent
 */
class Doctor extends Model
{
    use HasFactory;

    protected $table = "doctors";

    protected $fillable = [
        'user_id' ,
        'license_number',
        'ordination',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function pets(): HasMany
    {
        return $this->hasMany(Pet::class);
    }
}
