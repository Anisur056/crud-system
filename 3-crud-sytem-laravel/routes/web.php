<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// ***
// view route
// ***
Route::view('/','welcome')->name('home');
Route::view('/login','login-form')->name('login');
Route::view('/register','register-form')->name('register');

// ***
// Save Post Route
// ***
Route::post('/registerSave',[UserController::class,'register'])->name('registerSave');
Route::post('/loginMatch',[UserController::class,'login'])->name('loginMatch');

Route::get('/dashboard',[UserController::class,'dashboardPage'])->name('dashboard');
Route::get('/logout',[UserController::class,'logout'])->name('logout');

// ***
// Resource Route
// *** 
Route::resource('/users',UserController::class);