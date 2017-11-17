<?php 
	include("connect.php"); 	

	$link=Connection();

	$epf_no = 0;
	$query = "";


	 if( $_GET ) {

	 	   $epf_no = (int)$_GET['epf_no'];

	       $query="DELETE FROM `team_members` WHERE `epf_no`= '".$epf_no."' ";
	      	
	       $result = mysql_query($query,$link) or die(mysql_error());
	   	   mysql_close($link);

	       // echo $result;
	       header("Location: add_team_member_ui.php");

 
      }
	

  ?>