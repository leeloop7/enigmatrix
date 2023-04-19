<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PlannerController;
use App\Http\Controllers\SuggestionController;
use App\Http\Controllers\AdministrationController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use App\Http\Livewire\Dropdowns;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\RecordsController;
use App\Http\Livewire\ProjectDropdown;
use App\Http\Livewire\ProjectStatistics;
use App\Http\Controllers\ReportsController;


use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'numbers'])
    ->middleware(['auth', 'verified'])
    ->name('home');

Route::get('/planner', [PlannerController::class, 'plans'])
    ->middleware(['auth', 'verified'])
    ->name('planner');

Route::get('/statistics', function () {
    return view('statistics');
    })->name('statistics');

Route::get('/statistics/projects/{projectId}', [StatisticsController::class, 'projectStatistics'])
    ->name('project-statistics');

Route::get('/suggestion', [SuggestionController::class, 'suggestion'])
    ->middleware(['auth', 'verified'])
    ->name('suggestion');

Route::post('/suggestions', [SuggestionController::class, 'store'])
    ->name('suggestions.store');

Route::get('/administration', [AdministrationController::class, 'administration'])
    ->middleware(['auth', 'verified', 'admin'])
    ->name('administration');

Route::get('/preview-events', [ExcelController::class, 'previewEvents'])
    ->name('preview-events');

Route::post('/administration', [AdministrationController::class, 'storeProject'])
    ->middleware(['auth', 'verified', 'admin'])
    ->name('projects.store');

Route::post('/administration/store-customer', [AdministrationController::class, 'storeCustomer'])
    ->middleware(['auth', 'verified', 'admin'])
    ->name('customers.store');

Route::get('/records', RecordsController::class)
    ->middleware(['auth', 'verified'])
    ->name('records');

Route::get('/reports', [ReportsController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('reports');

Route::post('/reports', [ReportsController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('reports.store');

Route::get('dropdowns', Dropdowns::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

Route::post('/events', [EventController::class, 'store'])
    ->middleware(['auth', 'verified']);

Route::get('/events/{event}/edit', [EventController::class, 'edit'])
    ->name('events.edit');

Route::put('/events/{event}', [EventController::class, 'update'])
    ->name('events.update');

Route::delete('/events/{event}', [EventController::class, 'destroy'])
    ->middleware(['auth', 'verified']);

require __DIR__ . '/auth.php';
