<?php


include("connect.php");

//POST request
      
$link=Connection();

$machineNo = isset($_POST['machineNo']) ? $_POST['machineNo'] : null;
$dt = isset($_POST['dt']) ? $_POST['dt'] : null;
$status = isset($_POST['status']) ? $_POST['status'] : null;
$A = isset($_POST['A']) ? $_POST['A'] : null;
$A1 = isset($_POST['A1']) ? $_POST['A1'] : null;
$A2 = isset($_POST['A2']) ? $_POST['A2'] : null;
$B = isset($_POST['B']) ? $_POST['B'] : null;
$B1 = isset($_POST['B1']) ? $_POST['B1'] : null;
$B2 = isset($_POST['B2']) ? $_POST['B2'] : null;
$B3 = isset($_POST['B3']) ? $_POST['B3'] : null;
$B4 = isset($_POST['B4']) ? $_POST['B4'] : null;
$B5 = isset($_POST['B5']) ? $_POST['B5'] : null;
$B6 = isset($_POST['B6']) ? $_POST['B6'] : null;
$C = isset($_POST['C']) ? $_POST['C'] : null;
$C1 = isset($_POST['C1']) ? $_POST['C1'] : null;
$C2 = isset($_POST['C2']) ? $_POST['C2'] : null;
$E1 = isset($_POST['E1']) ? $_POST['E1'] : null;
$E2 = isset($_POST['E2']) ? $_POST['E2'] : null;
$H = isset($_POST['H']) ? $_POST['H'] : null;
$H1 = isset($_POST['H1']) ? $_POST['H1'] : null;
$H2 = isset($_POST['H2']) ? $_POST['H2'] : null;
$H3 = isset($_POST['H3']) ? $_POST['H3'] : null;
$H4 = isset($_POST['H4']) ? $_POST['H4'] : null;
$S1 = isset($_POST['S1']) ? $_POST['S1'] : null;
$S2 = isset($_POST['S2']) ? $_POST['S2'] : null;
$S3 = isset($_POST['S3']) ? $_POST['S3'] : null;
$S4 = isset($_POST['S4']) ? $_POST['S4'] : null;
$T = isset($_POST['T']) ? $_POST['T'] : null;
$TT = isset($_POST['TT']) ? $_POST['TT'] : null;
$V1 = isset($_POST['V1']) ? $_POST['V1'] : null;
$V2 = isset($_POST['V2']) ? $_POST['V2'] : null;
$V3 = isset($_POST['V3']) ? $_POST['V3'] : null;
$V4 = isset($_POST['V4']) ? $_POST['V4'] : null;
$total = isset($_POST['total']) ? $_POST['total'] : null;


 $query = "INSERT INTO `defects` (`machineNo`, `dt`,`status` , `A`,`A1`, `A2`,`B`, `B1`,`B2`, `B3`,`B4`,`B5`,`B6`,`C`,`C1`,`C2`,`E1`,`E2`,`H`,`H1`,`H2`,`H3`,`H4`,`S1`,`S2`,`S3`,`S4`,`T`,`TT`,`V1`,`V2`,`V3`,`V4`,`total`) 
         VALUES ('".$machineNo."','".$dt."','".$status."','".$A."','".$A1."','".$A2."','".$B."','".$B1."','".$B2."','".$B3."','".$B4."','".$B5."','".$B6."','".$C."','".$C1."','".$C2."','".$E1."','".$E2."','".$H."','".$H1."','".$H2."','".$H3."','".$H4."','".$S1."','".$S2."','".$S3."','".$S4."','".$T."','".$TT."','".$V1."','".$V2."','".$V3."','".$V4."','".$total."')"; 
         
$result = mysql_query($query,$link) or die(mysql_error());
mysql_close($link);

if ($result==1){
   echo "Successfully saved";
}else{
   echo $result;
}

?>
