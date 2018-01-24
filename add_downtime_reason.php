<?php

include("connect.php");

//POST request
   	
$link=Connection();

$downtimeid = isset($_POST['downtimeid']) ? $_POST['downtimeid'] : null;
$downtimetype = isset($_POST['downtimetype']) ? $_POST['downtimetype'] : null;
$downtimereason = isset($_POST['downtimereason']) ? $_POST['downtimereason'] : null;
$notifyinguserid1 = isset($_POST['userlist1']) ? $_POST['userlist1'] : null;
$downtimenotifytime1 = isset($_POST['downtimenotifytime1']) ? $_POST['downtimenotifytime1'] : null;
$notifyinguserid2 = isset($_POST['userlist2']) ? $_POST['userlist2'] : null;
$downtimenotifytime2 = isset($_POST['downtimenotifytime2']) ? $_POST['downtimenotifytime2'] : null;
$notifyinguserid3 = isset($_POST['userlist3']) ? $_POST['userlist3'] : null;
$downtimenotifytime3 = isset($_POST['downtimenotifytime3']) ? $_POST['downtimenotifytime3'] : null;
$notifyinguserid4 = isset($_POST['userlist4']) ? $_POST['userlist4'] : null;
$downtimenotifytime4 = isset($_POST['downtimenotifytime4']) ? $_POST['downtimenotifytime4'] : null;

 $query = "INSERT INTO `downtimereason` (`downtimeid`, `description`,`downtimetype` , `notifyinguserid1`,`downtimenotifytime1`, `notifyinguserid2`,`downtimenotifytime2`, `notifyinguserid3`,`downtimenotifytime3`, `notifyinguserid4`,`downtimenotifytime4`) 
   		VALUES ('".$downtimeid."','".$downtimereason."','".$downtimetype."','".$notifyinguserid1."','".$downtimenotifytime1."','".$notifyinguserid2."','".$downtimenotifytime2."','".$notifyinguserid3."','".$downtimenotifytime3."','".$notifyinguserid4."','".$downtimenotifytime4."')"; 
      	
$result = mysqli_query($link,$query) or die(mysqli_error($link));


if ($result==1){
	echo "Successfully saved";
}else{
	echo $result;
}


mysqli_close($link);

?>