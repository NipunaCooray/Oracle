<?php


    include("connect.php");
    
    $link=Connection();

      
       if( $_POST ) {

        //File Uploading



        $target_dir = "TeamMemberImages/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "File was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        
        //Data saving to DB

        

        $epf_no = mysql_real_escape_string($_POST['epf_no']);
        $team_member_name = mysql_real_escape_string($_POST['team_member_name']);
        $password = mysql_real_escape_string($_POST['password']);
        $shift = mysql_real_escape_string($_POST['shift']);
        $image_location = $target_file;

        echo $epf_no."<br/>";
        echo $team_member_name."<br/>";
        echo $password."<br/>";
        echo $shift."<br/>";
        echo $image_location."<br/>";







        $query = "INSERT INTO `team_members` (`epf_no`, `team_member_name`, `password`,`shift`,`image_location`) 
         VALUES ('".$epf_no."','".$team_member_name."','".$password."','".$shift."','".$image_location."')"; 

         $result = mysql_query($query,$link) or die(mysql_error());
        mysql_close($link);

         if ($result==1){
           echo "Successfully saved";
         }else{
           echo $result;
         }

        

      }



    
?>