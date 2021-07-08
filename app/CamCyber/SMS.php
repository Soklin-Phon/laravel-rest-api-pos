<?php

namespace App\CamCyber;

use App\Http\Controllers\Controller;
use Twilio\Rest\Client;

class SMS extends Controller

{
    

    public static function sendSMS($receivNumber = '077677599', $message = 'Hello from MPWT'){

        if(preg_match("/(^[0][0-9].{7}$)|(^[0][0-9].{8}$)/", $receivNumber)){
            
            $client = new Client('AC1a1b5a19b83d42e9c8a313efb67cb3ac', '1e5b46fb1728b1f50cbcd1fc2bdf8f7a');
            $sms = $client->messages->create('+855'.substr($receivNumber, 1), ['from' => env('APP_NAME'), 'body' => $message]);

            return ['status'=>'success', 'message'=>'Message has been sent']; 
        }else{
           return ['status'=>'error', 'message'=>'Invalid number']; 
        }

            
    }
 
}
