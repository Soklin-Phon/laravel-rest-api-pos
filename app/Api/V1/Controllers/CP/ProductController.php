<?php

namespace App\Api\V1\Controllers\CP;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use Dingo\Api\Routing\Helpers;
use JWTAuth;

use App\Api\V1\Controllers\ApiController;
use App\Model\Product\Product; 
use App\Model\Product\Category; 

use App\CamCyber\FileUpload; 

class ProductController extends ApiController
{
    use Helpers;
   
    function listing(Request $req){
       
        $data           = Product::select('*')
        ->with([
            'type',
            //'details.product'
        ]); 

        //Filter
        if($req->key && $req->key != ''){
            $data = $data->where('name', 'LIKE', '%'.$req->key.'%'); 
        }

        if($req->type && $req->type != 0){
            $data = $data->where('type_id', $req->type); 
        }

        $data = $data->limit(100)
        ->orderBy('id', 'DESC')
        ->get();
        
        return $data; 
    }

    function create(Request $req){

        //==============================>> Check validation
        $this->validate($req, [
            
            'name'              => 'required|max:20',
            'type_id'           => 'required|exists:products_type,id',
            'unit_price'        => 'required|max:20',
            'discount'          => 'required|max:20'
        ], 
        [
            'name.required'         => 'Please enter the name.',
            'name.max'              => 'Name cannot be more than 20 characters.',
            'type_id.exists'        => 'Please select correct type.',
            'discount'              => 'Please enter discount.'


        ]);

        //==============================>> Start Adding data

        $product                  =   New Product; 
        $product->name            =   $req->name;  
        $product->type_id         =   $req->type_id; 
        $product->unit_price      =   $req->unit_price;
        $product->discount        =   $req->discount;  

        $product  ->save(); 
    
        return response()->json([
            'product' => $product,
            'message' => 'Product has been successfully created.'
        ], 200);
        
    }
  
    function update(Request $req, $id=0){

         //==============================>> Check validation
         $this->validate($req, [
            
            'name'              => 'required|max:20',
            'type_id'           => 'required|exists:products_type,id',
            'unit_price'        => 'required|max:20',
            'discount'          => 'required|max:20'

        ], 
        [
            'name.required'         => 'Please enter the name.', 
            'name.max'              => 'Name cannot be more than 20 characters.',
            'type_id.exists'        => 'Please select correct type.',
            'discount'              => 'Please enter discount.'
        ]);
        
        //==============================>> Start Updating data
        $product                         = Product::find($id);
        if($product){

            $product->name               = $req->input('name');
            $product->type_id            = $req->input('type_id');
            $product->unit_price         = $req->input('unit_price');
            $product->discount           = $req->input('discount');

            $product->save();

            // Start Uploading Image; 
            if($req->image && $req->image != ''){

                $uri = FileUpload::upload64base($req->image, 'uploads/product');
                
                if($uri != ''){
                    $product->image = $uri; 
                    $product->save();
                }
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Product has been updated Successfully',
                'product' => $product,
            ], 200);

        }else{

            return response()->json([
                'message' => 'Invalid data.',
            ], 400);

        }

       

    }

    function delete($id = 0){
        
        $data = Product::find($id);

        //==============================>> Start deleting data
        if($data){

            $data->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Data has been deleted',
            ], 200);

        }else{

            return response()->json([
                'message' => 'Invalid data.',
            ], 400);

        }

        
    }
    
}
