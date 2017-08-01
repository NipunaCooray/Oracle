<?php 
	include("connect.php"); 	

	$link=Connection();

	$defectid = 0;
	$query = "";


	 if( $_GET ) {

	 	   $defectid = (int)$_GET['defecttypeid'];

	       $query="DELETE FROM `defecttypes` WHERE `defecttypeid`= '".$defectid."' ";
	      	
	       $result = mysql_query($query,$link) or die(mysql_error());
	   	   mysql_close($link);

	       // echo $result;
	       header("Location: add_defect_type_ui.php");

 
      }
	

  ?>