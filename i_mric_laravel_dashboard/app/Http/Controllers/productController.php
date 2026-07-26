<?php

namespace App\Http\Controllers;

use App\Models\productModel;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function index(){
        $products = productModel::orderBy('id', 'DESC')->paginate(8);
      
        return view('product', [
            'products' => $products,
        ]);
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