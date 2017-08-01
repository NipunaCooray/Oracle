<html> 
<head>
	

</head>	

<body>

	 

    <?php 
	include("connect.php"); 	

	$link=Connection();

	$allDefects=mysql_query("SELECT * FROM `defecttypes`",$link);

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

	while($row = mysql_fetch_array($allDefects)) {
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
	    echo '<td> <a href="delete_defect_type.php?defecttypeid= ' . $row['defecttypeid'] .  ' " '  , '  class="btn btn-default" > Delete </a> </td> ';
	    echo "</tr>";
	}
	echo "</table>";
	mysql_free_result($allDefects);
	mysql_close();

  ?>


		


</body>

</html>