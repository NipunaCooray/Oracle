<?php 
	include("connect.php"); 	

	$link=Connection();

	$epf_no = 0;
	$query = "";


	 if( $_GET ) {

	 	   $epf_no = (int)$_GET['epf_no'];

	       $query="DELETE FROM `team_members` WHERE `epf_no`= '".$epf_no."' ";
	      	
	       $result = mysqli_query($link,$query) or die(mysqli_error());
	   	   mysqli_close($link);

	       // echo $result;
	       header("Location: add_team_member_ui.php");

 
      }
	

  ?>