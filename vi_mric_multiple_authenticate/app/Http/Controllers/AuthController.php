<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLogin(){
        return view('login');
    }

    public function processLogin(Request $request){

        $validator = Validator::make($request->all(),[
            'email' => 'required',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $credentials = $request->only('email', 'password');

        if(Auth::guard('user')->attempt($credentials)){

            $user =Auth::guard('user')->user()->role;
            if($user == 'teacher'){
                return redirect()->route('teacher.index');
            }elseif($user == 'student'){
                return redirect()->route('student.index');
            }
        }else{
            return redirect()->back()->with('error', 'Invalid email or password');
        }

    }

    public function showRegister(){
        return view('register');
    }

    public function processRegister(Request $request){

        $validator = Validator::make($request->all(),[
            'email' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        
        return redirect()->route('auth.login.show')->with('success', 'Regrastration successful! please login');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('auth.login.show')->with('success','You have logged out successful');
    }
}
