<?php
include("connect.php");

$link=Connection();

$security_key = isset($_POST['security_key']) ? $_POST['security_key'] : null;


if($security_key == "12345"){

	$defect_types=mysql_query("SELECT defecttypeid,defecttype FROM `defecttypes`",$link);

	if($defect_types === FALSE) { 
    	die(mysql_error()); // TODO: better error handling
	}

	$result = array();

	while($row = mysql_fetch_array($defect_types)) {
	   array_push($result,array('defecttypeid'=>$row[0],'defecttype'=>$row[1] ));
	}

	echo json_encode(array("result"=>$result));

	mysql_free_result($defect_types);
	mysql_close();

}else{
	echo "Security key not matching";
}
 	
?>
