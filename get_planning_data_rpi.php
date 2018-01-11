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

		$ongoingIDResult = mysqli_query($link,"SELECT id FROM planningdata Where planningdata.orderState='ongoing' and planningdata.machineNumber = '".$machineNumber."' ");

		if($ongoingIDResult === FALSE) { 
	    	die(mysqli_error()); // TODO: better error handling
		}
		
		while($row = mysqli_fetch_array($ongoingIDResult)) {
		   $ongoingID = $row[0];
		}

		//echo "OngoingID : ".$ongoingID;

		$updateQuery = "UPDATE planningdata SET planningdata.orderState='complete' WHERE planningdata.id= '".$ongoingID."' ";
		$updateQueryResult = mysqli_query($link,$updateQuery) or die(mysqli_error());

		if ($updateQueryResult==1){
			//echo "Successfully updated ongoing to complete";
		}else{
			//echo $updateQueryResult;
		}


		$nextPlan=mysqli_query($link,"SELECT * FROM planningdata Where planningdata.orderState='incomplete' and planningdata.machineNumber = '".$machineNumber."' ORDER BY planningdata.orderStart ASC,planningdata.orderEnd ASC LIMIT 1");

		if($nextPlan === FALSE) { 
	    	die(mysqli_error()); // TODO: better error handling
		}

		$result = array();

		$nextPlanID = 0;

		while($row = mysqli_fetch_array($nextPlan)) {
		   $nextPlanID = $row[0];	
		   array_push($result,array('planId'=>$row[0],'machineNumber'=>$row[1],'styleNumber'=>$row[2],'salesOrderLineItem'=>$row[3],'cw'=>$row[4],'component'=>$row[5],'size'=>$row[6],'plannedQuantity'=>$row[7],'orderStart'=>$row[8],'orderEnd'=>$row[9],'knittedQuantity'=>$row[10],'reworkQuantity'=>$row[11],'rejectQuantity'=>$row[12],'orderState'=>$row[13],'planAddedTime'=>$row[14] ));
		}

		if($nextPlanID==0){
			echo json_encode(array("result"=>"Plan not available"));

		}else{
			echo json_encode(array("result"=>$result));

			//Change the state to ongoing
			$updateNextPlanQuery = "UPDATE planningdata SET planningdata.orderState='ongoing' WHERE planningdata.id= '".$nextPlanID."' ";

			$updateNextPlanQueryResult = mysqli_query($link,$updateNextPlanQuery) or die(mysqli_error());

			if ($updateNextPlanQueryResult==1){
				//echo "Successfully updated incomplete to ongoing";
			}else{
				//echo $updateNextPlanQueryResult;
			}

		}

		
		mysqli_free_result($nextPlan);

		mysqli_free_result($ongoingIDResult);
		
	}elseif ($planStatus=="data_request") {

		//Check whether there is ongoing plan under this machine no

		$result = array();

		$currentPlan=mysqli_query($link,"SELECT * FROM planningdata Where planningdata.orderState='ongoing' and planningdata.machineNumber = '".$machineNumber."' ORDER BY planningdata.orderStart ASC,planningdata.orderEnd ASC LIMIT 1");

		if($currentPlan === FALSE) { 
	    	die(mysqli_error());	
		}

		if (mysqli_num_rows($currentPlan)==0){

			$nextPlan=mysqli_query($link,"SELECT * FROM planningdata Where planningdata.orderState='incomplete' and planningdata.machineNumber = '".$machineNumber."' ORDER BY planningdata.orderStart ASC,planningdata.orderEnd ASC LIMIT 1");

			if($nextPlan === FALSE) { 

		    	die(mysqli_error()); // TODO: better error handling
			}

			$nextPlanID = 0;

			while($row = mysqli_fetch_array($nextPlan)) {
			   $nextPlanID = $row[0];	
			   array_push($result,array('planId'=>$row[0],'machineNumber'=>$row[1],'styleNumber'=>$row[2],'salesOrderLineItem'=>$row[3],'cw'=>$row[4],'component'=>$row[5],'size'=>$row[6],'plannedQuantity'=>$row[7],'orderStart'=>$row[8],'orderEnd'=>$row[9],'knittedQuantity'=>$row[10],'reworkQuantity'=>$row[11],'rejectQuantity'=>$row[12],'orderState'=>$row[13],'planAddedTime'=>$row[14] ));
			}

			echo json_encode(array("result"=>$result));

			//Change the state to ongoing
			$updateNextPlanQuery = "UPDATE planningdata SET planningdata.orderState='ongoing' WHERE planningdata.id= '".$nextPlanID."' ";

			$updateNextPlanQueryResult = mysqli_query($link,$updateNextPlanQuery) or die(mysqli_error());

			if ($updateNextPlanQueryResult==1){
				//echo "Successfully updated incomplete to ongoing";
			}else{
				//echo $updateNextPlanQueryResult;
			}

			mysqli_free_result($nextPlan);

		}else{
			while($row = mysqli_fetch_array($currentPlan)) {
			    array_push($result,array('planId'=>$row[0],'machineNumber'=>$row[1],'styleNumber'=>$row[2],'salesOrderLineItem'=>$row[3],'cw'=>$row[4],'component'=>$row[5],'size'=>$row[6],'plannedQuantity'=>$row[7],'orderStart'=>$row[8],'orderEnd'=>$row[9],'knittedQuantity'=>$row[10],'reworkQuantity'=>$row[11],'rejectQuantity'=>$row[12],'orderState'=>$row[13],'planAddedTime'=>$row[14] ));
			}

			echo json_encode(array("result"=>$result));
			
		}

		mysqli_free_result($currentPlan);

	}

	
	mysqli_close($link);
}else{
	echo "Security key not matching";
}
 	
?>