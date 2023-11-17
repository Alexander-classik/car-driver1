<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CarController;
use App\Http\Controllers\CarHasDriversController;
use App\Http\Controllers\DriversController;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\TypeDriverController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [CarController::class, 'index'])->name('/');
Route::get('/add-car', [CarController::class, 'add']);

Route::post('main', [CarController::class, 'store']);

Route::get('/mark', [MarkController::class, 'index']);
Route::get('/add-mark', [MarkController::class, 'add']);
Route::get('/search', [MarkController::class, 'search'])->name('search');

Route::post('mark', [MarkController::class, 'store']);

Route::get('/td', [TypeDriverController::class, 'index']);
Route::get('/add-td', [TypeDriverController::class, 'add']);

Route::post('td', [TypeDriverController::class, 'store']);

Route::get('/drivers', [DriversController::class, 'index']);
Route::get('/add-driver', [DriversController::class, 'add']);
Route::get('/search', [DriversController::class, 'search'])->name('search');
Route::get('/drivers/show/{id}', [DriversController::class, 'show']);

Route::post('drivers', [DriversController::class, 'store']);


