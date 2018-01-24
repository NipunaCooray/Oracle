<?php 
	include("connect.php"); 	

	$link=Connection();

	$defectid = 0;
	$query = "";


	 if( $_GET ) {

	 	   $defectid = (int)$_GET['defecttypeid'];

	       $query="DELETE FROM `defecttypes` WHERE `defecttypeid`= '".$defectid."' ";
	      	
	       $result = mysqli_query($link,$query) or exit(mysqli_error($link));
	       mysqli_free_result($result);
	   	   mysqli_close($link);

	       header("Location: add_defect_type_ui.php");

 
      }
	

  ?>