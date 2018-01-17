<?php
include("connect.php");

$link=Connection();

$security_key = isset($_POST['security_key']) ? $_POST['security_key'] : null;
$imei_number = isset($_POST['imei_number']) ? $_POST['imei_number'] : null;
$token = isset($_POST['token']) ? $_POST['token'] : null;

if($security_key == "12345"){

	$updateServerTokenQuery = "UPDATE `androidtokens` SET androidtokens.token= '".$token."' WHERE androidtokens.imei_number= '".$imei_number."' " ;

	

	$updateServerTokenResult = mysqli_query($link,$updateServerTokenQuery) or die(mysqli_error($link));

	if ($updateServerTokenResult==1){
		echo "Successfully saved";
	}else{
		echo $updateNextPlanQueryResult;
	}

	
	mysqli_free_result($updateServerTokenResult);
	mysqli_close($link);

}else{
	echo "Security key not matching";
}
 	
?>