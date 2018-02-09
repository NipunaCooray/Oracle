<?php
include("connect.php");

$link=Connection();

$security_key = isset($_POST['security_key']) ? $_POST['security_key'] : null;
$downtimetypeid = isset($_POST['downtimetypeid']) ? $_POST['downtimetypeid'] : null;
$machineno = isset($_POST['machineno']) ? $_POST['machineno'] : null;
$stoptime = isset($_POST['stoptime']) ? $_POST['stoptime'] : null;
$starttime = isset($_POST['starttime']) ? $_POST['starttime'] : null;
$reason = isset($_POST['reason']) ? $_POST['reason'] : null;

if($security_key == $GLOBALS['server_key']){

	$query = "INSERT INTO `downtimes` (`downtimetypeid`, `machineno`,`stoptime`, `starttime`,`reason`) 
		VALUES ('".$downtimetypeid."','".$machineno."','".$stoptime."','".$starttime."','".$reason."')"; 
		
	$result = mysqli_query($link,$query) or die(mysqli_error($link));

	mysqli_close($link);


	if ($result==1){
	   echo "Successfully saved";
	}else{
	   echo $result;
	}


}else{
	echo "Security key not matching";
}
   	
?>
