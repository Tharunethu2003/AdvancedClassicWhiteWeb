<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DermatologistController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/dermatologists/available', [DermatologistController::class, 'getAvailableDermatologists']);
Route::get('/dermatologists/{id}/times', [DermatologistController::class, 'getAvailableTimes']);
Route::post('/appointments', [DermatologistController::class, 'storeAppointment']);

