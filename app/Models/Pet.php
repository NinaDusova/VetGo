<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
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
 * @property string|null $name
 * @property string $species
 * @property string|null $birth_day
 * @property int $neutered
 * @property string|null $chip
 * @property string|null $breed
 * @property float|null $weight
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $photo
 * @property string $gender
 * @property int|null $doctor_id
 * @property-read Doctor|null $doctor
 * @property-read User $user
 * @method static Builder<static>|Pet newModelQuery()
 * @method static Builder<static>|Pet newQuery()
 * @method static Builder<static>|Pet query()
 * @method static Builder<static>|Pet whereBirthDay($value)
 * @method static Builder<static>|Pet whereBreed($value)
 * @method static Builder<static>|Pet whereChip($value)
 * @method static Builder<static>|Pet whereCreatedAt($value)
 * @method static Builder<static>|Pet whereDoctorId($value)
 * @method static Builder<static>|Pet whereGender($value)
 * @method static Builder<static>|Pet whereId($value)
 * @method static Builder<static>|Pet whereName($value)
 * @method static Builder<static>|Pet whereNeutered($value)
 * @method static Builder<static>|Pet wherePhoto($value)
 * @method static Builder<static>|Pet whereSpecies($value)
 * @method static Builder<static>|Pet whereUpdatedAt($value)
 * @method static Builder<static>|Pet whereUserId($value)
 * @method static Builder<static>|Pet whereWeight($value)
 * @mixin Eloquent
 */
class Pet extends Model
{
    use HasFactory;

    protected $table = "pets";

    protected $fillable = [
        'name',
        'species',
        'gender',
        'birth_day',
        'neutered',
        'chip',
        'breed',
        'weight',
        'user_id',
        'photo',
        'doctor_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }

    public function investigations(): HasMany
    {
        return $this->hasMany(Investigation::class);
    }

}
