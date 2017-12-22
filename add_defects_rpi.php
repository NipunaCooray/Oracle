<?php


include("connect.php");

//POST request
      
$link=Connection();

//Save defects data under particular styleNumber 

if( $_POST ) {
	$styleNumber = isset($_POST['styleNumber']) ? $_POST['styleNumber'] : null;
	$security_key = isset($_POST['security_key']) ? $_POST['security_key'] : null;
	$machineNo = isset($_POST['machineNumber']) ? $_POST['machineNumber'] : null;
	$defect_list = isset($_POST['defect_list']) ? $_POST['defect_list'] : null;
	$dt = isset($_POST['timestamp']) ? $_POST['timestamp'] : null;
	$status = isset($_POST['status']) ? $_POST['status'] : null;

	if($security_key == "12345"){

	//Insert data to particular style number table
	//print_r($defect_list);	

	$rows = count($defect_list);

	$areaNames = array();
	$areaDefects = array();

	foreach($defect_list as $area => $defects) {
	    // echo "Key=" . $area . ", Value=" . $defects;
	    // echo "<br>";
	    array_push($areaNames, $area);
	    array_push($areaDefects, $defects);
	}

	// print_r($areaNames);
	// print_r($areaDefects);



	$query = "INSERT INTO ".$styleNumber." (machineNo,dt,status";

	foreach ($areaNames as $area) {
	    $query .= ",".$area ;
	}

	$query.= ") VALUES ('".$machineNo."','".$dt."','".$status."' ";

	foreach ($areaDefects as $defects) {
	    $query .= ",'".$defects."'";
	}


	$query .= ' ) '; 

	//echo $query."<br>";

	         
	$result = mysql_query($query,$link) or die(mysql_error());


	if ($result==1){
	   echo "Successfully saved";
	}else{
	   echo $result;
	}

	//Update knitted quantity of the "ongoing" record of the "machineNo"

	if($status=="Good"){
		$updateKnittingQuantity = "UPDATE `planningdata` SET planningdata.knittedQuantity= planningdata.knittedQuantity+1 WHERE planningdata.machineNumber= '".$machineNo."' AND planningdata.orderState= 'ongoing' " ;

		$updateQueryResult = mysql_query($updateKnittingQuantity,$link) or die(mysql_error());

		if ($updateQueryResult==1){
			//echo "Successfully updated knitting + 1";
		}else{
			echo $updateQueryResult;
		}
	}

	mysql_close($link);

	}else{
		echo "Security key not matching";
	}


}

?>
