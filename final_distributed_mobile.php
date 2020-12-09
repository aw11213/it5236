<?php
//echo "line 2 hello";
// lines of code provide through the lecture 
$x = "";
$y = "";
$z = "";
if ($_SERVER['REQUEST_METHOD']=== 'POST'){
//echo "line 4 hello";
	$x=floatval($_POST["x"]);
	$y=floatval($_POST["y"]);
	$z=floatval($_POST["z"]);
	
	$array = array("x"=>$x, "y"=>$y,"z"=>$z);
	$json = json_encode($array);
	
	//code below from postman
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://us-central1-averywhelan.cloudfunctions.net/function-area_of_a_triangle',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => $json,
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;


}
//echo "line 34 hello";
?>

<!doctype html>
<html> 
   <head> 
    <meta charset="UTF-8">
	<meta name="author" content="calculator">
   

   </head> 
  <!-- form design from w3schools-->
   <body> 
      <div class = title > Area of a Triangle</div> 
	  <form action='final_distributed_mobile.php' method="POST">
		  <label for="sideone">First side of the triangle:</label>
		  <input type="number" id="sideone" name="x" step= ".001"><br>
		  <label for="sidetwo">Secong side of the triangle:</label>
		  <input type="number" id="sidetwo" name="y"step= ".001">
		  <label for="sidethree">Third side of the triangle:</label>
		  <input type="number" id="sidethree" name="z"step= ".001">
		  <input type="submit" value="Submit"> 
		</form>
<p id="response"> The area of a triangle is:<?php echo $response?></p><br>
		 
	 


   </body> 
</html>    
