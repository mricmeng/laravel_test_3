<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', [UserController::class, 'index']);
Route::get('/profiles', [ProfileController::class, 'index']);
Route::get('/posts', [PostController::class, 'index']);
Route::get('/students', [StudentController::class, 'index']);