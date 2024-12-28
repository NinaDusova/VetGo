<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investigation extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'pet_id',
        'description',
        'date'
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }
}
