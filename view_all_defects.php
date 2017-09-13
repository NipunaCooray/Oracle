<html> 
<head>
	

</head>	

<body>

	 

    <?php 
	include("connect.php"); 	

	$link=Connection();

	$alldefects=mysql_query("SELECT * FROM `defects` ORDER BY defects.id DESC",$link);


	echo '<table class="table table-bordered table-responsive"> ';
	echo '<thead> <tr>
	<th class="col-md-1">ID</th>
	<th class="col-md-3">Machine no</th>
	<th class="col-md-3">Date and time</th>
	<th class="col-md-3">Status</th>

	</tr> </thead>';

	if($alldefects === FALSE) { 
    	die(mysql_error()); // TODO: better error handling
	}

	while($row = mysql_fetch_array($alldefects)) {
	    echo "<tr>";
	    echo "<td>" . $row['id'] . "</td>";
	    echo "<td>" . $row['machineNo'] . "</td>";
	    echo "<td>" . $row['dt'] . "</td>";
	    echo "<td>" . $row['status'] . "</td>";
	    echo "</tr>";
	}
	echo "</table>";
	mysql_free_result($alldefects);
	mysql_close();

  ?>


		


</body>

</html>