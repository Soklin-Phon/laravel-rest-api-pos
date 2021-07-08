<?php

namespace App\Api\V1\Controllers\CP;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use Dingo\Api\Routing\Helpers;
use JWTAuth;

use App\Api\V1\Controllers\ApiController;
use App\Model\Order\Order;
use App\Model\Order\Detail;
use App\Model\Product\Product;
use App\Model\Product\Type as ProductType;

use App\CamCyber\Bot\BotNotification; 

class POSController extends ApiController
{
    use Helpers;

    function getProducts(){

        $data = ProductType::select('id', 'name')
        ->with([
            'products:id,name,image,type_id,unit_price,discount'
        ])
        ->get(); 

        return $data;

    }
   

    function makeOrder(Request $req){

        $user         = JWTAuth::parseToken()->authenticate();
        //return $user->admin; 

        //==============================>> Check validation
        $this->validate($req, [
            'cart'             => 'required|json', 
            'discount'          => 'required'
        ]);

        //ACreate Order
        $order                  = new Order; 
        $order->cashier_id      = $user->admin->id; //TODO:: will find cashier later
        $order->receipt_number  = $this->generateReceiptNumber(); 
        $order->save(); 

        //Find Total Price & Order Detail
        $details = [];
        $totalPrice = 0; 
        $cart = json_decode($req->cart); 
        
        foreach($cart as $productId => $qty){

            $product = Product::find($productId);
            if($product){

                //Check Stock

                $details[] = [
                    'order_id'      => $order->id, 
                    'product_id'    => $productId, 
                    'qty'           => $qty, 
                    'discount'      => $product->discount,
                    'unit_price'    => $product->unit_price
                ];

                $totalPrice +=  $qty*$product->unit_price - $qty*$product->unit_price*$product->discount*0.001; 
            }
        }
        //Save tot Details
        Detail::insert($details);

        $rate               = 4000; 
        $discountAmount     = $totalPrice*$req->discount*0.01; 
        $totalPriceKhr      = $totalPrice - $discountAmount; 

        //Update Order
        $order->total_price = $totalPrice; 
        $order->discount = $req->discount; 
        $order->total_price_khr = $totalPriceKhr; 
        $order->total_price_usd = $totalPriceKhr/$rate; 
        $order->ordered_at = Date('Y-m-d H:i:s'); 
        $order->save(); 

        //ToDo: Send Notification
        $botRes = BotNotification::order($order); 
        
        $data           = Order::select('*')
        ->with([
            'cashier',
            'details',
            //'details.product'
        ])
        ->find($order->id); 
    
        return response()->json([
           // 'cart' => $cart,
           'order' => $data,
            'details' => $details, 
            'total_price' => $totalPrice, 
            'message' => 'Order has been successfully created.'
        ], 200);
        
    }

    function generateReceiptNumber(){
        $number = rand(1000000, 9999999); 
        $check = Order::where('receipt_number', $number)->first(); 
        if($check){
            return $this->generateReceiptNumber();
        }

        return $number; 
    }
    
}
