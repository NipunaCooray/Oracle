<?php 
	include("connect.php"); 	

	$link=Connection();

	$downtimeid = 0;
	$query = "";


	 if( $_GET ) {

	 	   $downtimeid = mysql_real_escape_string($_GET['downtimeid']);


	       $query="DELETE FROM `downtimereason` WHERE `downtimeid`= '".$downtimeid."' ";
	      	
	       $result = mysql_query($query,$link) or die(mysql_error());
	   	   mysql_close($link);

	       //echo $result;
	       header("Location: add_downtime_reason_ui.php");

 
      }
	

  ?>