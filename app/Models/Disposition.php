<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disposition extends Model
{
    use HasFactory;

    protected $table = 'disposition';

    protected $fillable = ['disposition_name'];

    public function animalBites()
    {
        return $this->hasMany(AnimalBite::class);
    }
}
