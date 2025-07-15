<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;

Route::resource('doctors', DoctorController::class);
Route::resource('patients', PatientController::class);
Route::resource('appointments', AppointmentController::class);



