<?php

include("connect.php");

$link=Connection();



$security_key = isset($_POST['security_key']) ? $_POST['security_key'] : null;
$user_epf = isset($_POST['user_epf']) ? $_POST['user_epf'] : null;
$user_pword = isset($_POST['user_pword']) ? $_POST['user_pword'] : null;



if($security_key ==  $GLOBALS['server_key']){

	$user =mysqli_query($link,"SELECT epf_no,team_member_name,shift,userRole,image_location FROM `team_members` WHERE team_members.epf_no='".$user_epf."' AND team_members.password='".$user_pword."'; ");

	if($user === FALSE) { 
    	die(mysqli_error($link)); // TODO: better error handling
	}



	$result = array();


	while($row = mysqli_fetch_array($user)) {

	   array_push($result,array('userEPF'=>$row[0],'userName'=>$row[1],'shift'=>$row[2],'userRole'=>$row[3],'imageURL'=>$row[4] ));
	}

	if (mysqli_num_rows($user)==0) {
		echo "Invalid epf or password";
	}else{
		//Need to check whether the user is already logged in

		$getUserLoggedStatusQuery = "SELECT team_members.loggedStatus FROM `team_members` WHERE  team_members.epf_no='".$user_epf." ' ";
		$getUserLoggedResult = mysqli_query($link,$getUserLoggedStatusQuery) or die(mysqli_error($link));

		$userLoggedStatus ='';

		while($row = mysqli_fetch_array($getUserLoggedResult)) {
			$userLoggedStatus = $row[0];

		}


		if($userLoggedStatus=="loggedin"){
			echo "User already logged in";
		}else if($userLoggedStatus=="loggedout"){
			//Change user loggged in status in DB
			$changeUserLoggedStatusQuery = "UPDATE team_members SET team_members.loggedStatus='loggedin' WHERE team_members.epf_no='".$user_epf." ' ";
			$changeUserLoggedResult = mysqli_query($link,$changeUserLoggedStatusQuery) or die(mysqli_error($link));

			if ($changeUserLoggedResult==1){
			   //echo "Updated";
			}else{
			   echo $changeUserLoggedResult;
			}

			echo json_encode(array("result"=>$result));

			}
		
	}

	mysqli_free_result($user);
	mysqli_close($link);

}else{
	echo "Security key not matching";
}
 	
?>