<?php

use App\Http\Controllers\productController;
use Illuminate\Support\Facades\Route;


// Route::get('/dashboard', function(){
//     return view('dashboard');
// });

// Route::get('/product', function(){
//     return view('product');
// });

// Route::get('/product/create', function(){
//     return view('create');
// });

// Route::get('/product/edit', function(){
//     return view('edit');
// });

/*Rout with Controller*/
Route::get('/product', [productController::class, 'index']);
Route::get('/product/create', [productController::class, 'create']);
Route::get('/product/edit', [productController::class, 'edit']);
Route::get('/dashboard', [productController::class, 'show']);