<?php 
	include("connect.php"); 	

	$link=Connection();

	$downtimeid = 0;
	$query = "";


	 if( $_GET ) {

	 	   $downtimeid = mysqli_real_escape_string($link,$_GET['downtimeid']);


	       $query="DELETE FROM `downtimereason` WHERE `downtimeid`= '".$downtimeid."' ";
	      	
	       $result = mysqli_query($link,$query) or die(mysqli_error());
	   	   mysqli_close($link);


	       header("Location: add_downtime_reason_ui.php");

 
      }
	

  ?>