<?php

function Connection(){
	$server="localhost";
	$user="root";
	$pass="";
	$db="dboracle";
   	
	$connection = mysqli_connect($server,$user,$pass,$db);

	if (!$connection)
	{
		echo "Error: Unable to connect to MySQL." . PHP_EOL;
	    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	    exit;
	}


	return $connection;
}

?>
