<html> 
<head>
	

</head>	

<body>

	 

    <?php 
	include("connect.php"); 	

	$link=Connection();

	$allstyles=mysql_query("SELECT styleNumber FROM `styledata` ",$link);

	//Need to get all the data from each style table

	while($row = mysql_fetch_array($allstyles)) {
		$styleNumber = $row['styleNumber'];
		echo $styleNumber;

		echo "<br>";

		$styleDataQuery = mysql_query("SELECT * FROM   ".$styleNumber."   ",$link);


		echo '<table class="table table-bordered table-responsive"> ';
			echo '<thead> <tr>
			<th class="col-md-1">ID</th>
			<th class="col-md-3">Machine no</th>
			<th class="col-md-3">Date and time</th>
			<th class="col-md-3">Status</th>

			</tr> </thead>';

		if($styleDataQuery === FALSE) { 
	    	die(mysql_error()); // TODO: better error handling
		}


		while($row2 = mysql_fetch_array($styleDataQuery)) {

			echo "<tr>";
			echo "<td>" . $row2['id'] . "</td>";
			echo "<td>" . $row2['machineNo'] . "</td>";
			echo "<td>" . $row2['dt'] . "</td>";
			echo "<td>" . $row2['status'] . "</td>";
			echo "</tr>";
		}

		echo "</table>";


	}

	mysql_free_result($styleDataQuery);
	mysql_free_result($allstyles);
	mysql_close();

  ?>


		


</body>

</html>