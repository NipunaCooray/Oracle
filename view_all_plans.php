<html> 
<head>
	

</head>	

<body>

	 

    <?php 
	include("connect.php"); 	

	$link=Connection();


	echo "<b> Recently added plans (Only 10 records are displayed) </b> <br> ";
	echo "<hr>";

	//SELECT DISTINCT DATE(planningdata.planAddedTime), planningdata.fileName FROM planningdata ORDER BY planningdata.planAddedTime Limit 10

	$addedPlans=mysqli_query($link,"SELECT DISTINCT DATE(planningdata.planAddedTime)  AS planAddedDate, planningdata.fileName FROM `planningdata` ORDER BY planningdata.planAddedTime Limit 10 ");


	echo '<table class="table table-bordered"> ';
	echo "<tr>
	<th>Plan added time</th>
	<th>File name</th>
	<th></th>

	</tr>";

	if($addedPlans === FALSE) { 
    	die(mysqli_error($link)); // TODO: better error handling
	}

	while($row = mysqli_fetch_array($addedPlans)) {
	    echo "<tr>";
	    echo "<td>" . $row['planAddedDate'] . "</td>";
	    echo "<td>" . $row['fileName'] . "</td>";
	    echo '<td> <button id="btnDelete" onclick="deletePlan()" class="btn btn-default" > Delete </button> </td> ';
	    echo "</tr>";
	}
	echo "</table>";
	mysqli_free_result($addedPlans);
	mysqli_close($link);

  ?>


		


</body>

</html>