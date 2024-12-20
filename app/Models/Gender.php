<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;

    protected $table = 'gender';

    protected $fillable = ['gender_name'];

    public function victims()
    {
        return $this->hasMany(Victim::class, 'victim_gender', 'id');
    }

    public function animalBites()
    {
        return $this->hasMany(AnimalBite::class);
    }
}
