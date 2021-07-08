<?php

namespace App\Api\V1\Controllers\CP;
//=====================================================================>> Core Library
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

//=====================================================================>> Third Library
use Dingo\Api\Routing\Helpers;
use JWTAuth;

//=====================================================================>> Custom Library
use App\Api\V1\Controllers\ApiController;
use App\Model\Branch\Branch; 

class BranchController extends ApiController
{
    use Helpers;
   
    function listing(){

        $data           = Branch::select('id', 'name', 'phone', 'address', 'created_at')
        ->with([
            'staffs'
        ])
        ->orderBy('id', 'DESC') //ASC
        ->get();
        
        return $data; 
       
        
    }

    function view($id = 0){
       
        $data           = Branch::select('*')
        ->with([
            'staffs'
        ])->find($id);
        
        return $data; 
    }

    function create(Request $req){

        //==============================>> Check validation
        $this->validate($req, [
            
            'name'             =>  'required|max:10',
            'phone'            =>  ['required'],
            'address'          =>  ['required'],
        ], 
        [
            'name.required' => 'Please enter the name.', 
            'name.max' => 'Name cannot be more than 10 characters.', 
            'phone.required' => 'Please enter the phone number.'
        ]);

        //==============================>> Start Adding data

        $branch                  =   New Branch; 
        $branch->name            =   $req->name;  
        $branch->phone           =   $req->input('phone');
        $branch->address         =   $req->input('address');

        $branch->save(); 
    
        return response()->json([
            'branch' => $branch,
            'message' => 'Branch has been successfully created.'
        ], 200);
        
    }
  
    function update(Request $req, $id=0){

         //==============================>> Check validation
         $this->validate($req, [
            
            'name'             =>  'required|max:20',
            'phone'            =>  ['required'],
            'address'          =>  ['required'],
        ], 
        [
            'name.required' => 'Please enter the name.', 
            'name.max' => 'Name cannot be more than 20 characters.'
        ]);
        
        //==============================>> Start Updating data
        $branch                    = Branch::find($id);
        if($branch){

            $branch->name              = $req->input('name');
            $branch->phone             = $req->input('phone');
            $branch->address           = $req->input('address');
            $branch->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Branch has been updated Successfully',
                'branch' => $branch,
            ], 200);

        }else{

            return response()->json([
                'message' => 'Invalid branch.',
            ], 400);

        }
    }

    function delete($id = 0){
        
        $data = Branch::find($id);

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
