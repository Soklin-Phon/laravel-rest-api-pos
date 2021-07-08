<?php

namespace App\Api\V1\Controllers\CP;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use Dingo\Api\Routing\Helpers;
use JWTAuth;

use App\Api\V1\Controllers\ApiController;
use App\Model\User\Main as User; 

class UserController extends ApiController
{
    use Helpers;
   
    function listing(Request $req){
       
        $data           = User::select('*')
        ->with([
            'type'
        ]);
        

        $data = $data->orderBy('id', 'desc')->paginate( $req->limit ? $req->limit : 20);
        return response()->json($data, 200);
    }

    function changePassword(Request $req, $id = 0){

        //==============================>> Check validation
        $this->validate($req, [
            
            'password'             => 'required|min:6|max:20',
            'confirmed_password'   => 'required|min:6|max:20'
        ]);

        //==============================>> Start Adding data

        $user = User::find($id); 
        if($user){

            $user->password                 = bcrypt($req->password); 
            $user->password_last_updated_at = now(); 
            $user->save(); 

            return response()->json([
                'message' => 'Password has been updated.'
            ], 200);

        }else{
            return response()->json([
                'message' => 'Invalid user.'
            ], 400);
        }
    
       
        
    }
  

    


   /* function create(Request $req){

        //==============================>> Check validation
        $this->validate($req, [
            
            'total'             => 'required|max:20',
            'type_id'           => 'required|exists:expenses_type,id'
        ], 
        [
            'total.required' => 'Please enter the total.',
            'total.max' => 'Total cannot be more than 20 characters.',
            'type_id.exists' => 'Please select correct type.'
        ]);

        //==============================>> Start Adding data

        $expense                =   New Expense; 
        $expense->total         =   $req->total;  
        $expense->type_id       =   $req->type_id; 

        $expense  ->save(); 
    
        return response()->json([
            'expense' => $expense,
            'message' => 'Expense has been successfully created.'
        ], 200);
        
    }
  
    function update(Request $req, $id=0){

         //==============================>> Check validation
         $this->validate($req, [
            
            'total'             =>  'required|max:20',
            'type_id'           =>  'required|exists:expenses_type,id'

        ], 
        [
            'total.required' => 'Please enter the total.', 
            'total.max' => 'Total cannot be more than 20 characters.',
            'type_id.exists' => 'Please select correct type.'
        ]);
        
        //==============================>> Start Updating data
        $expense                         = Expense::find($id);
        if( $expense){

            $expense->total              = $req->input('total');
            $expense->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Expense has been updated Successfully',
                'expense' => $expense,
            ], 200);

        }else{

            return response()->json([
                'message' => 'Invalid data.',
            ], 400);

        }

       

    }

     function delete($id = 0){
        
        $data = Expense::find($id);

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
 */   
}