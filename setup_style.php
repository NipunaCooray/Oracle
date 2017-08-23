<?php

include("connect.php");

$link=Connection();

$styleNumber = isset($_POST['styleNumber']) ? $_POST['styleNumber'] : null;

$imageLocation =  basename($_FILES["myFileSelect"]["name"]);

$A_x = isset($_POST['A_x']) ? $_POST['A_x'] : null;
$A_y = isset($_POST['A_y']) ? $_POST['A_y'] : null;

$A1_x = isset($_POST['A1_x']) ? $_POST['A1_x'] : null;
$A1_y = isset($_POST['A1_y']) ? $_POST['A1_y'] : null;

$A2_x = isset($_POST['A2_x']) ? $_POST['A2_x'] : null;
$A2_y = isset($_POST['A2_y']) ? $_POST['A2_y'] : null;

$B_x = isset($_POST['B_x']) ? $_POST['B_x'] : null;
$B_y = isset($_POST['B_y']) ? $_POST['B_y'] : null;

$B1_x = isset($_POST['B1_x']) ? $_POST['B1_x'] : null;
$B1_y = isset($_POST['B1_y']) ? $_POST['B1_y'] : null;

$B2_x = isset($_POST['B2_x']) ? $_POST['B2_x'] : null;
$B2_y = isset($_POST['B2_y']) ? $_POST['B2_y'] : null;

$B3_x = isset($_POST['B3_x']) ? $_POST['B3_x'] : null;
$B3_y = isset($_POST['B3_y']) ? $_POST['B3_y'] : null;

$B4_x = isset($_POST['B4_x']) ? $_POST['B4_x'] : null;
$B4_y = isset($_POST['B4_y']) ? $_POST['B4_y'] : null;

$B5_x = isset($_POST['B5_x']) ? $_POST['B5_x'] : null;
$B5_y = isset($_POST['B5_y']) ? $_POST['B5_y'] : null;

$B6_x = isset($_POST['B6_x']) ? $_POST['B6_x'] : null;
$B6_y = isset($_POST['B6_y']) ? $_POST['B6_y'] : null;

$C_x = isset($_POST['C_x']) ? $_POST['C_x'] : null;
$C_y = isset($_POST['C_y']) ? $_POST['C_y'] : null;

$C1_x = isset($_POST['C1_x']) ? $_POST['C1_x'] : null;
$C1_y = isset($_POST['C1_y']) ? $_POST['C1_y'] : null;

$C2_x = isset($_POST['C2_x']) ? $_POST['C2_x'] : null;
$C2_y = isset($_POST['C2_y']) ? $_POST['C2_y'] : null;

$E1_x = isset($_POST['E1_x']) ? $_POST['E1_x'] : null;
$E1_y = isset($_POST['E1_y']) ? $_POST['E1_y'] : null;

$E2_x = isset($_POST['E2_x']) ? $_POST['E2_x'] : null;
$E2_y = isset($_POST['E2_y']) ? $_POST['E2_y'] : null;

$H_x = isset($_POST['H_x']) ? $_POST['H_x'] : null;
$H_y = isset($_POST['H_y']) ? $_POST['H_y'] : null;

$H1_x = isset($_POST['H1_x']) ? $_POST['H1_x'] : null;
$H1_y = isset($_POST['H1_y']) ? $_POST['H1_y'] : null;

$H2_x = isset($_POST['H2_x']) ? $_POST['H2_x'] : null;
$H2_y = isset($_POST['H2_y']) ? $_POST['H2_y'] : null;

$H3_x = isset($_POST['H3_x']) ? $_POST['H3_x'] : null;
$H3_y = isset($_POST['H3_y']) ? $_POST['H3_y'] : null;

$H4_x = isset($_POST['H4_x']) ? $_POST['H4_x'] : null;
$H4_y = isset($_POST['H4_y']) ? $_POST['H4_y'] : null;

$S1_x = isset($_POST['S1_x']) ? $_POST['S1_x'] : null;
$S1_y = isset($_POST['S1_y']) ? $_POST['S1_y'] : null;

