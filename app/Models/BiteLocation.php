<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiteLocation extends Model
{
    use HasFactory;

    protected $table = 'bite_location';

    protected $fillable = ['bodypart_name'];

    public function animalBites()
    {
        return $this->hasMany(AnimalBite::class, 'wherebitten_id');
    }
}
