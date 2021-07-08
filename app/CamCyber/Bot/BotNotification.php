<?php

namespace App\CamCyber\Bot;

use TelegramBot;
use App\Http\Controllers\Controller;

class BotNotification extends Controller
{
    
    public static function order($order){
       

        $chatID = "-1001201893433"; 
       
        $str = ''; 
        $i = 1; 
        $total = 0; 

        foreach($order->details as $detail){
$str.= $i.'. '.$detail->product->name.'('.number_format($detail->unit_price).'KHR) x '.$detail->qty.' = '.number_format($detail->qty*$detail->unit_price).'
'; 
            $i++; 
            $total += $detail->qty*$detail->unit_price; 

        }

$str .='=======================
Total Price: <b>'.number_format($total).'KHR</b>
Cashier: '.$order->cashier->name;
        
        $botRes = TelegramBot::sendMessage([
            'chat_id' =>  $chatID, 
            'text' => '<b> វិក័យបត្រលេខ #'.$order->receipt_number. '</b>
'.$str, 
            'parse_mode' => 'HTML'
        ]);

        return $botRes; 
        
    }


}