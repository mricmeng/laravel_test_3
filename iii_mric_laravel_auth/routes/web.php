<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\dashboardController;


// Route::get('/login', function(){
//     return view('login');
// });
// Route::get('/register', function(){
//     return view('register');
// });

Route::get('/login', [authController::class, 'showLogin'])->name('auth.login');
Route::get('/register', [authController::class, 'showRegister'])->name('auth.register');
Route::post('/register', [authController::class, 'processRegister'])->name('auth.processRegister');
Route::post('/login', [authController::class, 'processLogin'])->name('auth.processLogin');
Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard.index');