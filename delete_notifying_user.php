<?php 
	include("connect.php"); 	

	$link=Connection();

	$notifyinguserid = 0;
	$query = "";


	 if( $_GET ) {

	 	   $notifyinguserid = mysqli_real_escape_string($link,$_GET['notifyinguserid']);


	       $query="DELETE FROM `notifyingusers` WHERE `notifyinguserid`= '".$notifyinguserid."' ";
	      	
	       $result = mysqli_query($link,$query) or exit(mysqli_error($link));


	   	   mysqli_free_result($result);
	   	   mysqli_close($link);


	       header("Location: add_notifying_user_ui.php");

 
      }
	

  ?>