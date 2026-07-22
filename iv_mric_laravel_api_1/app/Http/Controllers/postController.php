<?php

namespace App\Http\Controllers;

use App\Models\postModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as mric;

class postController extends Controller
{
    public function index(){
        $posts = postModel::orderBy('id', 'DESC')->get();
        
        return response()->json([
            'status'  => true,
            'message' => 'Post was successfully selected',  
            'posts'   => $posts
        ], 200);
    }

    public function store(Request $request){
        $validator = mric::make($request->all(), [
            'title' => 'required|min:5'
        ]);

        if($validator->fails()){  
            return response()->json([
                'status'  => false,
                'message' => 'Please configure the validation',
                'errors'  => $validator->errors()
            ], 500);
        }

        //Dependecy injection
        $post = new postModel();
        $post->title = $request->title;
        $post->des   = $request->des;
        $post->save(); 

        return response([
            'status'  => true,
            'message' => 'Post saved successfully',
            'post'    => $post,
        ], 201);
    }

    public function edit(string $id){
        $post = postModel::find($id);
        
        if(!$post){
            return response([
                'status'  => false,
                'message' => 'Post not found',
            ], 404);
        }

        return response()->json([
            'status'  => true,
            'message' => 'Post is found',
            'post'    => $post
        ]);
    }

    public function update(Request $request, string $id){
        $validator = mric::make($request->all(), [
            'title' => 'required'
        ]);

        $post = postModel::find($id);

        if(!$post){
            return response()->json([
                'status' => false,
                'message' => 'Post not found'
            ], 404);
        }

        if($validator->fails()){
            return response()->json([
                'status'  => false,
                'message' => 'Please configure the validation',
                'errors'  => $validator->errors()
            ], 500);
        }

        $post->title = $request->title;
        $post->des   = $request->des;
        $post->update();

        return response([
            'status'  => true,
            'message' => 'Post update successfully',
            'post'    => $post,
        ], 201);
    }

    public function delete($id){
        $post = postModel::find($id);

        if(!$post){
            return response()->json([
                'status' => false,
                'message' => 'Post not found'
            ], 404);
        }

        $post->delete();

        return response([
            'status' => true,
            'message' => 'Post deleted successfully'
        ]);
    }
}