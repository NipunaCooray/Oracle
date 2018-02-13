<html> 
<head>
	

</head>	

<body>

	 

    <?php 
	include("connect.php"); 	

	$link=Connection();

	$alldowntimes=mysqli_query($link,"SELECT * FROM `downtimes` ORDER BY downtimes.downtimeid DESC");


	echo '<table class="table table-bordered"> ';
	echo "<tr>
	<th>ID</th>
	<th>Machine No</th>
	<th>Stopped Time</th>
	<th>Started Time</th>
	<th>Duration (Minutes)</th>
	<th>Reason</th>

	</tr>";

	if($alldowntimes === FALSE) { 
    	die(mysqli_error($link)); // TODO: better error handling
	}

	while($row = mysqli_fetch_array($alldowntimes)) {
	    echo "<tr>";
	    echo "<td>" . $row['downtimeid'] . "</td>";
	    echo "<td>" . $row['machineNumber'] . "</td>";
	    echo "<td>" . $row['stopTime'] . "</td>";
	    echo "<td>" . $row['startTime'] . "</td>";
	    echo "<td>" . $row['duration'] . "</td>";
	    echo "<td>" . $row['reason'] . "</td>";
	    echo "</tr>";
	}
	echo "</table>";
	mysqli_free_result($alldowntimes);
	mysqli_close($link);

  ?>


		


</body>

</html>