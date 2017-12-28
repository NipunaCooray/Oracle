<?php
   	include("connect.php");
   	
   	$link=Connection();

      
       if( $_GET ) {

          
          $username = mysqli_real_escape_string($link,$_GET['username']);
          $contactnumber = mysqli_real_escape_string($link, $_GET['contactnumber']);
          $email = mysqli_real_escape_string($link, $_GET['email']);

     

   	   $query = "INSERT INTO `notifyingusers` (`username`, `contactnumber`,`email`) 
   		VALUES ('".$username."','".$contactnumber."','".$email."')"; 
      	
      	$result = mysqli_query($link,$query); 
   	   

        if ($result==1){
          echo "Successfully saved";
        }else{
         echo("Errorcode: " . mysqli_errno($link));
        }


        mysqli_close($link);

      }
?>
