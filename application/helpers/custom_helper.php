<?php 
if(!function_exists('is_set')){
	function is_set($value,$replace){
		if($value!=null){
			return $value;
		}
		else{
			return $replace;
		}
		
	}
}

if(!function_exists('perc2amount')){
	function perc2amount($percentage,$total){
		return $percentage*$total*0.01;
	}
}

if(!function_exists('amount2perc')){
	function amount2perc($amount,$total){
		if($amount==null || $amount=='' ){
			$amount=0;
		}
		return $amount/$total*100;
	}
}

if(!function_exists('dateFormat')){
	function dateFormat($date,$format){
		if($format=="Y-m-d"){
			if(strpos($date,'-')){
				$date_array=explode('-',$date);
			}
			else if(strpos($date,'/')){
				$date_array=explode('/',$date);
			}
			
			if(strlen($date_array[0])==4){
				$return_date=$date_array[0].'-'.$date_array[1].'-'.$date_array[2];
			}
			else if(strlen($date_array[0])==2){
				$return_date=$date_array[2].'-'.$date_array[1].'-'.$date_array[0];
			}
		}
		else if($format=="d-m-Y")
		{
			
			if(strpos($date,'-')){
				$date_array=explode('-',$date);
			}
			else if(strpos($date,'/')){
				$date_array=explode('/',$date);
			}
			if(strlen($date_array[2])==4){
				$return_date=$date_array[0].'-'.$date_array[1].'-'.$date_array[2];
			}
			else if(strlen($date_array[2])==2){
				$return_date=$date_array[2].'-'.$date_array[1].'-'.$date_array[0];
			}
		}
		else if($format=="d/m/Y")
		{
			if(strpos($date,'-')){
				$date_array=explode('-',$date);
			}
			else if(strpos($date,'/')){
				$date_array=explode('/',$date);
			}
			if(strlen($date_array[0])==4){
				$return_date=$date_array[2].'/'.$date_array[1].'/'.$date_array[0];
			}
			else if(strlen($date_array[0])==2){
				$return_date=$date_array[0].'/'.$date_array[1].'/'.$date_array[2];
			}
		}
		else if($format=="Y/m/d")
		{
			
			if(strpos($date,'-')){
				
				$date_array=explode('-',$date);
			}
			else if(strpos($date,'/')){
				
				$date_array=explode('/',$date);
			}
			
			if(strlen($date_array[0])==4){
				
				$return_date=$date_array[0].'/'.$date_array[1].'/'.$date_array[2];
			}
			else if(strlen($date_array[0])==2){
				
				$return_date=$date_array[2].'/'.$date_array[1].'/'.$date_array[0];
			}
		}
		
		return $return_date;
	}
}
?>