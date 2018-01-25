<?php 
include("connect.php"); 	

$link=Connection();

$tabid = isset($_POST['tabid']) ? $_POST['tabid'] : null;


$query="DELETE FROM `androidtokens` WHERE androidtokens.tabid = '".$tabid."' ";


$result = mysqli_query($link,$query) or die(mysqli_error($link));
mysqli_close($link);



if($result==1){
	echo "Deleted records with tab id ".$tabid;
}


?>