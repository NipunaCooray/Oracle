<?php
include("connect.php");

$link=Connection();

$security_key = isset($_POST['security_key']) ? $_POST['security_key'] : null;
$user_epf = isset($_POST['user_epf']) ? $_POST['user_epf'] : null;
$user_pword = isset($_POST['user_pword']) ? $_POST['user_pword'] : null;


if($security_key == "12345"){

	$user =mysql_query("SELECT epf_no,team_member_name,shift,image_location FROM `team_members` WHERE team_members.epf_no='".$user_epf."' AND team_members.password='".$user_pword."'; ",$link);

	if($user === FALSE) { 
    	die(mysql_error()); // TODO: better error handling
	}



	$result = array();

	while($row = mysql_fetch_array($user)) {
	   array_push($result,array('userEPF'=>$row[0],'userName'=>$row[1],'shift'=>$row[2],'imageURL'=>$row[3] ));
	}

	if (mysql_num_rows($user)==0) {
		echo "Invalid epf or password";
	}else{
		echo json_encode(array("result"=>$result));
	}

	mysql_free_result($user);
	mysql_close();

}else{
	echo "Security key not matching";
}
 	
?>