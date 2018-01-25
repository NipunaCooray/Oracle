<?php 
include("connect.php"); 	

$link=Connection();

$downtimeid = isset($_POST['downtimeid']) ? $_POST['downtimeid'] : null;


$query="DELETE FROM `downtimereason` WHERE `downtimeid`= '".$downtimeid."' ";

$result = mysqli_query($link,$query) or die(mysqli_error($link));
mysqli_close($link);

if($result==1){
	echo "Deleted downtime reason with id ".$downtimeid;
}


?>