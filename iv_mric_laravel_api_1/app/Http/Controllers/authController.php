<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class authController extends Controller
{
    public function login(Request $request){
        
    }

    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4',
            'confirm_password' => 'required|same:password'
        ]);

        if($validator->passes()){
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            $token = $user->createToken("API Token")->plainTextToken;
            
            return response()->json([
                'status' => true,
                'user' => $user,
                'token' => $token
            ]);
            
        }else{
            return response()->json([
                'status' => false,
                'message' => 'Please config the errors',
                'errors' => $validator->errors()
            ], 500);
        }
    }

    public function logout(){
        
    }
}