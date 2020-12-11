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

Route::resource('plant', PlantController::class, [
    'names' => [
        'index' => 'plant',
        'create' =>  'plant.create',
        'store' =>  'plant.store',
        // 'show' =>  'plant.show',
        // 'edit' =>  'plant.edit',
        'update' =>  'plant.update',
        'destroy' =>  'plant.destroy',
    ]
])->middleware(['auth:sanctum', 'verified']);