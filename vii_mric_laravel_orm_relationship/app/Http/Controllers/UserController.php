<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $user = User::orderBy('id', 'DESC')->with(['profile', 'roles'])->get();

        // $user = User::orderBy('id', 'desc')->with(['profile', 'posts','roles'])
        //         ->whereHas('profile', function($table){
        //             $table->where('id', 2);
        //         })
        //         ->first();

        return $user;
    }
}
