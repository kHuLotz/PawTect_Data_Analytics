<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{AnimalBite, Barangay, Clinic, Species};

class DashboardController extends Controller
{
    public function index()
    {
        $barangays = Barangay::all();
        $clinics = Clinic::all();
        $species = Species::all();

        return view('dashboard', compact('barangays', 'clinics', 'species'));
    }
}
