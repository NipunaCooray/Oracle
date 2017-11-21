<?php
include("connect.php");

$link=Connection();

$security_key = isset($_POST['security_key']) ? $_POST['security_key'] : null;
$styleNumber = isset($_POST['styleNumber']) ? $_POST['styleNumber'] : null;

if($security_key == "12345"){

	$styleData=mysql_query("SELECT styledata.imageLocation,styledata.areaList FROM `styledata` WHERE styledata.styleNumber= '".$styleNumber."' ",$link);

	if($styleData === FALSE) { 
    	die(mysql_error()); // TODO: better error handling
	}

	//$result = array();
	$result = new stdClass();

	$imageLocation="";
	$areaList="";

	while($row = mysql_fetch_array($styleData)) {
	   $imageLocation = $row[0];
	   $areaList = $row[1];

	}

	echo $imageLocation."<br>";
	echo $areaList."<br>";

	$areaArray = array();
	$areaArray =  explode(",",$areaList);	

	print_r($areaArray);


	$result->imageURL = $imageLocation;
	$result->areaList = json_encode($areaArray);
	

	
	print_r($result);

	echo json_encode(array("result"=>$result));

	mysql_free_result($styleData);
	mysql_close();


}else{
	echo "Security key not matching";
}
 	
?>