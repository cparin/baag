<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorPatientConnectionController;
use App\Http\Controllers\DoctorController;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::resource('/', \App\Http\Controllers\MainController::class);

Route::get('c' , [\App\Http\Controllers\GController::class,'c'])->name('c');
Route::get('wfh' , [\App\Http\Controllers\GController::class,'wfh'])->name('wfh');
Route::get('bmi' , [\App\Http\Controllers\GController::class,'bmi'])->name('bmi');
Route::get('setting', [\App\Http\Controllers\ProfileController::class,'setting'])->name('setting');


Route::get('add/{id}', [\App\Http\Controllers\GrowthController::class,'add'])->name('growth.add');
Route::resource('growth', \App\Http\Controllers\GrowthController::class);
Route::resource('profile', \App\Http\Controllers\ProfileController::class);
Route::resource('user', \App\Http\Controllers\UserController::class);

Route::get('gmenu', [\App\Http\Controllers\GController::class,'menu'])->name('g.menu');
Route::resource('g', \App\Http\Controllers\GController::class);

Route::get('logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('auth.logout');
Route::resource('auth', \App\Http\Controllers\AuthController::class);

Route::get('addmenu', [\App\Http\Controllers\MenuController::class,'addmenu'])->name('menu.add');
Route::get('selectprofile/{id}', [\App\Http\Controllers\MenuController::class,'profile'])->name('selectprofile');
Route::resource('menu', \App\Http\Controllers\MenuController::class);



// routes/web.php
//Route::middleware(['auth'])->group(function () {
    // Patient routes
Route::get('/patient/generate-qr', [DoctorPatientConnectionController::class, 'generateQrCode'])
    ->name('patient.generate.qr');

// Doctor routes
Route::get('/doctor/connect/{token}', [DoctorPatientConnectionController::class, 'connectDoctor'])
    ->name('doctor.connect');
Route::post('/doctor/confirm/{token}', [DoctorPatientConnectionController::class, 'confirmConnection'])
    ->name('doctor.confirm');
Route::get('/doctor/patients', [DoctorPatientConnectionController::class, 'myPatients'])
    ->name('doctor.patients');

// Revoke access
Route::delete('/connection/{connectionId}/revoke', [DoctorPatientConnectionController::class, 'revokeAccess'])
    ->name('connection.revoke');
//});

Route::get('/doctor/patient/{patientId}/data', [DoctorController::class, 'viewPatientData'])
    ->middleware(['auth', 'doctor.patient.access'])
    ->name('doctor.patient.data');


\Illuminate\Support\Facades\URL::forceScheme('https');
