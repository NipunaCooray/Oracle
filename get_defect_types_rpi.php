<?php

include("connect.php");

$link=Connection();

$security_key = isset($_POST['security_key']) ? $_POST['security_key'] : null;


	if($security_key == "12345"){

		$defect_types=mysqli_query($link,"SELECT defecttypeid,defecttype FROM `defecttypes`");

		if($defect_types === FALSE) { 
	    	die(mysqli_error($link)); // TODO: better error handling
		}

		$result = array();

		while($row = mysqli_fetch_array($defect_types)) {
		   array_push($result,array('defecttypeid'=>$row[0],'defecttype'=>$row[1] ));
		}

		echo json_encode(array("result"=>$result));

		mysqli_free_result($defect_types);
		mysqli_close($link);

	}else{
		echo "Security key not matching";
	}
	


?>
