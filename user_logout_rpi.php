<?php
include("connect.php");

$link=Connection();

$security_key = isset($_POST['security_key']) ? $_POST['security_key'] : null;
$user_epf = isset($_POST['user_epf']) ? $_POST['user_epf'] : null;



if($security_key == "12345"){
	$changeUserLoggedStatusQuery = "UPDATE team_members SET team_members.loggedStatus='loggedout' WHERE team_members.epf_no='".$user_epf." ' ";
	$changeUserLoggedResult = mysqli_query($link,$changeUserLoggedStatusQuery) or die(mysqli_error($link));

	if ($changeUserLoggedResult==1){
	   echo "Logout successfully";
	}else{
	   echo $changeUserLoggedResult;
	}

mysqli_close($link);

}else{
	echo "Security key not matching";
}

 	
?>