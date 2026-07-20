<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return response([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){
            $token = Auth::user()->createToken('API Token')->plainTextToken;
            return response([
                'status' => true,
                'message'=> 'Login successful',
                'token' => $token
            ], 200);
        }else{
            return response([
                'status' => false,
                'message' => 'Invalid email errror password'
            ], 401);
        }
        
    }

    public function register(Request $request){
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:4',
            'email' => 'required|email|unique:users,email',
        ]);

        if($validator->fails()){
            return response([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        //create token for user
        $token = $user->createToken('API Token')->plainTextToken;

        return response([
            'status' => true,
            'message' => 'Register successful',
            'token' => $token
        ], 201);  
    }

    public function logout(){
        Auth::user()->tokens()->delete();
        return response ([
            'status' => true,
            'message' => 'logout successful'
        ], 200);
    }
}