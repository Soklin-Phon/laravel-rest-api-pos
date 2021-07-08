<?php
namespace App\Api\V1\Controllers;

use Illuminate\Http\Request;
use Dingo\Api\Exception\ValidationHttpException;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

use Carbon\Carbon;
use App\Model\Order\Order; 
use App\Model\Order\Setting; 
use App\Model\Menu\Stock; 


class ApiController extends BaseController
{
    use DispatchesJobs, ValidatesRequests;
    public function validate(Request $request, array $rules, array $messages = [], array $customAttributes = []) {
        $validator = $this->getValidationFactory()->make($request->all(), $rules, $messages, $customAttributes);
        if ($validator->fails()) {
            throw new ValidationHttpException($validator->errors());
        }
    }

    function generateReceiptNumber(){
        $number = rand(100000, 999999); 

        $check = Order::where('receipt_number', $number)->first();
        if($check){
            return $this->getReceiptNumber();
        }

        return $number; 
    }

    function generateStockNumber(){
        $number = rand(100000, 999999); 

        $check = Stock::where('receipt_number', $number)->first(); 
        if($check){
            return $this->generateStockNumber(); 
        }

        return $number; 
    }

    function getOrderDiscount(){
       $data = Setting::first(); 
       return $data->discount; 
    }

    function getExchangeRate(){
        $data = Setting::first(); 
        return $data->usd_rate; 
     }
    
}