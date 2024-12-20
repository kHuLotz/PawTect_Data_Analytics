<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalBite extends Model
{
    use HasFactory;

    protected $table = 'animal_bites';

    protected $fillable = [
        'bite_date', 'victim_id', 'wherebitten_id', 'species_id', 'gender_id',
        'color_id', 'clinic_id', 'results_id', 'disposition_id', 
        'head_Sent_date', 'quarantine_date', 'release_date',
    ];

    public function victim()
    {
        return $this->belongsTo(Victim::class);
    }

    public function biteLocation()
    {
        return $this->belongsTo(BiteLocation::class, 'wherebitten_id');
    }

    public function species()
    {
        return $this->belongsTo(Species::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }

    public function results()
    {
        return $this->belongsTo(Results::class);
    }

    public function disposition()
    {
        return $this->belongsTo(Disposition::class);
    }
}
