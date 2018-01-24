<?php
include("connect.php");

$link=Connection();

$token = isset($_POST['token']) ? $_POST['token'] : null;


$query = "INSERT INTO `androidtokens` (`token`) 
	VALUES ('".$token."')"; 
	
$result = mysqli_query($link,$query) or die(mysqli_error($link));
mysqli_close($link);


if ($result==1){
   echo "Successfully saved";
}else{
   echo $result;
}

   	
?>
