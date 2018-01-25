<html> 
<head>
	

</head>	

<body>

	 

    <?php 
	include("connect.php"); 	

	$link=Connection();

	$alltokens=mysqli_query($link,"SELECT tabid, imei_number, LEFT(token , 100) AS token  FROM `androidtokens`");


	echo '<table class="table table-bordered"> ';
	echo "<tr>
	<th>ID</th>
	<th>IMEI Number</th>
	<th>Firebase token</th>
	<th></th>
	

	</tr>";

	if($alltokens === FALSE) { 
    	die(mysqli_error($link)); // TODO: better error handling
	}

	while($row = mysqli_fetch_array($alltokens)) {
	    echo "<tr>";
	    echo "<td>" . $row['tabid'] . "</td>";
	    echo "<td>" . $row['imei_number'] . "</td>";
	    echo "<td>" . $row['token'] . "</td>";
	    echo ' <td><button class="delete_class" id="'.$row['tabid'].'">Delete</button></td> ';
	    echo "</tr>";
	}
	echo "</table>";
	mysqli_free_result($alltokens);
	mysqli_close($link);

  ?>


		


</body>

</html>