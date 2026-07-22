<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class authController extends Controller
{
    public function showLogin(){
        return view('login');
    }

    public function processLogin(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if($validator->passes()){
            $credentials = [
                'email' => $request->email,
                'password' => $request->password
            ];
            if(Auth::attempt($credentials)){
                return redirect()
                ->route('dashboard.index');
            }else{
                return redirect()
                ->route('auth.login')
                ->with('error', 'invalid password or email');
            }
        }else{
            return redirect()
            ->route('auth.login')
            ->withInput()
            ->withErrors($validator);
        }
    }

    public function showRegister(){
        return view('register');
    }
    
    public function processRegister(Request $request){
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4',
            'confirm_password' => 'required|same:password' 
        ]);
        
        if($validator->passes()){
            $user = new User();
            $user->name = $request->input('username');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->save();
            
            return redirect()
            ->route('auth.login')
            ->with('success', 'Registeration successfully');  
        }else{
            return redirect()
            ->route('auth.register')
            ->withInput()
            ->withErrors($validator);
        }
    }
}