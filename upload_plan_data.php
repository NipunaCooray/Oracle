
<?php
    include("connect.php");

    //POST request
        
    $link=Connection();


    $filename = basename($_FILES["fileToUpload"]["name"]);

    //$target_dir = "planningData/";
    //$target_file = $target_dir.$filename ;
    $uploadOk = 1;
    $fileType = pathinfo($filename,PATHINFO_EXTENSION);


    //echo md5_file($filename)."<br>";


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



                array_push($dbData,$filename);

                //Lower cased and removed spaces in the styleNumber data

                 $query = "INSERT INTO `planningdata` (`machineNumber`,`styleNumber`,`salesOrderLineItem`,`cw`,`component`,`size`,`plannedQuantity`,`orderStart`,`orderEnd`,`fileName` ) 
                        VALUES ('". $dbData[0]."' ,'". str_replace(' ', '', strtolower($dbData[1]))."','". $dbData[2]."','". $dbData[3]."','". $dbData[4]."','". $dbData[5]."','". $dbData[6]."','". $dbData[7]."','". $dbData[8]."','". $dbData[9]."')"; 
        
                $result = mysqli_query($link,$query) or die(mysqli_error($link));
                $numberOfResults = $numberOfResults + $result;

		    }
            mysqli_close($link);
		    fclose($handle);
		}
	}
     

    echo $numberOfResults. ' records has been saved';
  
   
    
?>