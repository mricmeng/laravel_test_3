<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

use App\Models\productModel;

class productController extends Controller
{
    /*Display a listing of the resource.*/
    public function index()
    {
        $products = ProductModel::orderBy('id', 'desc')->get();
        if ($products == null) {
            return response([
                'status' => false,
                'message' => 'product empty',
            ], 204);
        }

        return response([
            'status' => true,
            'message' => 'Select all success from database',
            'product' => $products,
        ], 200);
    }
    
    /*Store a newly created resource in storage.*/
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'  => ['required', 'string', 'min:5'],
            'price' => ['required', 'numeric'],
            'qty'   => ['required', 'numeric', 'integer'],
        ]);
        if ($validator->fails()) {
            return response([
                'status'  => false,
                'message' => $validator->errors(),
            ], 422);
        }

        //store to db
        $product = new productModel();
        $product->name = $request->name;
        $product->desc = $request->desc;
        $product->price = $request->price;
        $product->qty = $request->qty;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = rand(0, 999999999) . '.' . $file->getClientOriginalExtension();
            //move to the folder
            $file->move(public_path('images'), $fileName);
            //store to db
            $product->image = "http://127.0.0.1:8000/images/$fileName";
        }
        $product->save();

        return response([
            'status'  => true,
            'message' => 'Product created successully',
            'product' => $product,
        ], 201);
    }
    
    public function edit(string $id)
    {
        $product = ProductModel::find($id);
        if ($product == null) {
            return response([
                'status' => false,
                'message' => 'Product not found with id' . $id,
            ], 404);
        }
        return response([
            'status' => true,
            'messeage' => 'Select success from database',
            'product' => $product,
        ], 200);
    }

    public function update(Request $request, string $id)
    {
        //validation
        $validator = Validator::make($request->all(), [
            'name'  => ['required', 'string', 'min:5'],
            'price' => ['required', 'numeric'],
            'qty'   => ['required', 'numeric', 'integer'],
        ]);
        //validation errors
        if ($validator->fails()) {
            return response([
                'status'  => false,
                'message' => 'Validator Error',
                'errors'  => $validator->errors(),
            ], 422);
        }
        //find the product by id and update it
        $product = ProductModel::find($id);

        //if not found return 404 error
        if ($product == null) {
            return response([
                'status'  => false,
                'message' => 'Product not found with id' . $id,
            ], 404);
        }
        //update to database
        $product->name = $request->name;
        $product->desc = $request->desc;
        $product->price = $request->price;
        $product->qty = $request->qty;


        if($request->hasFile("image")){
            //check product image
            if($product->image != null){

                $image = $product->image;
                //http:://localhost:8000/images/23445433.jgp;

                $imagePath = public_path("images/".basename($image));

                if(File::exists($imagePath)){
                    File::delete($imagePath);
                }
            }

            $file = $request->file('image');
            $fileName = rand(0, 999999999) . '.' . $file->getClientOriginalExtension();

            //move to the folder
            $file->move(public_path("images"), $fileName);

            //store to database
            $product->image = "http://127.0.0.1:8000/images/$fileName";
        }
        

        //update new product to database
        $product->save();

        //respone to client
        return response([
            'status' => true,
            'message' => 'Product update successfully',
            'product' => $product,
        ], 201);
    }

    /*Remove the specified resource from storage.*/
    public function destroy(string $id)
    {
        $product = ProductModel::find($id);

        if ($product == null) {
            return response([
                'status' => false,
                'message' => 'Product not found with id' . $id,
            ], 404);
        }

        //delete db
        $image = $product->image;
        //  http://127.0.0.1:8000/images/797177726.png

        $imageName = basename($image);
        // convert to array and acept last array
        //  ["http:", "","127.0.0.1:8000","images","797177726.png"]
        $imagePath = public_path("images/$imageName");
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
        $product->delete();

        return response([
            'status' => true,
            'message' => 'Product delete successfully',
        ], 200);
    }

}