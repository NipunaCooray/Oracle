<html> 
<head>
	

</head>	

<body>

	 

    <?php 
    
	include("connect.php"); 	

	$link=Connection();

	$allDowntimes=mysql_query("SELECT * FROM `downtimereason`",$link);

	function getUserName($userid) {
		$link2=Connection();
	    $result = mysql_query("SELECT `username` FROM `notifyingusers` WHERE `notifyinguserid`= '".$userid."' ",$link2);
	    $username = "";
	    
	    while($row = mysql_fetch_array($result)) {
	    	$username = $row['username'];
	    	
		}

	    return $username;
	}


	echo '<table class="table table-bordered"> ';
	echo ' <thead class="thead-inverse">';
	echo "<tr>
			<th>Downtime id</th>
			<th>Downtime Reason</th>
			<th>Downtime type</th>
			<th>Notifying user 1</th>
			<th>Downtime notify time 1</th>
			<th>Notifying user 2</th>
			<th>Downtime notify time 2</th>
			<th>Notifying user 3</th>
			<th>Downtime notify time 3</th>
			<th>Notifying user 4</th>
			<th>Downtime notify time 4</th>
			<th> </th>
		  </tr>
		</thead>";

	while($row = mysql_fetch_array($allDowntimes)) {
	    echo "<tr>";
	    echo "<td>" . $row['downtimeid'] . "</td>";
	    echo "<td>" . $row['description'] . "</td>";
	    echo "<td>" . $row['downtimetype'] . "</td>";
	    echo "<td>" .  getUserName($row['notifyinguserid1']) . "</td>";
	    echo "<td>" . $row['downtimenotifytime1'] . "</td>";
	    echo "<td>" .  getUserName($row['notifyinguserid2']) . "</td>";
	    echo "<td>" . $row['downtimenotifytime2'] . "</td>";
	    echo "<td>" .  getUserName($row['notifyinguserid3']) . "</td>";
	    echo "<td>" . $row['downtimenotifytime3'] . "</td>";
	    echo "<td>" .  getUserName($row['notifyinguserid4']) . "</td>";
	    echo "<td>" . $row['downtimenotifytime4'] . "</td>";
	    echo '<td> <a href="delete_downtime_reason.php?downtimeid= ' . $row['downtimeid'] .  ' " '  , '  class="btn btn-default" > Delete </a> </td> ';
	    echo "</tr>";
	}
	echo "</table>";
	mysql_free_result($allDowntimes);
	mysql_close();

  ?>


		


</body>

</html>