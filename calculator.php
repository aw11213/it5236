<?php
# handle get requests
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
	#math functions
	$num1 = $_GET['num1'];
	$num2= $_GET['num2'];
	$operation= $_GET['operation'];
	
	#validation
	echo($operation)
	exit():
	if ($op ==="+" || $op ==="-" || $op ==="*" || $op ==="/" || $op ==="**"){
		#completing funcitions
		var_dump($num1);
		$n1= floatval($num1);
		$n2= floatval($num2);
		
		#var_dump($n1);
		#echo"<br>"
		#var_dump($n2);
		#echo"<br>"
		$result=Null;
		switch($op){
			case"+":
				$result = $n1 + $n2;
				break;	
			case"-":
				$result = $n1 - $n2;
				break;	
			case"*":
				$result = $n1 * $n2;
				break;	
			case"/":
				$result = $n1 / $n2;
				break;
			case"**":
				$result = $n1 ** $n2;
				break;
			
		}
		if($result !== Null){
			echo $result;
		}else{
		http_response_code(500);
		exit();
	}
		
		
	}else{
		http_response_code(400);
		exit();
	}
	
}else if ($_SERVER['REQUEST_METHOD'] == 'HEAD'){
	#do not do anything
	exit();

}else{
	http_response_code(405);
	exit();
}










?>