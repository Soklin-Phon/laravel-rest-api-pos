<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use App\CamCyber\Blockchain;
use App\CamCyber\Coinbase;

//========================== Use Mail
use Illuminate\Support\Facades\Mail;
use App\Mail\Notification;

class TestController extends Controller
{
    
   

    function mail(){
       
        $notification       = [
            'username'      => 'dara',
            'member'        => "Dara Sambath",
            'email'         => "dara.sambath@gmail.com",
            'phone'         => "098998898",
            'country'       => "Cambodia"
        ];
        Mail::to("koeun@camcyber.com")->send(new Notification('Welcome New Member', $notification, 'emails.member.account.welcome'));

        echo "Test Success"; 
    }

    function blockchain(){
       $address = Blockchain::getNewAddress();
        return view('test.blockchain', ['address'=>$address]);
    }

    function coinbase(){
        $data = Coinbase::getPaymenInfo("Deposit request #1234", 1,1, 1);
        print_r($data); 

        //return view('test.blockchain', ['coinbase'=>$address]);
    }

   



}

