<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Victim extends Model
{
     use HasFactory;

    protected $table = 'victim';

    protected $fillable = ['victim_fullname', 'victim_birthdate', 'victim_gender', 'brgy_id'];

    public function barangay()
    {
        return $this->belongsTo(Barangay::class, 'brgy_id');
    }
}
