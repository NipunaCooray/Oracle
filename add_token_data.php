<?php
include("connect.php");

$link=Connection();

$tokenid = isset($_POST['tokenid']) ? $_POST['tokenid'] : null;


$query = "INSERT INTO `androidtokens` (`token`) 
	VALUES ('".$tokenid."')"; 
	
$result = mysql_query($query,$link) or die(mysql_error());
mysql_close($link);


if ($result==1){
   echo "Successfully saved";
}else{
   echo $result;
}

   	
?>
