<html> 
<head>
	

</head>	

<body>

	 

    <?php 
	include("connect.php"); 	

	$link=Connection();

	$allstyles=mysqli_query($link,"SELECT * FROM `styledata` ");


	echo '<table class="table table-bordered"> ';
	echo "<tr>
	<th>Style ID</th>
	<th>Style No</th>
	<th>Image</th>
	<th>Area list</th>
	<th> </th>
	

	</tr>";

	if($allstyles === FALSE) { 
    	die(mysqli_error()); // TODO: better error handling
	}

	while($row = mysqli_fetch_array($allstyles)) {
	    echo "<tr>";
	    echo "<td>" . $row['styleID'] . "</td>";
	    echo "<td>" . $row['styleNumber'] . "</td>";
	    echo "<td>" . $row['imageLocation'] . "</td>";
	    echo "<td>" . $row['areaList'] . "</td>";
	     echo '<td> <a href="delete_style_data.php?styleID= '. $row['styleID'].' & styleNumber= '. $row['styleNumber'].' & imageLocation= '. $row['imageLocation'].' " '  , '  class="btn btn-default" > Delete </a> </td> ';
	    echo "</tr>";
	}
	echo "</table>";
	mysqli_free_result($allstyles);
	mysqli_close($link);

  ?>


		


</body>

</html>