<?php 
include("connect.php"); 	

$link=Connection();

$fileName = isset($_POST['fileName']) ? $_POST['fileName'] : null;

echo "Deleting ".$fileName."<br>";

$query="DELETE FROM `planningdata` WHERE planningdata.fileName = '".$fileName."' ";


$result = mysqli_query($link,$query) or die(mysqli_error($link));
mysqli_close($link);



if($result==1){
	echo "Deleted all records of ".$fileName;
}


?>