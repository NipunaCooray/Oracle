<?php 
	include("connect.php"); 	

	$link=Connection();

	$styleID = 0;



	 if( $_GET ) {

	 	   $styleID = (int)$_GET['styleID'];
	 	   $styleNumber = $_GET['styleNumber'];
	 	   $imageLocation = $_GET['imageLocation'];


	 	   //Required due to a space in the URL, without this php unlink() wont work, also need to change / to \
	 	   $imageLocation = str_replace(" ","",$imageLocation);
	 	   $imageLocation = str_replace("/","\\", $imageLocation);

	 	   $imageLocation = getcwd()."\\".$imageLocation;

	 	   

	       $delete_styledata_query="DELETE FROM `styledata` WHERE `styleID`= '".$styleID."' ";

	       
	       $result = mysqli_query($link,$delete_styledata_query) or die(mysqli_error($link));
	       

	       //After deleting styledata row, particular style table need to be dropped

	       $drop_style_table_query = "DROP TABLE ".$styleNumber." ";

	      

	       $result2 = mysqli_query($link,$drop_style_table_query) or die(mysqli_error($link));

	       

	       //Later : No need to remove the image from the folder

	       //Need to remove the image from the StyleImages folder
			// if (!unlink($imageLocation)){
			// 	$result3 = "Error deleting $imageLocation";
			// }
			// else{
			// 	$result3 = "Deleted $imageLocation";
			// }

			$resultString = $result." ".$result2;


	      	
	       
	   	   mysqli_close($link);

	       //echo $resultString;

	       header("Location: setup_style_ui_v2.php");

      }

     
	

  ?>