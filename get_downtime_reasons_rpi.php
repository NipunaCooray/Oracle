<?php
include("connect.php");

$link=Connection();

$security_key = isset($_POST['security_key']) ? $_POST['security_key'] : null;


if($security_key == "12345"){

	$defect_types=mysqli_query($link,"SELECT downtimeid,description,downtimetype FROM `downtimereason`");

	if($defect_types === FALSE) { 
    	die(mysqli_error($link)); // TODO: better error handling
	}

	$result = array();

	while($row = mysqli_fetch_array($defect_types)) {
	   array_push($result,array('downtimeid'=>$row[0],'description'=>$row[1],'downtimetype'=>$row[2] ));
	}

	echo json_encode(array("result"=>$result));

	mysqli_free_result($defect_types);
	mysqli_close($link);


}else{
	echo "Security key not matching";
}
 	
?>
