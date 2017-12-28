<html> 
<head>
	

</head>	

<body>

	 

    <?php 
	include("connect.php"); 	

	$link=Connection();

	$allnotifyingusers=mysqli_query($link,"SELECT * FROM `notifyingusers`");


	echo '<table class="table table-bordered"> ';
	echo "<tr>
	<th>Name</th>
	<th>Contact number</th>
	<th>Email</th>
	<th> </th>

	</tr>";

	if($allnotifyingusers === FALSE) { 
    	echo("Errorcode: " . mysqli_errno($link)); // TODO: better error handling
	}

	while($row = mysqli_fetch_array($allnotifyingusers)) {
	    echo "<tr>";
	    echo "<td>" . $row['username'] . "</td>";
	    echo "<td>" . $row['contactnumber'] . "</td>";
	    echo "<td>" . $row['email'] . "</td>";
	    echo '<td> <a href="delete_notifying_user.php?notifyinguserid= ' . $row['notifyinguserid'] .  ' " '  , '  class="btn btn-default" > Delete </a> </td> ';
	    echo "</tr>";
	}
	echo "</table>";
	mysqli_free_result($allnotifyingusers);
	mysqli_close($link);

  ?>


		


</body>

</html>