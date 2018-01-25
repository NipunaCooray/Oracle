<html> 
<head>
	

</head>	

<body>

	 

    <?php 
	include("connect.php"); 	

	$link=Connection();

	$allDefects=mysqli_query($link,"SELECT * FROM `defecttypes`");

	function getUserName($userid) {

		//Without using PHP global $link, $link2, a local connection have been used here

		$link2=Connection();
		
	    $result = mysqli_query( $link2 , "SELECT `username` FROM `notifyingusers` WHERE `notifyinguserid`= '".$userid."' ");
	    $username = "";
	    
	    while($row = mysqli_fetch_array($result)) {
	    	$username = $row['username'];
	    	
		}

		mysqli_close($link2);

	    return $username;
	}

	echo '<table class="table table-bordered"> ';
	echo "<tr>
	<th>Defect_ID</th>
	<th>Defect type</th>
	<th>Notifying user 1</th>
	<th>Defect count margin 1</th>
	<th>Notifying user 2</th>
	<th>Defect count margin 2</th>
	<th>Notifying user 3</th>
	<th>Defect count margin 3</th>
	<th>Notifying user 4</th>
	<th>Defect count margin 4</th>
	<th> </th>

	</tr>";

	while($row = mysqli_fetch_array($allDefects)) {
	    echo "<tr>";
	    echo "<td>" . $row['defecttypeid'] . "</td>";
	    echo "<td>" . $row['defecttype'] . "</td>";
	    echo "<td>" .  getUserName($row['notifyinguserid1']) . "</td>";
	    echo "<td>" . $row['defectcountmargin1'] . "</td>";
	    echo "<td>" .  getUserName($row['notifyinguserid2']) . "</td>";
	    echo "<td>" . $row['defectcountmargin2'] . "</td>";
	    echo "<td>" .  getUserName($row['notifyinguserid3']) . "</td>";
	    echo "<td>" . $row['defectcountmargin3'] . "</td>";
	    echo "<td>" .  getUserName($row['notifyinguserid4']) . "</td>";
	    echo "<td>" . $row['defectcountmargin4'] . "</td>";
	    echo ' <td><button class="delete_class" id="'.$row['defecttypeid'].'">Delete</button></td> ';
	    echo "</tr>";
	}
	echo "</table>";
	mysqli_free_result($allDefects);
	mysqli_close($link);

  ?>


</body>

</html>