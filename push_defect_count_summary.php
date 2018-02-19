<?php

include("connect.php");

$link=Connection();

$query = "SELECT planningdata.machineNumber, planningdata.knittedQuantity,planningdata.reworkQuantity,planningdata.rejectQuantity,planningdata.plannedQuantity  FROM `planningdata` Where planningdata.orderState='ongoing' ";

$results=mysqli_query($link,$query);

if($results === FALSE) { 
	die(mysqli_error($link)); // TODO: better error handling
}



while($row = mysqli_fetch_array($results)) {

    $data = array();

	$machineNumber = $row[0];
	$knittedQuantity =  (int)$row[1];
	$reworkQuantity =  (int)$row[2];
	$rejectQuantity =  (int)$row[3];
	$plannedQuantity =  (int)$row[4];

	$goodQuantity = $knittedQuantity-$reworkQuantity;

    date_default_timezone_set('Asia/Colombo');

    //$currentTime = date("H:i:s");
    $currentTime =time();
	

   array_push($data,array('machineNumber'=>$machineNumber,'goodQuantity'=>$goodQuantity,'reworkQuantity'=>$reworkQuantity,'rejectQuantity'=>$rejectQuantity,'plannedQuantity'=>$plannedQuantity,'currentTime'=>$currentTime ));


    $data_string = json_encode($data);  

    echo $data_string;

    //Change address when pushing into server
                                                                                                                         
    $ch = curl_init("https://api.powerbi.com/beta/852c5799-8134-4f15-9d38-eba4296cc76f/datasets/1e62ec3e-c6f5-40ad-91dc-f320b5f22054/rows?key=9juSRxt8CMeybaw8O3QORJGTvKbZIxI2TCH%2FuywZ5AceJOT8fTty%2BBnP3uny8qxBefTbLU%2FxufNrYXNMYnk%2BWA%3D%3D");    
    //$ch = curl_init('http://kodams.xyz/notify_piece_out_api.php');                                                                   
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
        'Content-Type: application/json',                                                                                
        'Content-Length: ' . strlen($data_string))                                                                       
    ); 

    $result = curl_exec($ch);

    if (curl_errno($ch)) {
        // this would be your first hint that something went wrong
        die('Couldn\'t send request: ' . curl_error($ch));
    } 

    
    curl_close($ch);


}
                                                             


?>