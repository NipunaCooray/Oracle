<?php

	function Connection(){
		$server="localhost";
		//$user="cl60-dbarduino";
		$user="root";
		//$pass="W.m!CFe-B";
		$pass="";
		//$db="cl60-dbarduino";
		$db="dboracle";
	   	
		$connection = mysql_connect($server, $user, $pass);

		if (!$connection) {
	    	die('MySQL ERROR: ' . mysql_error());
		}
		
		mysql_select_db($db) or die( 'MySQL ERROR: '. mysql_error() );

		return $connection;
	}
?>
