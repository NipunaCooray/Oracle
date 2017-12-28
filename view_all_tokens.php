<html> 
<head>
	

</head>	

<body>

	 

    <?php 
	include("connect.php"); 	

	$link=Connection();

	$alldefects=mysqli_query($link,"SELECT tabid, imei_number, LEFT(token , 100) AS token  FROM `androidtokens`");


	echo '<table class="table table-bordered"> ';
	echo "<tr>
	<th>ID</th>
	<th>IMEI Number</th>
	<th>Firebase token</th>
	<th></th>
	

	</tr>";

	if($alldefects === FALSE) { 
    	die(mysqli_error()); // TODO: better error handling
	}

	while($row = mysqli_fetch_array($alldefects)) {
	    echo "<tr>";
	    echo "<td>" . $row['tabid'] . "</td>";
	    echo "<td>" . $row['imei_number'] . "</td>";
	    echo "<td>" . $row['token'] . "</td>";
	    
	    echo "</tr>";
	}
	echo "</table>";
	mysqli_free_result($alldefects);
	mysqli_close($link);

  ?>


		


</body>

</html>