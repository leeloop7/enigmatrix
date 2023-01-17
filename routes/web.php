<?php

use App\Http\Controllers\AdminEventController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PlannerController;

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Dropdowns;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [DashboardController::class, 'numbers'])->middleware(['auth', 'verified'])->name('home');
Route::get('/planner', [PlannerController::class, 'plans'])->middleware(['auth', 'verified'])->name('planner');


Route::get('dropdowns', Dropdowns::class);



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::post('/events', [EventController::class, 'store'])->middleware(['auth', 'verified']);
Route::get('/events/edit/{event}', [EventController::class, 'edit'])->middleware(['auth', 'verified']);
Route::put('/events/edit/{event}', [EventController::class, 'update'])->middleware(['auth', 'verified']);
Route::delete('/events/{event}', [EventController::class, 'destroy'])->middleware(['auth', 'verified']);


require __DIR__ . '/auth.php';
