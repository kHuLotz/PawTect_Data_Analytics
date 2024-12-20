<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ChartController;

Route::get('/', function () {
    return view('/dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //from the previous file
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::post('/dashboard/filter', [DashboardController::class, 'filterData']);

    // routes/web.php
    Route::get('/dashboard/filterData', [DashboardController::class, 'filterData'])->name('dashboard.filterData');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/filterData', [DashboardController::class, 'filterData']);

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::post('/dashboard/filter', [DashboardController::class, 'filterData'])->name('dashboard.filterData');

    Route::get('/chart-data', [ChartController::class, 'getChartData']);
    Route::get('/dashboard/data', [ChartController::class, 'data'])->name('dashboard.data');


    Route::get('/charts/bar', [ChartController::class, 'barChart'])->name('charts.bar');
    Route::get('/charts/line', [ChartController::class, 'lineChart'])->name('charts.line');
    Route::get('/charts/pie', [ChartController::class, 'pieChart'])->name('charts.pie');
    Route::get('/charts/polararea', [ChartController::class, 'polarAreaChart'])->name('charts.polararea');

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    
    Route::get('/dashboard/data', [ChartController::class, 'data'])->name('dashboard.data');

    Route::get('/charts-data', [ChartController::class, 'getChartData'])->name('charts.data');

    Route::get('/chart-data', [ChartController::class, 'getChartData'])->name('chart.data');

    Route::post('/radar-chart-data', [ChartController::class, 'getRadarChartData'])->name('radarChart.getData');

    Route::get('/radar-chart', [ChartController::class, 'radarChart']);

    Route::get('/charts/data', [ChartController::class, 'getChartData'])->name('charts.data');

    Route::get('/get-radar-chart-data', [ChartController::class, 'getRadarChartData']);

    Route::get('/chart/radar', [ChartController::class, 'getChartData'])->name('chart.radar');

    Route::get('/radar-chart', [ChartController::class, 'radarChart'])->name('radar.chart');
});

require __DIR__.'/auth.php';
