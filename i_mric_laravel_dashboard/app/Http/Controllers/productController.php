<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class productController extends Controller
{
    public function index(){
        
        return view('product');
    }

    public function create(){
        
        return view('create');
    }

    public function edit(){
        
        return view('edit');
    }

    public function show(){
        
        return view('dashboard');
    }
}