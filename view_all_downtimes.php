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
	<th>TypeID</th>
	<th>Machine no</th>
	<th>StopTime</th>
	<th>StartTime</th>
	<th>Reason</th>

	</tr>";

	if($alldowntimes === FALSE) { 
    	die(mysqli_error()); // TODO: better error handling
	}

	while($row = mysqli_fetch_array($alldowntimes)) {
	    echo "<tr>";
	    echo "<td>" . $row['downtimeid'] . "</td>";
	    echo "<td>" . $row['downtimetypeid'] . "</td>";
	    echo "<td>" . $row['machineno'] . "</td>";
	    echo "<td>" . $row['stoptime'] . "</td>";
	    echo "<td>" . $row['starttime'] . "</td>";
	    echo "<td>" . $row['reason'] . "</td>";
	    echo "</tr>";
	}
	echo "</table>";
	mysqli_free_result($alldowntimes);
	mysqli_close($link);

  ?>


		


</body>

</html>