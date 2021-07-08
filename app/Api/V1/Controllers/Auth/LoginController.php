<?php

namespace App\Api\V1\Controllers\Auth;

use Illuminate\Http\Request;
use App\Api\V1\Controllers\ApiController;
use JWTAuth;
use App\Model\Branch\BranchAdmin; 

class LoginController extends ApiController
{

    public function login(Request $request) {


        $this->validate($request, [
            'username'    =>  [
                            'required',
                        ],
            'password' => 'required|min:6|max:20',

        ],[
            'username.required'=>'Username is required.',
            'password.required'=>'Password is required.',
            'password.min'=>'Password must be at least 6 digit long.',
            'password.max'=>'Password is not allowed to be longer than 20 digit long.',
        ]);

        if(filter_var($request->post('username'), FILTER_VALIDATE_EMAIL)){
            $credentails = array(
                'email'=>$request->post('username'),
                'password'=>$request->post('password'),
                'is_active'=>1,
                'deleted_at'=>null,
            );
        }else{

            $credentails = array(
                'phone'             =>  $request->post('username'),
                'password'          =>  $request->post('password'),
                'is_active'         =>  1,
                'deleted_at'        =>  null,
            );
        }

        try{

            $token = JWTAuth::attempt($credentails);

            if(!$token){

                return response()->json([
                    'status'=> 'error',
                    'message' => 'ឈ្មោះអ្នកប្រើឬពាក្យសម្ងាត់មិនត្រឹមត្រូវ។'
                ], 401);
            }

        } catch(JWTException $e){
            return response()->json([
                'status'=> 'error',
                'message' => 'មិនអាចបង្កើតនិមិត្តសញ្ញាទេ!'
            ], 500);
        }

       $user = JWTAuth::toUser($token);

       $dataUser = [
           'name' => $user->name,
           'avatar' => $user->avatar,
           'phone' => $user->phone
           
       ]; 

       $role = '';

        //Check if this user is a branch manager, then check if having branch. 
        if($user->type_id == 2){//
            $branchAdmin = BranchAdmin::with(['branch'])->where('admin_id', $user->id)->first(); 
            if(!$branchAdmin){
                return response()->json([
                    'status'=> 'You dont have a branch'
                ], 401);
            }else{
                if($branchAdmin->role_id == 1){
                    $role = 'Branch Manager - '.$branchAdmin->branch->name;
                }else{
                    $role = 'Staff - '.$branchAdmin->branch->name;
                }
            }
        }else{
            $role = 'Admin';
        }

        return response()->json([
            'status'=> 'success',
            'token'=> $token,
            'user' => $dataUser,
            'role' => $role
        ], 200);

    }
}
