<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnimalBite;
use App\Models\Clinic;
use App\Models\Species;
use App\Models\Barangay;
use DB;

class ChartController extends Controller
{
    public function index()
    {
        $clinics = Clinic::all();
        $species = Species::all();
        $barangays = Barangay::all();

        return view('dashboard', compact('clinics', 'species', 'barangays'));
    }

    public function getChartData(Request $request)
    {
        // Fetch filters from the request
        $clinic = $request->clinic;
        $startDate = $request->startDate;
        $endDate = $request->endDate;
        $species = $request->species;
        $barangay = $request->barangay;

        // Base query for Animal Bites data
        $query = DB::table('animal_bites')
            ->join('victim', 'animal_bites.victim_id', '=', 'victim.victim_id')
            ->join('clinic', 'animal_bites.clinic_id', '=', 'clinic.clinic_id')
            ->join('species', 'animal_bites.species_id', '=', 'species.species_id')
            ->join('barangay', 'clinic.brgy_id', '=', 'barangay.id')
            ->select(
                DB::raw('COUNT(animal_bites.animalbite_id) as total_population'),
                'clinic.clinic_name',
                'species.species_name',
                'barangay.brgy_name',
                'animal_bites.bite_date',
                'animal_bites.wherebitten_id',
                'victim.victim_id'
            );

        // Apply filters if any
        if ($clinic) {
            $query->where('animal_bites.clinic_id', $clinic);
        }

        if ($startDate && $endDate) {
            $query->whereBetween('animal_bites.bite_date', [$startDate, $endDate]);
        }

        if ($species) {
            $query->where('animal_bites.species_id', $species);
        }

        if ($barangay) {
            $query->where('clinic.brgy_id', $barangay);
        }

        // Group data for different chart types
        $query->groupBy('clinic.clinic_name', 'species.species_name', 'animal_bites.bite_date', 'barangay.brgy_name', 'animal_bites.wherebitten_id', 'victim.victim_id');
        $data = $query->get();

        // Bar Chart: Total population grouped by clinic
        $barChartData = $data->groupBy('clinic_name')->map(function ($group) {
            return $group->sum('total_population');
        });

        // Line Chart: Total bites grouped by species
        $lineChartData = $data->groupBy('species_name')->map(function ($group) {
            $timeline = $group->groupBy(function ($item) {
                return date('M', strtotime($item->bite_date));
            });

            $sortedMonths = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

            $values = collect($sortedMonths)->map(function ($month) use ($timeline) {
                return $timeline->has($month) ? $timeline->get($month)->sum('total_population') : 0;
            });

            return [
                'species_name' => $group->first()->species_name,
                'values' => $values,
                'months' => $sortedMonths,
                'color' => sprintf('#%06X', mt_rand(0, 0xFFFFFF)),
            ];
        });

        // Pie Chart: Ratio of species
        $pieChartData = $data->groupBy('species_name')->map(function ($group) {
            return $group->sum('total_population');
        });

        // Radar Chart: clinic_id, species_id and victim_id counts
        $radarDataVictimClinic = DB::table('animal_bites')
            ->join('clinic', 'clinic.clinic_id', '=', 'animal_bites.clinic_id')
            ->select('clinic.clinic_name', DB::raw('count(animal_bites.victim_id) as victim_count'))
            ->groupBy('clinic.clinic_id', 'clinic.clinic_name')
            ->pluck('victim_count', 'clinic.clinic_name');

        $radarDataSpeciesClinic = DB::table('animal_bites')
            ->join('clinic', 'clinic.clinic_id', '=', 'animal_bites.clinic_id')
            ->join('species', 'species.species_id', '=', 'animal_bites.species_id')
            ->select('clinic.clinic_name', DB::raw('count(animal_bites.species_id) as species_count'))
            ->groupBy('clinic.clinic_id', 'clinic.clinic_name')
            ->pluck('species_count', 'clinic.clinic_name');

        // Return the chart data in JSON format
        return response()->json([
            'bar' => [
                'labels' => $barChartData->keys(),
                'values' => $barChartData->values(),
            ],
            'line' => [
                'labels' => $lineChartData->pluck('months')->collapse()->unique()->values(),
                'datasets' => $lineChartData->values(),
            ],
            'pie' => [
                'labels' => $pieChartData->keys(),
                'values' => $pieChartData->values(),
            ],
            'radar' => [
                'labels' => $radarDataVictimClinic->keys(),
                'datasets' => [
                    [
                        'label' => 'Victims Associated with Each Clinic',
                        'data' => $radarDataVictimClinic->values(),
                        'fill' => true,
                        'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                        'borderColor' => 'rgb(255, 99, 132)',
                        'pointBackgroundColor' => 'rgb(255, 99, 132)',
                        'pointBorderColor' => '#fff',
                        'pointHoverBackgroundColor' => '#fff',
                        'pointHoverBorderColor' => 'rgb(255, 99, 132)',
                    ],
                    [
                        'label' => 'Common Species Bites Treated at Each Clinic',
                        'data' => $radarDataSpeciesClinic->values(),
                        'fill' => true,
                        'backgroundColor' => 'rgba(30, 100, 180, 0.2)',
                        'borderColor' => 'rgb(30, 100, 180)',
                        'pointBackgroundColor' => 'rgb(30, 100, 180)',
                        'pointBorderColor' => '#fff',
                        'pointHoverBackgroundColor' => '#fff',
                        'pointHoverBorderColor' => 'rgb(30, 100, 180)',
                    ],
                ],
            ],
        ]);
    }
}
