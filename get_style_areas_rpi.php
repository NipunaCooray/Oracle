<?php
include("connect.php");

$link=Connection();

$security_key = isset($_POST['security_key']) ? $_POST['security_key'] : null;
$styleNumber = isset($_POST['styleNumber']) ? $_POST['styleNumber'] : null;

if($security_key == "12345"){

	$styleData=mysqli_query($link,"SELECT imageLocation,A_x,A_y,A1_x,A1_y,A2_x,A2_y,B_x,B_y,B1_x,B1_y,B2_x,B2_y,B3_x,B3_y,B4_x,B4_y,B5_x,B5_y,B6_x,B6_y,C_x,C_y,C1_x,C1_y,C2_x,C2_y,E1_x,E1_y,E2_x,E2_y,H_x,H_y,H1_x,H1_y,H2_x,H2_y,H3_x,H3_y,H4_x,H4_y,S1_x,S1_y,S2_x,S2_y,S3_x,S3_y,S4_x,S4_y,T_x,T_y,TT_x,TT_y,V1_x,V1_y,V2_x,V2_y,V3_x,V3_y,V4_x,V4_y FROM `styledata` WHERE styleNumber = '".$styleNumber."' ");

	if($styleData === FALSE) { 
    	die(mysqli_error($link)); // TODO: better error handling
	}

	$result = array();

	while($row = mysqli_fetch_array($styleData)) {
	   array_push($result,array('imageLocation'=>$row[0],'A_x'=>$row[1],'A_y'=>$row[2],'A1_x'=>$row[3],'A1_y'=>$row[4],'A2_x'=>$row[5],'A2_y'=>$row[6],'B_x'=>$row[7],'B_y'=>$row[8],'B1_x'=>$row[9],'B1_y'=>$row[10],'B2_x'=>$row[11],'B2_y'=>$row[12], 'B3_x'=>$row[13],'B3_y'=>$row[14],'B4_x'=>$row[15],'B4_y'=>$row[16],'B5_x'=>$row[17],'B5_y'=>$row[18],'B6_x'=>$row[19],'B6_y'=>$row[20],'C_x'=>$row[21],'C_y'=>$row[22],'C1_x'=>$row[23],'C1_y'=>$row[24],'C2_x'=>$row[25],'C2_y'=>$row[26] , 'E1_x'=>$row[27],'E1_y'=>$row[28],'E2_x'=>$row[29],'E2_y'=>$row[30], 'H_x'=>$row[31],'H_y'=>$row[32],'H1_x'=>$row[33],'H1_y'=>$row[34],'H2_x'=>$row[35],'H2_y'=>$row[36], 'H3_x'=>$row[37],'H3_y'=>$row[38],'H4_x'=>$row[39],'H4_y'=>$row[40] , 'S1_x'=>$row[41],'S1_y'=>$row[42],'S2_x'=>$row[43],'S2_y'=>$row[44], 'S3_x'=>$row[45],'S3_y'=>$row[46],'S4_x'=>$row[47],'S4_y'=>$row[48], 'T_x'=>$row[49],'T_y'=>$row[50], 'TT_x'=>$row[51],'TT_y'=>$row[52] , 'V1_x'=>$row[53],'V1_y'=>$row[54],'V2_x'=>$row[55],'V2_y'=>$row[56], 'V3_x'=>$row[57],'V3_y'=>$row[58],'V4_x'=>$row[59],'V4_y'=>$row[60] ));
	}

	echo json_encode(array("result"=>$result));

	mysqli_free_result($styleData);
	mysqli_close($link);


}else{
	echo "Security key not matching";
}
 	
?>