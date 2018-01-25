<?php 
include("connect.php"); 	

$link=Connection();

$notifyinguserid = isset($_POST['notifyinguserid']) ? $_POST['notifyinguserid'] : null;

$query="DELETE FROM `notifyingusers` WHERE `notifyinguserid`= '".$notifyinguserid."' ";

$result = mysqli_query($link,$query) or exit(mysqli_error($link));

mysqli_close($link);


if($result==1){
	echo "Deleted notifying user with id ".$notifyinguserid;
}
	

?>