$S2_x = isset($_POST['S2_x']) ? $_POST['S2_x'] : null;
$S2_y = isset($_POST['S2_y']) ? $_POST['S2_y'] : null;

$S3_x = isset($_POST['S3_x']) ? $_POST['S3_x'] : null;
$S3_y = isset($_POST['S3_y']) ? $_POST['S3_y'] : null;

$S4_x = isset($_POST['S4_x']) ? $_POST['S4_x'] : null;
$S4_y = isset($_POST['S4_y']) ? $_POST['S4_y'] : null;

$T_x = isset($_POST['T_x']) ? $_POST['T_x'] : null;
$T_y = isset($_POST['T_y']) ? $_POST['T_y'] : null;

$TT_x = isset($_POST['TT_x']) ? $_POST['TT_x'] : null;
$TT_y = isset($_POST['TT_y']) ? $_POST['TT_y'] : null;

$V1_x = isset($_POST['V1_x']) ? $_POST['V1_x'] : null;
$V1_y = isset($_POST['V1_y']) ? $_POST['V1_y'] : null;

$V2_x = isset($_POST['V2_x']) ? $_POST['V2_x'] : null;
$V2_y = isset($_POST['V2_y']) ? $_POST['V2_y'] : null;

$V3_x = isset($_POST['V3_x']) ? $_POST['V3_x'] : null;
$V3_y = isset($_POST['V3_y']) ? $_POST['V3_y'] : null;

$V4_x = isset($_POST['V4_x']) ? $_POST['V4_x'] : null;
$V4_y = isset($_POST['V4_y']) ? $_POST['V4_y'] : null;



$query = "INSERT INTO `styledata` (`styleNumber`, `imageLocation`,`A_x`,`A_y`,`A1_x`,`A1_y`,`A2_x`,`A2_y`,`B_x`,`B_y`,`B1_x`,`B1_y`,`B2_x`,`B2_y`,`B3_x`,`B3_y`,`B4_x`,`B4_y`,`B5_x`,`B5_y`,`B6_x`,`B6_y`,`C_x`,`C_y`,`C1_x`,`C1_y`,`C2_x`,`C2_y`,`E1_x`,`E1_y`,`E2_x`,`E2_y`,`H_x`,`H_y`,`H1_x`,`H1_y`,`H2_x`,`H2_y`,`H3_x`,`H3_y`,`H4_x`,`H4_y`,`S1_x`,`S1_y`,`S2_x`,`S2_y`,`S3_x`,`S3_y`,`S4_x`,`S4_y`,`T_x`,`T_y`,`TT_x`,`TT_y`,`V1_x`,`V1_y`,`V2_x`,`V2_y`,`V3_x`,`V3_y`,`V4_x`,`V4_y`) 
   		VALUES ('".$styleNumber."','".$imageLocation."','".$A_x."','".$A_y."','".$A1_x."','".$A1_y."','".$A2_x."','".$A2_y."','".$B_x."','".$B_y."','".$B1_x."','".$B1_y."','".$B2_x."','".$B2_y."','".$B3_x."','".$B3_y."','".$B4_x."','".$B4_y."','".$B5_x."','".$B5_y."','".$B6_x."','".$B6_y."','".$C_x."','".$C_y."','".$C1_x."','".$C1_y."','".$C2_x."','".$C2_y."','".$E1_x."','".$E1_y."','".$E2_x."','".$E2_y."','".$H_x."','".$H_y."','".$H1_x."','".$H1_y."','".$H2_x."','".$H2_y."','".$H3_x."','".$H3_y."','".$H4_x."','".$H4_y."','".$S1_x."','".$S1_y."','".$S2_x."','".$S2_y."','".$S3_x."','".$S3_y."','".$S4_x."','".$S4_y."','".$T_x."','".$T_y."','".$TT_x."','".$TT_y."','".$V1_x."','".$V1_y."','".$V2_x."','".$V2_y."','".$V3_x."','".$V3_y."','".$V4_x."','".$V4_y."')"; 
      	
$result = mysql_query($query,$link) or die(mysql_error());
mysql_close($link);

if ($result==1){
	echo "Successfully saved";
}else{
	echo $result;
}


?>