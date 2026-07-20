<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;
use App\Http\Controllers\authController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('register', [authController::class, 'register']);
Route::post('login', [authController::class, 'login']);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('product', [productController::class, 'index']);
    Route::post('product', [productController::class, 'store']);
    Route::get('product/{id}', [productController::class, 'edit']);
    Route::delete('product/{id}', [productController::class, 'destroy']);
    Route::post('product/{id}', [productController::class, 'update']);   
    
    //logout
    Route::post('logout', [authController::class, 'logout']);
});