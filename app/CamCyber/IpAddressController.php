<?php

namespace App\CamCyber;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IpAddressController extends Controller
{
   
    public static function getIP(){
        $ip = "";
        if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
         //check for ip from share internet
            $ip = $_SERVER["HTTP_CLIENT_IP"];
        }elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
         // Check for the Proxy User
            $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        }else{
            $ip = $_SERVER["REMOTE_ADDR"];
        }
        return $ip;
    }

   
}
