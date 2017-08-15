<?php
include("connect.php");

$link=Connection();

$downtimetypeid = isset($_POST['downtimetypeid']) ? $_POST['downtimetypeid'] : null;
$machineno = isset($_POST['machineno']) ? $_POST['machineno'] : null;
$stoptime = isset($_POST['stoptime']) ? $_POST['stoptime'] : null;
$starttime = isset($_POST['starttime']) ? $_POST['starttime'] : null;
$reason = isset($_POST['reason']) ? $_POST['reason'] : null;



$query = "INSERT INTO `downtimes` (`downtimetypeid`, `machineno`,`stoptime`, `starttime`,`reason`) 
	VALUES ('".$downtimetypeid."','".$machineno."','".$stoptime."','".$starttime."','".$reason."')"; 
	
$result = mysql_query($query,$link) or die(mysql_error());
mysql_close($link);


if ($result==1){
   echo "Successfully saved";
}else{
   echo $result;
}

   	
?>
