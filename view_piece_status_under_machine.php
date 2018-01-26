<html> 
<head>
	

</head>	

<body>

	 

    <?php 
	include("connect.php"); 	

	$link=Connection();

	$allstyles = mysqli_query($link,"SELECT styleNumber FROM `styledata` ");

	//Need to get all the data from each style table

	while($row = mysqli_fetch_array($allstyles)) {

		echo "These are the machines with an ongoing plan and there latest piece out information <br> <br>";

		$styleNumber = $row['styleNumber'];
		echo "<b>".$styleNumber."</b>";


		echo "<br>";
		echo "<hr>";
		echo "<br>";

		$machineDataQuery = mysqli_query($link,"SELECT DISTINCT machineNo FROM   ".$styleNumber." ORDER BY machineNo LIMIT 5 ");

		if($machineDataQuery === FALSE) { 
	    	die(mysqli_error($link)); // TODO: better error handling
		}

		while($row2 = mysqli_fetch_array($machineDataQuery)) {
			$machineNumber = $row2['machineNo'];



			$statusQuery = "SELECT id,machineNo,status FROM   ".$styleNumber." Where machineNo='".$machineNumber." ' AND  machineNo IN (SELECT machineNumber from `planningdata` Where orderState ='ongoing')  Order BY id DESC Limit 5 ";

			//echo $statusQuery."<br>";

			$statusQueryResult = mysqli_query($link,$statusQuery);

			if($statusQueryResult === FALSE) { 
		    	die(mysqli_error($link)); // TODO: better error handling
			}

			

			echo '<div class="span4"> ';

			echo $machineNumber."<br>";

			echo '<table class="table table-bordered table-responsive "> ';
			echo '<thead> <tr>
			<th class="col-md-1">Piece ID</th>
			<th class="col-md-1">Status</th>
			

			</tr> </thead>';

		


			while($row3 = mysqli_fetch_array($statusQueryResult)) {

				echo "<tr>";
				echo "<td>" . $row3['id'] . "</td>";
				echo "<td>" . $row3['status'] . "</td>";
				
				echo "</tr>";
			}

			echo "</table>";

			echo '</div> ';


			
		}




	}


	mysqli_close($link);

  ?>


		


</body>

</html>