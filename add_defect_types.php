<?php
   	include("connect.php");
   	
   	$link=Connection();

      
       if( $_GET ) {

          $defectid =$_GET['defectid'];
          $defectname = mysqli_real_escape_string($link,$_GET['defectname']);
          $userlist1 =$_GET['userlist1'];
          $defectcountmargin1 =$_GET['defectcountmargin1'];
          $userlist2 =$_GET['userlist2'];
          $defectcountmargin2 =$_GET['defectcountmargin2'];
          $userlist3 =$_GET['userlist3'];
          $defectcountmargin3 =$_GET['defectcountmargin3'];
          $userlist4 =$_GET['userlist4'];
          $defectcountmargin4 =$_GET['defectcountmargin4'];
   	// $defectid=$_POST[defectid];
   	// $defectname=$_POST[defectname];
     

   	   $query = "INSERT INTO `defecttypes` (`defecttypeid`, `defecttype`,`notifyinguserid1`, `defectcountmargin1`,`notifyinguserid2`, `defectcountmargin2`,`notifyinguserid3`, `defectcountmargin3`,`notifyinguserid4`, `defectcountmargin4`) 
   		VALUES ('".$defectid."','".$defectname."' , '".$userlist1."','".$defectcountmargin1."' , '".$userlist2."','".$defectcountmargin2."' , '".$userlist3."','".$defectcountmargin3."', '".$userlist4."','".$defectcountmargin4."')"; 
      	
      	$result = mysqli_query($link,$query) or exit(mysqli_error());
   	   mysqli_close($link);

         if($result==1){
          echo "Successfully saved";
         }else{
          echo $result;
         }

      	

      }
?>
