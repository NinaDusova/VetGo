<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $photo
 * @property string $gender
 * @property int|null $doctor_id
 * @property-read \App\Models\Doctor|null $doctor
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pet query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pet whereBirthDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pet whereBreed($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pet whereChip($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pet whereDoctorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pet whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pet whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pet whereNeutered($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pet wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pet whereSpecies($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pet whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pet whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pet whereWeight($value)
 * @mixin \Eloquent
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
