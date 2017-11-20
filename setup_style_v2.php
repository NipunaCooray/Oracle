<?php

include("connect.php");

$link=Connection();

$styleNumber = isset($_POST['styleNumber']) ? $_POST['styleNumber'] : null;

$areaList = isset($_POST['areaList']) ? $_POST['areaList'] : null;

$target_dir = "StyleImages/";
$image_location = $target_dir . basename($_FILES["myFileSelect"]["name"]);


echo $areaList;

//print_r (explode(",",$areaList));

mysql_close($link);

?>