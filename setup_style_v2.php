<?php

include("connect.php");

$link=Connection();

//Uploading style image to the StyleData folder

$target_dir = "StyleImages/";
$target_file = $target_dir . basename($_FILES["myFileSelect"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["myFileSelect"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["myFileSelect"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "File was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["myFileSelect"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["myFileSelect"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


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