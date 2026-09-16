<?php

namespace App\Http\Controllers;

use App\Models\PostModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = PostModel::orderBy('id', 'DESC')->with('user')->get();
        return $posts;
    }
}
