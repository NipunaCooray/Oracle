<?php
    include("connect.php");

    //POST request
        
    $link=Connection();


    $security_key = isset($_POST['security_key']) ? $_POST['security_key'] : null;
	$machineNo = isset($_POST['machineNumber']) ? $_POST['machineNumber'] : null;
	$shift = isset($_POST['shift']) ? $_POST['shift'] : null;
	$numberOfResults = isset($_POST['numberOfResults']) ? $_POST['numberOfResults'] : null;


	//shift 1 from 7am-7pm
	//shift 2 from 7pm-7am


    if($security_key == "12345"){

    	//Need to select * the styles
    	$allStyles=mysqli_query($link,"SELECT styleNumber FROM `styledata`");

    	if($allStyles === FALSE) { 
	    	die(mysqli_error($link)); // TODO: better error handling
		}

		$numOfStyles=mysqli_num_rows($allStyles);
		$shift_data = array();

		while($styleNumber = mysqli_fetch_array($allStyles)) {

			$counter = 0;

			$styleData = new stdClass();
			$styleRecords = array();
			

			if($shift=="1"){

				//echo "Shift 1".PHP_EOL;

				$schemaQuery = "SELECT COLUMN_NAME FROM `INFORMATION_SCHEMA`.`COLUMNS`  WHERE `TABLE_SCHEMA`=' ".$GLOBALS['database']."' AND `TABLE_NAME`='".$styleNumber[$counter]."' " ;

				//echo $schemaQuery. PHP_EOL ;

				$table_headers_result=mysqli_query($link,$schemaQuery);

				if($table_headers_result === FALSE) { 
			    	die(mysqli_error($link)); // TODO: better error handling
				}

				$column_headers = array();

				while($row = mysqli_fetch_row($table_headers_result)) {
					array_push($column_headers,$row[0]);

				}

				//print_r($column_headers);
				//array_push($shift_data,$column_headers);

				$styleData->name = $styleNumber[$counter];
				$styleData->headers = $column_headers;



				$query = "SELECT * FROM `".$styleNumber[$counter]."` Where machineNo='".$machineNo."' AND (HOUR (".$styleNumber[$counter].".dt) BETWEEN 7 AND 19) ORDER BY dt DESC Limit ".$numberOfResults." " ;

				//echo $query. PHP_EOL ;

				$shift_1_results=mysqli_query($link,$query);


				if($shift_1_results === FALSE) { 
			    	die(mysqli_error($link)); // TODO: better error handling
				}

				while($row = mysqli_fetch_row($shift_1_results)) {
					array_push($styleRecords,$row);
					
				}

				$styleData->records = $styleRecords;

				mysqli_free_result($shift_1_results);


			}else if($shift=="2") {

				//echo "Shift 2".PHP_EOL;

				$schemaQuery = "SELECT COLUMN_NAME FROM `INFORMATION_SCHEMA`.`COLUMNS`  WHERE `TABLE_SCHEMA`='".$GLOBALS['database']."' AND `TABLE_NAME`='".$styleNumber[$counter]."' " ;

				//echo $schemaQuery. PHP_EOL ;

				$table_headers_result=mysqli_query($link,$schemaQuery);

				if($table_headers_result === FALSE) { 
			    	die(mysqli_error($link)); // TODO: better error handling
				}

				$column_headers = array();

				while($row = mysqli_fetch_row($table_headers_result)) {
					array_push($column_headers,$row[0]);

				}


				$styleData->name = $styleNumber[$counter];
				$styleData->headers = $column_headers;



				$query = "SELECT * FROM `".$styleNumber[$counter]."` Where machineNo='".$machineNo."' AND ((HOUR (".$styleNumber[$counter].".dt) BETWEEN 19 AND 24 OR HOUR (".$styleNumber[$counter].".dt) BETWEEN 0 AND 7)) ORDER BY dt DESC Limit ".$numberOfResults." " ;

				//echo $query. PHP_EOL ;;

				$shift_2_results=mysqli_query($link,$query);


				if($shift_2_results === FALSE) { 
			    	die(mysqli_error($link)); // TODO: better error handling
				}

				while($row = mysqli_fetch_row($shift_2_results)) {
					array_push($styleRecords,$row);
					
				}

				$styleData->records = $styleRecords;

				mysqli_free_result($shift_2_results);


			}

			$counter= $counter+1;
			array_push($shift_data,$styleData);


		}


		//print_r($shift_data);

		//Need to select the most recent records from the machine


		$all_timestamps = array();

		foreach($shift_data as $one_style){

		   foreach($one_style->records as $record){
		   		
		   		array_push($all_timestamps,$record[2]);
		   }

		}

		//echo "Timestamps before sorting".PHP_EOL;

		//print_r($all_timestamps);

		rsort($all_timestamps);

		//echo "Timestamps after sorting".PHP_EOL;

		//print_r($all_timestamps);

		


		if(count($all_timestamps)<$numberOfResults){
			//No need to do anything, send $shift_data as it is

			//print_r($shift_data);

			echo json_encode(array("result"=>$shift_data));

		}else{	
			//Need to remove timestamp values after the nth element

			$marginalTime = $all_timestamps[$numberOfResults-1];

			//echo $marginalTime.PHP_EOL;

			foreach($shift_data as $one_style){

				foreach($one_style->records as $key=>$record){
						
					
					if($record[2]<$marginalTime){
						
						//echo $record[2].PHP_EOL;
						unset($one_style->records[$key]);
						//required with the unset (Note that when you use unset() the array keys won't change/reindex. If you want to reindex the keys you can use array_values() after unset())
						array_values($one_style->records);

					}
				}

			}

			//echo "After unsetting".PHP_EOL;

			//print_r($shift_data);
			echo json_encode(array("result"=>$shift_data));

		}


		mysqli_close($link);

	}else{
		echo "Security key not matching";
	}
?>