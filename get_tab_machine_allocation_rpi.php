<?php
include("connect.php");

$link=Connection();

$security_key = isset($_POST['security_key']) ? $_POST['security_key'] : null;
$imei_number = isset($_POST['imei_number']) ? $_POST['imei_number'] : null;

if($security_key == "12345"){

	$machine_list=mysqli_query($link,"SELECT machineNumber FROM `tabmachineallocation` WHERE tabmachineallocation.tabid= (SELECT androidtokens.tabid FROM `androidtokens` WHERE androidtokens.imei_number= '".$imei_number."' )  ORDER BY tabmachineallocation.timeadded DESC  ");

	if($machine_list === FALSE) { 
    	die(mysqli_error()); // TODO: better error handling
	}

	$result = array();

	while($row = mysqli_fetch_array($machine_list)) {
		array_push($result,$row[0]);
	}

	echo json_encode(array("result"=>$result));

	mysqli_free_result($machine_list);
	mysqli_close($link);

}else{
	echo "Security key not matching";
}
 	
?>