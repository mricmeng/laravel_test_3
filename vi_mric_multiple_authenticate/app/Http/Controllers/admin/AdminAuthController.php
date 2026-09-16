<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminAuthController extends Controller
{
    public function showLogin(){
        return view('admin.login');
    }

    public function loginProcess(Request $request){

        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $credentials = $request->only('email', 'password');

        if(Auth::guard('admin')->attempt($credentials)){
            return redirect()->route('admin.dashboard.index');
        }else{
            return redirect()->back()->with('error', 'Invalid email or password');
        }

    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.auth.login.show');
    }
}
