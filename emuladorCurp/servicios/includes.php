<?php
error_reporting(E_ALL);

include "../core/classes/database.php";
include "../core/classes/HttpRequest.php";
include "../core/helpers/string.php";
include "../core/helpers/xml.php";

class utils{
	static public function pre($arr,$exit = TRUE,$callback = FALSE){
		
		if($callback !== FALSE){
			//callback[0] = funciones que ejecutará, separadas por comas.
			//callback[1] = veces que se ejecutarán.
			$arr = self::callback($arr,$callback[0],$callback[1]);
		}
		
		echo '<pre style="font-family:tahoma;font-size:11px;background-color:#fff;">';
		print_r($arr);
		echo "</pre>";
		
		if($exit){
			exit();
		}
	}
	
	static public function callback($arr,$callback,$times=1){
		$callbacks = explode(",",$callback); //Funciones separadas por comas.
		
		if(is_array($arr)){
			foreach($arr as $k => $i){
				if(is_string($i)){
					if($times == 1){
						foreach($callbacks as $callback){
							$arr[$k] = $callback($arr[$k]);
						}
					}else{
						for($c=1;$c<=$times;$c++){
							foreach($callbacks as $callback){	
								$arr[$k] = $callback($arr[$k]);
							}
						}
					}
					
				}else if(is_array($i)){
					for($c=1;$c<=$times;$c++){
						foreach($callbacks as $callback){
							$arr[$k] = self::callback($arr[$k], $callback);
						}
					}
				}
			}
		}else{
			for($c=1;$c<=$times;$c++){
				foreach($callbacks as $callback){
					$arr = $callback($arr);
				}
			}
		}
		
		return $arr;
	}
}