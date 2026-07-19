<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;


// Route::get('/login', function(){
//     return view('login');
// });
// Route::get('/register', function(){
//     return view('register');
// });

Route::get('/login', [authController::class, 'showLogin'])->name('auth.login');
Route::get('/register', [authController::class, 'showRegister'])->name('auth.register');