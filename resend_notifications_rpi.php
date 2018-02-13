<?php


include("connect.php");
include("send_firebase_notifications.php");

$response = 0;


$link=Connection();

$security_key = isset($_POST['security_key']) ? $_POST['security_key'] : null;
$imei_number = isset($_POST['imei_number']) ? $_POST['imei_number'] : null;

if($security_key == $GLOBALS['server_key']){

	//Need to send pieceout notifications

	$sentNotificationQuery = "SELECT  piece_out_notifications.id,piece_out_notifications.machineNumber,piece_out_notifications.timestamp FROM `piece_out_notifications` WHERE piece_out_notifications.status='sent' AND piece_out_notifications.machineNumber IN (SELECT tabmachineallocation.machineNumber FROM tabmachineallocation WHERE tabmachineallocation.tabid =(SELECT tabid FROM androidtokens Where androidtokens.imei_number= '".$imei_number." ')) ";

	$sentNotificationResult = mysqli_query($link,$sentNotificationQuery) or die(mysqli_error($link));

	if($sentNotificationResult === FALSE) { 
		die(mysqli_error($link)); // TODO: better error handling
	}

	while($row =  mysqli_fetch_array($sentNotificationResult)) {
		$id = $row["id"];
		$machineNumber = $row["machineNumber"];
		$timestamp = $row["timestamp"];

		$getFireBaseTokenQuery = "SELECT token FROM `androidtokens` WHERE androidtokens.imei_number ='".$imei_number."' ";

		echo $getFireBaseTokenQuery;
		echo "<br>";

		$tokens = array();
		$tokenResult = mysqli_query($link,$getFireBaseTokenQuery) or die(mysqli_error($link));

		while($row = mysqli_fetch_array($tokenResult)) {
			$tokens[] = $row["token"];
		}


		echo "Firebase token : ";
		print_r($tokens);
		echo "<br>";

		$message = array("notificationId" => $id,"machineNumber" => $machineNumber ,"notificationType" => "piece_out","timestamp" => $timestamp);

		echo "Message to be sent : ";
		print_r($message);
		echo "<br>";

		$message_status = send_notification($tokens, $message);
		echo $message_status;
		echo "<br>";

		$firebaseResponse = json_decode($message_status);
		$firebaseSuccessValue = $firebaseResponse->{'success'}; 

		if($firebaseSuccessValue==1){
			$response = 1;
		}


	}

	//Need to send downtime notifications

	$sentNotificationQuery = "SELECT  machine_down_notifications.id,machine_down_notifications.machineNumber,machine_down_notifications.timestamp FROM `machine_down_notifications` WHERE machine_down_notifications.status='sent' AND machine_down_notifications.machineNumber IN (SELECT tabmachineallocation.machineNumber FROM tabmachineallocation WHERE tabmachineallocation.tabid =(SELECT tabid FROM androidtokens Where androidtokens.imei_number= '".$imei_number." ')) ";

	$sentNotificationResult = mysqli_query($link,$sentNotificationQuery) or die(mysqli_error($link));

	if($sentNotificationResult === FALSE) { 
		die(mysqli_error($link)); // TODO: better error handling
	}

	while($row =  mysqli_fetch_array($sentNotificationResult)) {
		$id = $row["id"];
		$machineNumber = $row["machineNumber"];
		$timestamp = $row["timestamp"];

		$getFireBaseTokenQuery = "SELECT token FROM `androidtokens` WHERE androidtokens.imei_number ='".$imei_number."' ";

		echo $getFireBaseTokenQuery;
		echo "<br>";

		$tokens = array();
		$tokenResult = mysqli_query($link,$getFireBaseTokenQuery) or die(mysqli_error($link));

		while($row = mysqli_fetch_array($tokenResult)) {
			$tokens[] = $row["token"];
		}


		echo "Firebase token : ";
		print_r($tokens);
		echo "<br>";

		$message = array("notificationId" => $id,"machineNumber" => $machineNumber ,"notificationType" => "downtime","timestamp" => $timestamp);

		echo "Message to be sent : ";
		print_r($message);
		echo "<br>";

		$message_status = send_notification($tokens, $message);
		echo $message_status;
		echo "<br>";

		$firebaseResponse = json_decode($message_status);
		$firebaseSuccessValue = $firebaseResponse->{'success'}; 

		if($firebaseSuccessValue==1){
			$response = 1;
		}


	}


	if($response==1){
		echo "Successfully sent";
	}

	mysqli_free_result($sentNotificationResult);
	

}else{
	echo "Security key not matching";
}

mysqli_close($link);

?>