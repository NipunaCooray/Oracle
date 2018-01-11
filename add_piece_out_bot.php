<?php

// include("connect.php");

// $link=Connection();

// $security_key = isset($_POST['security_key']) ? $_POST['security_key'] : null;


// if($security_key == "12345"){

// 	if( $_POST ) {
// 		$styleNumber = isset($_POST['styleNumber']) ? $_POST['styleNumber'] : null;



// 	}

// 	mysqli_free_result($defect_types);
// 	mysqli_close($link);

// }else{
// 	echo "Security key not matching";
// }
	

$string = file_get_contents("./test2.json");
$json_data = json_decode($string, false);	

print_r($json_data);




?>
