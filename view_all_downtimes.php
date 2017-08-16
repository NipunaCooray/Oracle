<html> 
<head>
	

</head>	

<body>

	 

    <?php 
	include("connect.php"); 	

	$link=Connection();

	$alldowntimes=mysql_query("SELECT * FROM `downtimes`",$link);


	echo '<table class="table table-bordered"> ';
	echo "<tr>
	<th>ID</th>
	<th>TypeID</th>
	<th>M.N</th>
	<th>StopTime</th>
	<th>StartTime</th>
	<th>Reason</th>

	</tr>";

	if($alldowntimes === FALSE) { 
    	die(mysql_error()); // TODO: better error handling
	}

	while($row = mysql_fetch_array($alldowntimes)) {
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
	mysql_free_result($alldowntimes);
	mysql_close();

  ?>


		


</body>

</html>