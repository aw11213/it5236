<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	
	$headers = apache_request_headers();
	$token = $headers['Authorization'];
	
	if($token !== 'Basic aw'){
		http_response_code(401);
		exit();
	}
	
	if(array_key_exists('mem', $_COOKIE)){
		echo $_COOKIE['mem'];
		exit();
	}else{
		echo "0";
		exit();
	}
	
}else if ($_SERVER['REQUEST_METHOD'] == 'HEAD') {
	
	$headers = apache_request_headers();
	$token = $headers['Authorization'];
	
	if($token !== 'Basic aw'){
		http_response_code(401);
		exit();
	}
	exit();

}else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	$headers = apache_request_headers();
	$token = $headers['Authorization'];
	
	if($token !== 'Basic aw'){
		http_response_code(401);
		exit();
	}
	
	if(array_key_exists('value', $_POST)){
		$value = $_POST['value'];
		setcookie('mem', $value);
		echo $value;
		exit();
	}else{
		http_response_code(400);
		exit();
	}
	
}else if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
	
	$headers = apache_request_headers();
	$token = $headers['Authorization'];
	
	if($token !== 'Basic aw'){
		http_response_code(401);
		exit();
	}
	
	$current = 0;
	if (array_key_exists('mem', $_COOKIE)) {
		$current = $_COOKIE['mem'];
	}
	
	$putdata = fopen("php://input", "r");
	$buffer = "";
	while ($data = fread($putdata, 1024)){
		$buffer .= $data;
	}
	if(buffer !== ""){
		$value = 0;
		$json = json_decode($buffer);
		if (isset($json->value)) {
			$value = $json->value;
			$value = $value + $current;
			setcookie('mem', $value);
			echo $value;
			exit();
		} else {
			http_response_code(400);
			exit();
		}
	} else {
		http_response_code(400);
		exit();
	}
	
}else if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
	$headers = apache_request_headers();
	$token = $headers['Authorization'];
	if($token !== 'Basic aw'){
		http_response_code(401);
		exit();
	}
	setcookie("mem", "", time() - 3600);
	exit();
	
} else{
	
	http_response_code(405);
	exit();
	
}

?>