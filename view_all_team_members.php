<html> 
<head>
	

</head>	

<body>

	 

    <?php 
	include("connect.php"); 	

	$link=Connection();

	$team_members=mysql_query("SELECT * FROM `team_members`",$link);


	echo '<table class="table table-bordered"> ';
	echo "<tr>
	<th>EPF No</th>
	<th>Name</th>
	<th>Password</th>
	<th>Shift</th>
	<th>Image URL</th>
	<th></th>

	</tr>";

	if($team_members === FALSE) { 
    	die(mysql_error()); // TODO: better error handling
	}

	while($row = mysql_fetch_array($team_members)) {
	    echo "<tr>";
	    echo "<td>" . $row['epf_no'] . "</td>";
	    echo "<td>" . $row['team_member_name'] . "</td>";
	    echo "<td>" . $row['password'] . "</td>";
	    echo "<td>" . $row['shift'] . "</td>";
	    echo "<td>" . $row['image_location'] . "</td>";
	    echo '<td> <a href="delete_team_member.php?epf_no= ' . $row['epf_no'] .  ' " '  , '  class="btn btn-default" > Delete </a> </td> ';
	    echo "</tr>";
	}
	echo "</table>";
	mysql_free_result($team_members);
	mysql_close();

  ?>


		


</body>

</html>