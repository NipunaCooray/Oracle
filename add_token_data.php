<?php
include("connect.php");

$link=Connection();

$tokenid = isset($_POST['tokenid']) ? $_POST['tokenid'] : null;
$imei_number = isset($_POST['imei_number']) ? $_POST['imei_number'] : null;


$query = "INSERT INTO `androidtokens` (`token`,`imei_number`) 
	VALUES ('".$tokenid."','".$imei_number."')"; 
	
$result = mysql_query($query,$link) or die(mysql_error());
mysql_close($link);


if ($result==1){
   echo "Successfully saved";
}else{
   echo $result;
}

   	
?>
