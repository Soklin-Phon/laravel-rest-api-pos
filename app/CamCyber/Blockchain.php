<?php

namespace App\CamCyber;


use Illuminate\Http\Request;

class Blockchain{
    
  
    public static function getNewAddress($callBack = ''){
        
        
        $url =   'https://api.blockchain.info/v2/receive?xpub=xpub6CUnmB7YbkZS7fYyw6YSZYXVoC8RwLb1bTrape1w9TdYPKwdzNj3RgwNdiKCuCS1RgzN6iu9oG3m6goh4mP1uZ45R9HAcCD2ZgF8pruKuiG&key=03f4d8c7-2107-4ae0-9220-d32f5c46fdc6&gap_limit=300&callback='.urlencode($callBack);
        //echo $url; die;
        try {
		 	$response = file_get_contents($url);

		 	if ($response === false) {
		        // Handle the error
		    }else{
		    	return json_decode($response);
		    }
		 	
		}

		//catch exception
		catch(Exception $e) {
		  echo 'Error!!! '; 
		}
        
        
    }

   
  
}
