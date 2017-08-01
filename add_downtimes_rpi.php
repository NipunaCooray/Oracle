<?php
   	include("connect.php");
   	
   	$link=Connection();

	$downtimetypeid=$_GET[downtimetypeid];
	$machineno=$_GET[machineno];
   $stoptime=$_GET[stoptime];
   $a1=$_GET[a1];
   $a2=$_GET[a2];
   $a3=$_GET[a3];
   $b1=$_GET[b1];
  

	$query = "INSERT INTO `defects` (`machineNo`, `dt`,`status`, `a1`,`a2`, `a3` , `b1`,`b2`, `c1`,`c2`, `d`,`dj`, `f`,`f1`, `g1`,`g2`, `g3`,`g4`, `h1`,`h2`, `total`) 
		VALUES ('".$machineNo."','".$dt."','".$status."','".$a1."','".$a2."','".$a3."','".$b1."','".$b2."','".$c1."','".$c2."','".$d."','".$dj."','".$f."','".$f1."','".$g1."','".$g2."','".$g3."','".$g4."','".$h1."','".$h2."','".$total."')"; 
   	
   	mysql_query($query,$link);
	   mysql_close($link);

   	header("Location: index.php");
?>
