<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HoroscopeController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//********verificar ruta si eesta bien */
//Route::get('/horoscope', [HoroscopeController::class, 'importHoroscope']);
Route::get('/importHoroscope', [HoroscopeController::class, 'importHoroscope']);
