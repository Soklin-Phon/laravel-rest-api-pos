<?php

namespace App\CamCyber;
class Coinbase{
    
  
    public static function getPaymenInfo($description = "", $amount = 10, $requestId = 0, $memberId=0){
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, "https://api.commerce.coinbase.com/charges/");
           curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
           $post = array(
             "name"=>env("APP_NAME"),
             "description"=>$description,
             "local_price"=>array(
                 'amount'=>$amount,
                 'currency'=>'BTC'
             ),
             "pricing_type"=>"fixed_price",
             "metadata"=>array(
                 'requestId'=>$requestId,
                 'memberId'=>$memberId
             )
           );
           $post = json_encode($post);
           curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
           curl_setopt($ch, CURLOPT_POST, 1);

           $headers = array();
           $headers[] = "Content-Type: application/json";
           $headers[] = "X-Cc-Api-Key: 2306a66a-c007-48a9-90ba-032f7d66b8ab";
           $headers[] = "X-CC-Webhook-Signature: 26ef63ac-0807-4820-ace6-b729b2189dec";
           $headers[] = "X-Cc-Version: 2018-03-22";
           curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

           $result = curl_exec($ch);
           curl_close ($ch);
           return json_decode($result); 
        
        
    }

   
  
}
