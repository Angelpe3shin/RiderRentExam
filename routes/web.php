<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MotoDetailsController;
use App\Http\Controllers\CustomerBasketController;

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

Route::get('/', [DashboardController::class, 'index'])
    ->name('index');

Route::get('/basket', [CustomerBasketController::class, 'basket'])
    ->middleware(['auth'])
    ->name('basket');

Route::get('/moto/{id}', [MotoDetailsController:: class, 'details'])
    ->name('moto-details');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
