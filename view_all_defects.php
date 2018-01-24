<html> 
<head>
	

</head>	

<body>

	 

    <?php 
	include("connect.php"); 	

	$link=Connection();

	$allstyles = mysqli_query($link,"SELECT styleNumber FROM `styledata` ");

	//Need to get all the data from each style table

	while($row = mysqli_fetch_array($allstyles)) {
		$styleNumber = $row['styleNumber'];
		echo "<b>".$styleNumber."</b>";


		echo "<br>";
		echo "<hr>";
		echo "<br>";

		$styleDataQuery = mysqli_query($link,"SELECT * FROM   ".$styleNumber."   ");


		echo '<table class="table table-bordered table-responsive"> ';
			echo '<thead> <tr>
			<th class="col-md-1">ID</th>
			<th class="col-md-3">Machine no</th>
			<th class="col-md-3">Date and time</th>
			<th class="col-md-3">Status</th>

			</tr> </thead>';

		if($styleDataQuery === FALSE) { 
	    	die(mysqli_error($link)); // TODO: better error handling
		}


		while($row2 = mysqli_fetch_array($styleDataQuery)) {

			echo "<tr>";
			echo "<td>" . $row2['id'] . "</td>";
			echo "<td>" . $row2['machineNo'] . "</td>";
			echo "<td>" . $row2['dt'] . "</td>";
			echo "<td>" . $row2['status'] . "</td>";
			echo "</tr>";
		}

		echo "</table>";


	}

	// mysqli_free_result($styleDataQuery);
	// mysqli_free_result($allstyles);
	mysqli_close($link);

  ?>


		


</body>

</html>