<?php


		function isValidDate($date){
		    //echo $date; die;
		    if (false === strtotime($date)) {
		        return false;
		    }else {
		        return true;
		    }
		}

		function isValidDateTime($dateTime){
			$format = 'Y-m-d H:i:s'; 
		   	$d = DateTime::createFromFormat($format, $dateTime);
    		return $d && $d->format($format) == $dateTime;
		}

		

   
?>