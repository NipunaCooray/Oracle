<?php
include("connect.php");

$link=Connection();

$token = isset($_POST['token']) ? $_POST['token'] : null;


$query = "INSERT INTO `androidtokens` (`token`) 
	VALUES ('".$token."')"; 
	
$result = mysql_query($query,$link) or die(mysql_error());
mysql_close($link);


if ($result==1){
   echo "Successfully saved";
}else{
   echo $result;
}

   	
?>
