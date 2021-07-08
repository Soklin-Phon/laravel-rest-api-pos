<?php

namespace App\Api\V1\Controllers\CP;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use Dingo\Api\Routing\Helpers;
use JWTAuth;

use App\Api\V1\Controllers\ApiController;
use App\Model\Expense\Type; 

class ExpenseTypeController extends ApiController
{
    use Helpers;
   
    function listing(){
       
        $data           = Type::select('*')
        
        ->orderBy('id', 'DESC')
        ->get();
        
        return $data; 
    }

    


    function create(Request $req){

        //==============================>> Check validation
        $this->validate($req, [
            
            'name'             => 'required|max:20',
        ], 
        [
            'name.required'    => 'Please enter the name.', 
            'name.max'         => 'Total cannot be more than 20 characters.',
        ]);

        //==============================>> Start Adding data

        $expense_type               =   New Type; 
        $expense_type->name         =   $req->name;  

        $expense_type  ->save(); 
    
        return response()->json([
            'expense_type' => $expense_type,
            'message' => 'Expense has been successfully created.'
        ], 200);
        
    }
  
    function update(Request $req, $id=0){

         //==============================>> Check validation
         $this->validate($req, [
            
            'name'             =>  'required|max:20',

        ], 
        [
            'name.required' => 'Please enter the name.', 
            'name.max' => 'Name cannot be more than 20 characters.',
        ]);
        
        //==============================>> Start Updating data
        $expense_type                         = Type::find($id);
        if( $expense_type){

            $expense_type->name              = $req->input('name');
            $expense_type->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Expense has been updated Successfully',
                'expense_type' => $expense_type,
            ], 200);

        }else{

            return response()->json([
                'message' => 'Invalid data.',
            ], 400);

        }

       

    }

     function delete($id = 0){
        
        $data = Type::find($id);

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
