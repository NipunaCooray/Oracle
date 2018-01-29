<?php
include("connect.php");

$link=Connection();


$imei_number = isset($_POST['imei_number']) ? $_POST['imei_number'] : null;


$query = "INSERT INTO `androidtokens` (`imei_number`) 
	VALUES ('".$imei_number."')"; 
	
$result = mysqli_query($link,$query) or die(mysqli_error($link));
mysqli_close($link);


if ($result==1){
   echo "Successfully saved";
}else{
   echo $result;
}

   	
?>
