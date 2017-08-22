<?php
include("connect.php");

$link=Connection();

$security_key = isset($_POST['security_key']) ? $_POST['security_key'] : null;


if($security_key == "12345"){

	$defect_types=mysql_query("SELECT downtimeid,description,downtimetype FROM `downtimereason`",$link);

	if($defect_types === FALSE) { 
    	die(mysql_error()); // TODO: better error handling
	}

	$result = array();

	while($row = mysql_fetch_array($defect_types)) {
	   array_push($result,array('downtimeid'=>$row[0],'description'=>$row[1],'downtimetype'=>$row[2] ));
	}

	echo json_encode(array("result"=>$result));

	mysql_free_result($defect_types);
	mysql_close();


}else{
	echo "Security key not matching";
}
 	
?>
