<?php 

include("connect.php"); 	

$link=Connection();

$defectid = isset($_POST['defecttypeid']) ? $_POST['defecttypeid'] : null;

$query="DELETE FROM `defecttypes` WHERE `defecttypeid`= '".$defectid."' ";
      	
$result = mysqli_query($link,$query) or die(mysqli_error($link));       
mysqli_close($link);

if($result==1){
	echo "Deleted defect type with ".$defectid;
}

?>