<?php
include("connect.php");

$link=Connection();


$security_key = isset($_POST['security_key']) ? $_POST['security_key'] : null;
$machineNumber = isset($_POST['machineNumber']) ? $_POST['machineNumber'] : null;
$notificationId = isset($_POST['notificationId']) ? $_POST['notificationId'] : null;
$stopTime = isset($_POST['stopTime']) ? $_POST['stopTime'] : null;
$startTime = isset($_POST['startTime']) ? $_POST['startTime'] : null;
$duration = isset($_POST['duration']) ? $_POST['duration'] : null;
$reason = isset($_POST['reason']) ? $_POST['reason'] : null;
$type = isset($_POST['type']) ? $_POST['type'] : null;
$remarks = isset($_POST['remarks']) ? $_POST['remarks'] : null;



if($security_key == $GLOBALS['server_key']){

	$query = "INSERT INTO `downtimes` ( `machineNumber`,`stopTime`,`startTime`,`duration`,`reason`,`type`,`remarks`) 
		VALUES ('".$machineNumber."','".$stopTime."','".$startTime."','".$duration."','".$reason."','".$type."','".$remarks."')"; 
		
	$result = mysqli_query($link,$query) or die(mysqli_error($link));


	if ($result==1){
	   echo "Successfully saved";
	}else{
	   echo $result;
	}

	//------------------------------------------------------------------

	//Updating notification status when piece infor is added to the db 
			
	$updateNotificationStatusQuery = "UPDATE `machine_down_notifications` SET machine_down_notifications.status= 'serviced' WHERE machine_down_notifications.id= '".$notificationId."' ";
	$updateNotificationStatusResult = mysqli_query($link,$updateNotificationStatusQuery) or die(mysqli_error($link));

	if ($updateNotificationStatusResult==1){
		//echo "Successfully updated knitted quantity to serviced";
	}else{
		echo $updateNotificationStatusResult;
	}

	mysqli_close($link);


}else{
	echo "Security key not matching";
}
   	
?>
