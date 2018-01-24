<?php
include("connect.php");

$link=Connection();

$security_key = isset($_POST['security_key']) ? $_POST['security_key'] : null;
$machine_number = isset($_POST['machine_number']) ? $_POST['machine_number'] : null;


if($security_key == "12345"){

	$knitted_quantity=mysqli_query($link,"SELECT knittedQuantity FROM `planningdata` Where planningdata.orderState= 'ongoing' AND planningdata.machineNumber='".$machine_number."' ");

	if($knitted_quantity === FALSE) { 
    	die(mysqli_error($link)); // TODO: better error handling
	}

	$result = array();

	while($row = mysqli_fetch_array($knitted_quantity)) {
	   array_push($result,array('knitted_quantity'=>$row[0] ));
	}

	echo json_encode(array("result"=>$result));

	mysqli_free_result($knitted_quantity);
	mysqli_close($link);

}else{
	echo "Security key not matching";
}
 	
?>