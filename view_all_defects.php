<html> 
<head>
	

</head>	

<body>

	 

    <?php 
	include("connect.php"); 	

	$link=Connection();

	$alldefects=mysql_query("SELECT * FROM `defects`",$link);


	echo '<table class="table table-bordered"> ';
	echo "<tr>
	<th>ID</th>
	<th>M.N</th>
	<th>dt</th>
	<th>status</th>

	</tr>";

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