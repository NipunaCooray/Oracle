<html> 
<head>
	

</head>	

<body>

	 

    <?php 
	include("connect.php"); 	

	$link=Connection();

	$alldefects=mysql_query("SELECT tabid, imei_number, LEFT(token , 100) AS token  FROM `androidtokens`",$link);


	echo '<table class="table table-bordered"> ';
	echo "<tr>
	<th>ID</th>
	<th>IMEI Number</th>
	<th>Firebase token</th>
	<th></th>
	

	</tr>";

	if($alldefects === FALSE) { 
    	die(mysql_error()); // TODO: better error handling
	}

	while($row = mysql_fetch_array($alldefects)) {
	    echo "<tr>";
	    echo "<td>" . $row['tabid'] . "</td>";
	    echo "<td>" . $row['imei_number'] . "</td>";
	    echo "<td>" . $row['token'] . "</td>";
	    
	    echo "</tr>";
	}
	echo "</table>";
	mysql_free_result($alldefects);
	mysql_close();

  ?>


		


</body>

</html>