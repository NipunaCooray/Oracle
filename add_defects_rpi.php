<?php
   	include("connect.php");
   	
   	$link=Connection();

	$machineNo=$_GET[machineNo];
	$dt=$_GET[dt];
   $status=$_GET[status];
   $a1=$_GET[a1];
   $a2=$_GET[a2];
   $a3=$_GET[a3];
   $b1=$_GET[b1];
   $b2=$_GET[b2];
   $c1=$_GET[c1];
   $c2=$_GET[c2];
   $d=$_GET[d];
   $dj=$_GET[dj];
   $f=$_GET[f];
   $f1=$_GET[f1];
   $g1=$_GET[g1];
   $g2=$_GET[g2];
   $g3=$_GET[g3];
   $g4=$_GET[g4];
   $h1=$_GET[h1];
   $h2=$_GET[h2];
   $total=$_GET[total];

	$query = "INSERT INTO `defects` (`machineNo`, `dt`,`status`, `a1`,`a2`, `a3` , `b1`,`b2`, `c1`,`c2`, `d`,`dj`, `f`,`f1`, `g1`,`g2`, `g3`,`g4`, `h1`,`h2`, `total`) 
		VALUES ('".$machineNo."','".$dt."','".$status."','".$a1."','".$a2."','".$a3."','".$b1."','".$b2."','".$c1."','".$c2."','".$d."','".$dj."','".$f."','".$f1."','".$g1."','".$g2."','".$g3."','".$g4."','".$h1."','".$h2."','".$total."')"; 
   	
   	mysql_query($query,$link);
	   mysql_close($link);

   	header("Location: index.php");
?>
