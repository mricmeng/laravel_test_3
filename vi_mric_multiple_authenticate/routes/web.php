<?php

use App\Http\Controllers\admin\AdminAuthController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;


Route::prefix('user')->group(function(){

    Route::middleware('guest.user')->group(function(){
        Route::get('/', [AuthController::class, 'showLogin'])->name('auth.login.show');
        Route::post('/login', [AuthController::class, 'processLogin'])->name('auth.login.process');

        Route::get('/register', [AuthController::class, 'showRegister'])->name('auth.register.show');
        Route::post('/register', [AuthController::class, 'processRegister'])->name('auth.register.process');
    });

    Route::middleware('auth.user')->group(function(){
        Route::get('/teacher', [DashboardController::class, 'showTeacher'])->name('teacher.index');
        Route::get('/student', [DashboardController::class, 'showStudent'])->name('student.index');
        Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard.index');

        Route::get('/logout',[AuthController::class,'logout'])->name('auth.logout');
    });
    
});

Route::prefix('admin')->name('admin.')->group(function(){
    
    Route::middleware('guest.admin')->group(function(){
        Route::get('/', [AdminAuthController::class, 'showLogin'])->name('auth.login.show');
        Route::post('/login', [AdminAuthController::class, 'loginProcess'])->name('auth.login.process');

    });

    Route::middleware('auth.admin')->group(function(){
        Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard.index');
        Route::get('/logout', [AdminAuthController::class, 'logout'])->name('auth.logout');

    });
});

