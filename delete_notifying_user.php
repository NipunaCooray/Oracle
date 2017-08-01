<?php 
	include("connect.php"); 	

	$link=Connection();

	$notifyinguserid = 0;
	$query = "";


	 if( $_GET ) {

	 	   $notifyinguserid = mysql_real_escape_string($_GET['notifyinguserid']);


	       $query="DELETE FROM `notifyingusers` WHERE `notifyinguserid`= '".$notifyinguserid."' ";
	      	
	       $result = mysql_query($query,$link) or die(mysql_error());
	   	   mysql_close($link);

	       //echo $result;
	       header("Location: add_notifying_user_ui.php");

 
      }
	

  ?>