<html> 
<head>
	

</head>	

<body>

	 

    <?php 
	include("connect.php"); 	

	$link=Connection();

	$alltabids = mysqli_query($link,"SELECT DISTINCT tabid FROM `tabmachineallocation` ORDER BY tabmachineallocation.tabid ");


	echo '<h5> Current Tab-Machine allocation </h5>';

	echo '<table class="table table-bordered"> ';
	echo "<tr>
	<th>Tab ID</th>
	<th>Allocated machines</th>

	</tr>";

	if($alltabids === FALSE) { 
    	die(mysqli_error($link)); // TODO: better error handling
	}

	while($row = mysqli_fetch_array($alltabids)) {
	    echo "<tr>";
	    echo "<td>" . $row['tabid'] . "</td>";

	    $allMachineForaTab = mysqli_query($link,"SELECT machineNumber FROM `tabmachineallocation` WHERE tabmachineallocation.tabid=' ".$row['tabid']." ' ");

	    $machineList = "";

	    while($row_2 = mysqli_fetch_array($allMachineForaTab)) {
	    	$machineList = $machineList." &nbsp &nbsp".$row_2['machineNumber'];
	    }


	    echo "<td>" . $machineList . "</td>";
	    echo "</tr>";
	}
	echo "</table>";
	mysqli_free_result($alltabids);
	mysqli_close($link);

  ?>


		


</body>

</html>