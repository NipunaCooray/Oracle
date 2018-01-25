<?php 
include("connect.php"); 	

$link=Connection();

$epf_no = isset($_POST['epf_no']) ? $_POST['epf_no'] : null;


$query="DELETE FROM `team_members` WHERE `epf_no`= '".$epf_no."' ";

$result = mysqli_query($link,$query) or die(mysqli_error($link));

mysqli_close($link);

if($result==1){
	echo "Deleted team member with epf number ".$epf_no;
}
	

  ?>