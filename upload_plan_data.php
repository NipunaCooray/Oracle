
<?php
    include("connect.php");

    //POST request
        
    $link=Connection();


    $target_dir = "planningData/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $fileType = pathinfo($target_file,PATHINFO_EXTENSION);

   
    
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.".PHP_EOL;
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.".PHP_EOL;
        $uploadOk = 0;
    }

      // Allow certain file formats
    if($fileType != "csv") {
        echo "Sorry, only CSV files are allowed.".PHP_EOL;
        $uploadOk = 0;
    }

    
    $numberOfResults = 0;


    if($uploadOk == 1) {

  		$row = 1;
		if (($handle = fopen($_FILES['fileToUpload']['tmp_name'], "r")) !== FALSE) {
		    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		        if($row == 1){ $row++; continue; }
		        $num = count($data);
		        // echo "<p> $num fields in line $row: <br /></p>\n";
		        $row++;

                $dbData = array();

		        for ($c=0; $c < $num; $c++) {
                    //echo $styleNumber;
		            // echo $data[$c] . "<br />\n";

                    $dbData[$c] = $data[$c];

		        }
                 $query = "INSERT INTO `planningdata` (`machineNumber`,`styleNumber`,`salesOrderLineItem`,`cw`,`component`,`size`,`plannedQuantity`,`orderStart`,`orderEnd` ) 
                        VALUES ('". $dbData[0]."' ,'". $dbData[1]."','". $dbData[2]."','". $dbData[3]."','". $dbData[4]."','". $dbData[5]."','". $dbData[6]."','". $dbData[7]."','". $dbData[8]."')"; 
        
                $result = mysqli_query($link,$query) or die(mysqli_error($link));
                $numberOfResults = $numberOfResults + $result;

		    }
            mysqli_close($link);
		    fclose($handle);
		}
	}
     
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)&& ($uploadOk==1)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.".PHP_EOL;
            
    } else {
        echo "Sorry, there was an error uploading your file.".PHP_EOL;
    }



    echo $numberOfResults. ' records has been saved';
  
   
    
?>