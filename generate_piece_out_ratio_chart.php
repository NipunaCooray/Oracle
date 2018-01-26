<?php

include("connect.php");

$link=Connection();

$query = "SELECT planningdata.machineNumber, planningdata.knittedQuantity,planningdata.reworkQuantity,planningdata.rejectQuantity,planningdata.plannedQuantity  FROM `planningdata` Where planningdata.orderState='ongoing' ";

$results=mysqli_query($link,$query);

if($results === FALSE) { 
	die(mysqli_error($link)); // TODO: better error handling
}

$data = array();

while($row = mysqli_fetch_array($results)) {

	$machineNumber = $row[0];
	$knittedQuantity = $row[1];
	$reworkQuantity = $row[2];
	$rejectQuantity = $row[3];
	$plannedQuantity = $row[4];

	$knittedPercentage = round(($knittedQuantity/$plannedQuantity)*100,2);
	$reworkPercentage = round(($reworkQuantity/$plannedQuantity)*100,2);
	$rejectPercentage = round(($rejectQuantity/$plannedQuantity)*100,2);

   array_push($data,array('machineNumber'=>$machineNumber,'knittedQuantity'=>$knittedPercentage,'reworkQuantity'=>$reworkPercentage,'rejectQuantity'=>$rejectPercentage ));
}




print (json_encode($data));




?>