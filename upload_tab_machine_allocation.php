
<?php
    include("connect.php");

    //POST request
        
    $link=Connection();


    //$target_dir = "planningData/";
    //$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    
    $target_file =  basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $fileType = pathinfo($target_file,PATHINFO_EXTENSION);


    


    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

      // Allow certain file formats
    if($fileType != "csv") {
        echo "Sorry, only CSV files are allowed.";
        $uploadOk = 0;
    }

    
    $numberOfResults = 0;

    if($uploadOk == 1) {



         //Need to check whether added TabID's are valid
        $allTabIDsResult = mysqli_query($link," SELECT tabid FROM `androidtokens` ");

        if($allTabIDsResult === FALSE) { 
            die(mysqli_error()); // TODO: better error handling
        }

        $TabIDList = array();

        $index = 0;
        while($singleID = mysqli_fetch_array($allTabIDsResult)){ 

             $TabIDList[$index] = $singleID["tabid"];

             $index++;
        }

        echo "Printing tab id list :";

        print_r($TabIDList);

        echo "<br/>";
 
        
  		$row = 1;
		if (($handle = fopen($_FILES['fileToUpload']['tmp_name'], "r")) !== FALSE) {
		    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		        //if($row == 1){ $row++; continue; }
		        $num = count($data);
		        //echo "<p> $num fields in line $row: <br /></p>\n";
		        $row++;

                $dbData = array();

		        for ($c=0; $c < $num; $c++) {
                    //echo $styleNumber;

		            echo $data[$c] . " ";

                    $dbData[$c] = $data[$c];
		        }
                echo "<br/>";

                for ($c=$num; $c <= 10; $c++) {

                    $dbData[$c] = "null";
                }

                echo "Printing dbData[0] :".$dbData[0]."<br/>";
               

                if (in_array($dbData[0], $TabIDList)){
                        $query = "INSERT INTO `tabmachineallocation` (`tabid`,`machine1`,`machine2`,`machine3`,`machine4`,`machine5`,`machine6`,`machine7`,`machine8`, `machine9`, `machine10`) 
                    VALUES ('". $dbData[0]."' ,'". $dbData[1]."','". $dbData[2]."','". $dbData[3]."','". $dbData[4]."','". $dbData[5]."','". $dbData[6]."','". $dbData[7]."','". $dbData[8]."','". $dbData[9]."','". $dbData[10]."')"; 
        
                    $result = mysqli_query($link,$query) or die(mysqli_error());
                    $numberOfResults = $numberOfResults + $result;
                    //echo "Match found<br>";


                }else{
                    echo "Invalid Tab IDs <br/>";
                }


		    }
            mysqli_close($link);
		    fclose($handle);
		}
	}
    
    echo $numberOfResults. ' records has been saved';
  
    
    
?>