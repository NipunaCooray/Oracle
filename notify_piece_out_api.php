<?php

include("connect.php");
include("send_firebase_notifications.php");


$link=Connection();

$response = "";


//Make sure that it is a POST request.
if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') != 0){
    throw new Exception('Request method must be POST!');
}
 
//Make sure that the content type of the POST request has been set to application/json
$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
if(strcasecmp($contentType, 'application/json') != 0){
    throw new Exception('Content type must be: application/json');
}
 
# Get JSON as a string
$json_str = file_get_contents('php://input');
 
# Get as an object
$json_obj = json_decode($json_str,false);
 
//If json_decode failed, the JSON is invalid.
if(!is_array($json_obj)){
    throw new Exception('Received content contained invalid JSON!');
}

//print_r($json_obj);

//Saving records from bot to the DB

foreach($json_obj as $record) {
   // print_r($item);
   print $record->machineNumber;
   echo " | ";
   print $record->Timestamp;
   echo "<br>";

    $savePieceOutQuery = "INSERT INTO `piece_out_notifications` (`machineNumber`, `timestamp`) VALUES ('".$record->machineNumber."','".$record->Timestamp."')"; 

    /*

	$result = mysqli_query($link,$savePieceOutQuery) or die(mysqli_error($link));

	if ($result==1){
		$response = "Successfully saved";
	}else{
		echo $result;
	}

	*/

}

//Get all notifications that are "not_sent" and send tham 

$unsentNotificationQuery = "SELECT id,machineNumber,timestamp FROM `piece_out_notifications` WHERE piece_out_notifications.status='not_sent' ";

$unsentNotifications = mysqli_query($link,$unsentNotificationQuery) or die(mysqli_error($link));

if($unsentNotifications === FALSE) { 
	die(mysqli_error($link)); // TODO: better error handling
}

while($row =  mysqli_fetch_array($unsentNotifications)) {
   $id = $row["id"];
   $machineNumber = $row["machineNumber"];
   $timestamp = $row["timestamp"];

   echo "<br>";
   echo "ID :".$id;
   echo " | ";
   echo "Machine number :".$machineNumber;
   echo " | ";
   echo "Timestamp :".$timestamp;
   echo "<br>";

   $getFireBaseTokenQuery = "SELECT token FROM `androidtokens` WHERE androidtokens.tabid = (SELECT tabid FROM tabmachineallocation Where tabmachineallocation.machineNumber='".$machineNumber."')";

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

	$message = array("machine" => $machineNumber ,"type" => "piece_out","timestamp" => $timestamp);

	echo "Message to be sent : ";
	print_r($message);
	echo "<br>";

	// $message_status = send_notification($tokens, $message);
	// echo $message_status;

	//Only for testing
	$message_status = 1;

	if($message_status==1){
		$updateNotificationStatusQuery = "UPDATE `piece_out_notifications` SET piece_out_notifications.status= 'sent' WHERE piece_out_notifications.id= '".$id."' " ;;
	}

	echo $updateNotificationStatusQuery."<br>";

}


mysqli_close($link);


?>
