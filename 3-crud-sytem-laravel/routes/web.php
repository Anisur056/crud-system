<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::view('/','welcome')->name('home');

// register form view & post method
Route::view('/register','register-form')->name('register');
Route::post('/registerSave',[UserController::class,'register'])->name('registerSave');

// Loging form view & Post method.
Route::view('/login','login-form')->name('login');
Route::post('/loginMatch',[UserController::class,'login'])->name('loginMatch');

//Logout route.
Route::get('/logout',[UserController::class,'logout'])->name('logout');


// dashboard page
Route::get('/dashboard',[UserController::class,'dashboardPage'])->name('dashboard');

// ***
// Resource Route
// *** 
Route::resource('/users',UserController::class);