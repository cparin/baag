<?php

use Illuminate\Support\Facades\Route;

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

\Illuminate\Support\Facades\URL::forceScheme('https');
