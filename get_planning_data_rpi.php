<?php
include("connect.php");

$link=Connection();

$security_key = isset($_POST['security_key']) ? $_POST['security_key'] : null;
$machineNumber = isset($_POST['machineNumber']) ? $_POST['machineNumber'] : null;
$planStatus = isset($_POST['planStatus']) ? $_POST['planStatus'] : null;


if($security_key == "12345"){

	if($planStatus =="finished"){

		//Update the 'ongoing' state of the current plan to 'complete'

		$ongoingID = 0;

		$ongoingIDResult = mysql_query("SELECT id FROM planningdata Where planningdata.orderState='ongoing' and planningdata.machineNumber = '".$machineNumber."' ",$link);

		if($ongoingIDResult === FALSE) { 
	    	die(mysql_error()); // TODO: better error handling
		}
		
		while($row = mysql_fetch_array($ongoingIDResult)) {
		   $ongoingID = $row[0];
		}

		echo "OngoingID : ".$ongoingID;

		$updateQuery = "UPDATE planningdata SET planningdata.orderState='complete' WHERE planningdata.id= '".$ongoingID."' ";
		$updateQueryResult = mysql_query($updateQuery,$link) or die(mysql_error());

		if ($updateQueryResult==1){
			echo "Successfully updated ongoing to complete";
		}else{
			echo $updateQueryResult;
		}


		$nextPlan=mysql_query("SELECT * FROM planningdata Where planningdata.orderState='incomplete' and planningdata.machineNumber = '".$machineNumber."' ORDER BY planningdata.orderStart ASC,planningdata.orderEnd ASC LIMIT 1",$link);

		if($nextPlan === FALSE) { 
	    	die(mysql_error()); // TODO: better error handling
		}

		$result = array();

		$nextPlanID = 0;

		while($row = mysql_fetch_array($nextPlan)) {
		   $nextPlanID = $row[0];	
		   array_push($result,array('styleNumber'=>$row[1],'salesOrder'=>$row[2],'lineItem'=>$row[3],'sideAndColor'=>$row[4],'machineNumber'=>$row[5],'orderStart'=>$row[6],'orderEnd'=>$row[7],'plannedQuantity'=>$row[8],'size'=>$row[9],'section'=>$row[10],'orderState'=>$row[11] ));
		}

		echo json_encode(array("result"=>$result));

		//Change the state to ongoing
		$updateNextPlanQuery = "UPDATE planningdata SET planningdata.orderState='ongoing' WHERE planningdata.id= '".$nextPlanID."' ";

		$updateNextPlanQueryResult = mysql_query($updateNextPlanQuery,$link) or die(mysql_error());

		if ($updateNextPlanQueryResult==1){
			echo "Successfully updated incomplete to ongoing";
		}else{
			echo $updateNextPlanQueryResult;
		}

		mysql_free_result($nextPlan);

		mysql_free_result($ongoingIDResult);
		
	}elseif ($planStatus=="data_request") {

		//Check whether there is ongoing plan under this machine no

		$result = array();

		$currentPlan=mysql_query("SELECT * FROM planningdata Where planningdata.orderState='ongoing' and planningdata.machineNumber = '".$machineNumber."' ORDER BY planningdata.orderStart ASC,planningdata.orderEnd ASC LIMIT 1",$link);

		if($currentPlan === FALSE) { 
	    	die(mysql_error());	
		}

		if (mysql_num_rows($currentPlan)==0){

			$nextPlan=mysql_query("SELECT * FROM planningdata Where planningdata.orderState='incomplete' and planningdata.machineNumber = '".$machineNumber."' ORDER BY planningdata.orderStart ASC,planningdata.orderEnd ASC LIMIT 1",$link);

			if($nextPlan === FALSE) { 
		    	die(mysql_error()); // TODO: better error handling
			}

			$nextPlanID = 0;

			while($row = mysql_fetch_array($nextPlan)) {
			   $nextPlanID = $row[0];	
			   array_push($result,array('styleNumber'=>$row[1],'salesOrder'=>$row[2],'lineItem'=>$row[3],'sideAndColor'=>$row[4],'machineNumber'=>$row[5],'orderStart'=>$row[6],'orderEnd'=>$row[7],'plannedQuantity'=>$row[8],'size'=>$row[9],'section'=>$row[10],'orderState'=>$row[11] ));
			}

			echo json_encode(array("result"=>$result));

			//Change the state to ongoing
			$updateNextPlanQuery = "UPDATE planningdata SET planningdata.orderState='ongoing' WHERE planningdata.id= '".$nextPlanID."' ";

			$updateNextPlanQueryResult = mysql_query($updateNextPlanQuery,$link) or die(mysql_error());

			if ($updateNextPlanQueryResult==1){
				echo "Successfully updated incomplete to ongoing";
			}else{
				echo $updateNextPlanQueryResult;
			}

			mysql_free_result($nextPlan);

		}else{
			while($row = mysql_fetch_array($currentPlan)) {
			   array_push($result,array('styleNumber'=>$row[1],'salesOrder'=>$row[2],'lineItem'=>$row[3],'sideAndColor'=>$row[4],'machineNumber'=>$row[5],'orderStart'=>$row[6],'orderEnd'=>$row[7],'plannedQuantity'=>$row[8],'size'=>$row[9],'section'=>$row[10],'orderState'=>$row[11] ));
			}

			echo json_encode(array("result"=>$result));
			
		}

		mysql_free_result($currentPlan);

		
	}

	
	mysql_close();
}else{
	echo "Security key not matching";
}
 	
?>