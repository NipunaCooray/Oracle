<?php
include("connect.php");

$link=Connection();

$security_key = isset($_POST['security_key']) ? $_POST['security_key'] : null;
$styleNumber = isset($_POST['styleNumber']) ? $_POST['styleNumber'] : null;

if($security_key == $GLOBALS['server_key']){

	$styleData=mysqli_query($link,"SELECT styledata.imageLocation,styledata.areaList FROM `styledata` WHERE styledata.styleNumber= '".$styleNumber."' ");

	if($styleData === FALSE) { 
    	die(mysqli_error($link)); // TODO: better error handling
	}

	//$result = array();
	$result = new stdClass();

	$imageLocation="";
	$areaList="";

	while($row = mysqli_fetch_array($styleData)) {
	   $imageLocation = $row[0];
	   $areaList = $row[1];

	}

	// echo $imageLocation."<br>";
	// echo $areaList."<br>";

	$areaArray = array();
	$areaArray =  explode(",",$areaList);	

	//print_r($areaArray);


	$result->imageURL = $imageLocation;
	$result->areaList = $areaArray;
	

	
	//print_r($result);

	echo json_encode(array("result"=>$result));

	mysqli_free_result($styleData);
	mysqli_close($link);


}else{
	echo "Security key not matching";
}
 	
?>