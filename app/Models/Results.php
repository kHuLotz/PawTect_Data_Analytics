<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Results extends Model
{
    use HasFactory;

    protected $table = 'results';

    protected $fillable = ['results_name'];

    public function animalBites()
    {
        return $this->hasMany(AnimalBite::class);
    }
}
