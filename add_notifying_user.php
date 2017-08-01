<?php
   	include("connect.php");
   	
   	$link=Connection();

      
       if( $_GET ) {

          
          $username = mysql_real_escape_string($_GET['username']);
          $contactnumber = mysql_real_escape_string($_GET['contactnumber']);
          $email = mysql_real_escape_string($_GET['email']);

   	// $defectid=$_POST[defectid];
   	// $defectname=$_POST[defectname];
     

   	   $query = "INSERT INTO `notifyingusers` (`username`, `contactnumber`,`email`) 
   		VALUES ('".$username."','".$contactnumber."','".$email."')"; 
      	
      	$result = mysql_query($query,$link) or die(mysql_error());
   	   mysql_close($link);

        if ($result==1){
          echo "Successfully saved";
        }else{
          echo $result;
        }

      	

      }
?>
