<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;

    protected $table = 'clinic';

    protected $fillable = ['clinic_name', 'contact_number', 'brgy_id'];

    public function barangay()
    {
        return $this->belongsTo(Barangay::class, 'brgy_id');
    }

    public function animalBites()
    {
        return $this->hasMany(AnimalBite::class);
    }
}
