<?php

use App\Http\Controllers\PlantController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');

// Route::prefix('plant')->group(function () {
//     Route::get('/', [PlantController::class, 'index'])->name('plant.index');
//     Route::get('{id}', [PlantController::class, 'show'])->name('plant.show');
//     Route::delete('{id}/delete', [PlantController::class, 'destroy'])->name('plant.delete');
// });

Route::resource('plants', PlantController::class);