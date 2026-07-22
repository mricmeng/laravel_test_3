<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/list', [postController::class, 'index']);
Route::post('/store', [postController::class, 'store']);
Route::get('/edit/{id}', [postController::class, 'edit']);
Route::put('/update/{id}', [postController::class, 'update']);
Route::post('/delete/{id}', [postController::class, 'delete']);