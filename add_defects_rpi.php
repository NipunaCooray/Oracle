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

	//role is used to decide whether saving record is a new one (tm) or an existing one (qc)
	$role = isset($_POST['userRole']) ? $_POST['userRole'] : null;
	$id = isset($_POST['id']) ? $_POST['id'] : null;

	//Plan id will saved with each piece out 
	$planId = isset($_POST['planId']) ? $_POST['planId'] : null;

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


		//This is to handle requests for new piece out signals. 

		if($role=="tm"){
			$query = "INSERT INTO ".$styleNumber." (machineNo,dt,status,planId";

			foreach ($areaNames as $area) {
			    $query .= ",".$area ;
			}

			$query.= ") VALUES ('".$machineNo."','".$dt."','".$status."','".$planId."' ";

			foreach ($areaDefects as $defects) {
			    $query .= ",'".$defects."'";
			}


			$query .= ' ) '; 

			//echo $query."<br>";

			         
			$result = mysqli_query($link,$query) or die(mysqli_error($link));


			if ($result==1){
			   echo "Successfully saved";
			}else{
			   echo $result;
			}

			//Update knitted quantity of the "ongoing" record of the "machineNo" if the piece out status is "Good" or "Rework"

			if($status=="Good"or $status=="Rework"){
				$updateKnittingQuantity = "UPDATE `planningdata` SET planningdata.knittedQuantity= planningdata.knittedQuantity+1 WHERE planningdata.machineNumber= '".$machineNo."' AND planningdata.orderState= 'ongoing' " ;

				$updateQueryResult = mysqli_query($link,$updateKnittingQuantity) or die(mysqli_error($link));

				if ($updateQueryResult==1){
					//echo "Successfully updated knitting + 1";
				}else{
					echo $updateQueryResult;
				}
			}
		}else if($role=="qc"){

			//To handle old piece out records

			//What will happen if status is changed from reject to good : TO:DO	

			$oldStatusQuery = "SELECT status FROM `".$styleNumber."` WHERE id='".$id."'";
			//echo $oldStatusQuery.PHP_EOL;

			$oldStatusResult = mysqli_query($link,$oldStatusQuery) or die(mysqli_error($link));

			while($row = mysqli_fetch_array($oldStatusResult)) {
			   $oldStatus = $row[0];
			}

			//echo $oldStatus.PHP_EOL;

			if($oldStatus=="Good"&&$status=="Reject"){
				//echo "Reduce 1 from the plan id".PHP_EOL;

				$updatePlanKnttedQuantity = "UPDATE `planningdata` SET planningdata.knittedQuantity= planningdata.knittedQuantity-1 WHERE planningdata.id= '".$planId."' " ;

				$updatePlanKnttedQuantityResult = mysqli_query($link,$updatePlanKnttedQuantity) or die(mysqli_error($link));

				if ($updatePlanKnttedQuantityResult==1){
					//echo "Successfully updated knitting - 1";
				}else{
					echo $updatePlanKnttedQuantityResult;
				}



			}else if($oldStatus=="Good"&&$status=="Rework"){
				//echo "Do nothing to the plan".PHP_EOL;
			}else if($oldStatus=="Rework"&&$status=="Good"){
				//echo "Do nothing to the plan".PHP_EOL;
			}else if($oldStatus=="Rework"&&$status=="Reject"){
				
				//echo "Reduce 1 from the plan id".PHP_EOL;

				$updatePlanKnttedQuantity = "UPDATE `planningdata` SET planningdata.knittedQuantity= planningdata.knittedQuantity-1 WHERE planningdata.id= '".$planId."' " ;

				$updatePlanKnttedQuantityResult = mysqli_query($link,$updatePlanKnttedQuantity) or die(mysqli_error($link));

				if ($updatePlanKnttedQuantityResult==1){
					//echo "Successfully updated knitting - 1";
				}else{
					echo $updatePlanKnttedQuantityResult;
				}


			}else if($oldStatus=="Reject"&&$status=="Good"){
				//echo "Add 1 to the knitted quantity of the plan id".PHP_EOL;

				$updatePlanKnttedQuantity = "UPDATE `planningdata` SET planningdata.knittedQuantity= planningdata.knittedQuantity+1 WHERE planningdata.id= '".$planId."' " ;

				$updatePlanKnttedQuantityResult = mysqli_query($link,$updatePlanKnttedQuantity) or die(mysqli_error($link));

				if ($updatePlanKnttedQuantityResult==1){
					//echo "Successfully updated knitting + 1";
				}else{
					echo $updatePlanKnttedQuantityResult;
				}


			}else if($oldStatus=="Reject"&&$status=="Rework"){
				//echo "Add 1 to the knitted quantity of the plan id".PHP_EOL;

				$updatePlanKnttedQuantity = "UPDATE `planningdata` SET planningdata.knittedQuantity= planningdata.knittedQuantity+1 WHERE planningdata.id= '".$planId."' " ;

				$updatePlanKnttedQuantityResult = mysqli_query($link,$updatePlanKnttedQuantity) or die(mysqli_error($link));

				if ($updatePlanKnttedQuantityResult==1){
					//echo "Successfully updated knitting + 1";
				}else{
					echo $updatePlanKnttedQuantityResult;
				}
			}

			//Changing old record after qc change 

			$query = "UPDATE `".$styleNumber."` SET machineNo='".$machineNo."',dt='".$dt."',status='".$status."',planId='".$planId."',qceditcounter=qceditcounter+1" ;


			foreach ($areaNames as $key =>$area) {
			    $query .= ",".$area ;
			    $query .= "='".$areaDefects[$key]."'";
			}



			$query .= " WHERE id=".$id; 

			//echo $query.PHP_EOL;

			$result = mysqli_query($link,$query) or die(mysqli_error($link));


			if ($result==1){
			   echo "Successfully saved";
			}else{
			   echo $result;
			}
	

		}


		mysqli_close($link);

	}else{
		echo "Security key not matching";
	}


}

?>
