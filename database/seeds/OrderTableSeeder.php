<?php

use Illuminate\Database\Seeder;
use App\Model\Order\Order; 

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
	{
        $data = [];

        for($i = 1; $i <= 100; $i++){

            $data[] = [
                'receipt_number' => $this->generateReceiptNumber(), 
                'cashier_id' => rand(1, 4), 
                'total_price' => 0, 
                'discount' => 0, 
                'total_received' => 0, 
                'total_price_khr' => 0, 
                'total_price_usd' => 0, 
                'ordered_at' => Date('Y-m-d H:i:s'), 
                'paid_at' => Date('Y-m-d H:i:s')
            ];

        }

        DB::table('order')->insert($data);

        //Create Order Detail
        $orders = Order::get();
        foreach($orders as $order){

            $details = []; 
            $totalPrice = 0; 
            $nOfDetails = rand(1, 6); 
            
            for($i = 1; $i <= $nOfDetails; $i++){

                $product = DB::table('product')->find(rand(1, 14));
                $qty = rand(1, 10); 

                $totalPrice += $product->unit_price*$qty; 

                $details[] = [
                    'order_id'      => $order->id, 
                    'product_id'    => $product->id,
                    'qty'           => $qty, 
                    'unit_price'    => $product->unit_price
                ]; 

            }

            if(sizeof($details) > 0){
                DB::table('order_details')->insert($details);
            }

            $order->total_price = $totalPrice; 
            $order->total_received = $totalPrice; 
            $order->save();
           
           

        }
      
    }

   

    
    public function generateReceiptNumber(){

        $number = rand(100000, 999999); 

        $check = DB::table('order')->where('receipt_number', $number)->first(); 
        if($check){
            return $this->generateReceiptNumber(); 
        }

        return $number; 

    }
}
