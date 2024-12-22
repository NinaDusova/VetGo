<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
