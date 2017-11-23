<?php

include("connect.php");

$link=Connection();

$styleNumber = isset($_POST['styleNumber']) ? $_POST['styleNumber'] : null;

$areaList = isset($_POST['areaList']) ? $_POST['areaList'] : null;

$target_dir = "StyleImages/";
$image_location = $target_dir . basename($_FILES["myFileSelect"]["name"]);

//Saving data to style_data table
$query = "INSERT INTO `styledata` (`styleNumber`, `imageLocation`,`areaList`) VALUES ('".$styleNumber."','".$image_location."','".$areaList."')"; 
      	
$result = mysql_query($query,$link) or die(mysql_error());


if ($result==1){
	echo "Style data successfully saved";
}else{
	echo $result;
}

$areaArray = array();
$areaArray =  explode(",",$areaList);

print_r($areaArray);
$number_of_areas = count($areaArray);

echo "<br> Number of elements :".$number_of_areas."<br>";

$sql = "CREATE TABLE IF NOT EXISTS ".$styleNumber." (id int NOT NULL AUTO_INCREMENT,machineNo VARCHAR(100),dt TIMESTAMP,status VARCHAR (100),";

foreach ($areaArray as $area) {
    $sql .= $area. " VARCHAR(200), ";
}

$sql .= "PRIMARY KEY (id)) ENGINE=InnoDB";

echo $sql."<br>";

//mysql_select_db('dboracle');


$result2 = mysql_query($sql,$link) or die(mysql_error());


if ($result2==1){
	echo "Successfully created table :".$styleNumber;
}else{
	echo $result2;
}

mysql_close($link);


?>