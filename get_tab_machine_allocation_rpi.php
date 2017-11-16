<?php
include("connect.php");

$link=Connection();

$security_key = isset($_POST['security_key']) ? $_POST['security_key'] : null;
$imei_number = isset($_POST['imei_number']) ? $_POST['imei_number'] : null;

if($security_key == "12345"){

	$machine_list=mysql_query("SELECT machine1,machine2,machine3,machine4,machine5,machine6,machine7,machine8,machine9,machine10 FROM `tabmachineallocation` WHERE tabmachineallocation.tabid= (SELECT androidtokens.tabid FROM `androidtokens` WHERE androidtokens.imei_number= '".$imei_number."' )  ORDER BY tabmachineallocation.timeadded DESC LIMIT 1 ",$link);

	if($machine_list === FALSE) { 
    	die(mysql_error()); // TODO: better error handling
	}

	$result = array();

	while($row = mysql_fetch_array($machine_list)) {
	   // array_push($result,array('machine1'=>$row[0],'machine2'=>$row[1],'machine3'=>$row[2],'machine4'=>$row[3],'machine5'=>$row[4],'machine6'=>$row[5],'machine7'=>$row[6],'machine8'=>$row[7],'machine9'=>$row[8],'machine10'=>$row[9], ));

		array_push($result,$row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8],$row[9]);

	}

	echo json_encode(array("result"=>$result));

	mysql_free_result($machine_list);
	mysql_close();

}else{
	echo "Security key not matching";
}
 	
?>