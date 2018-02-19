<?php

include("globals.php");

/*

$cars = array
  (
  array("machineNumber":"A01","Timestamp":"2018-01-10 16:23:19"),
  array("machineNumber":"A02","Timestamp":"2018-01-11 16:23:19"),
  );

[
 {"machineNumber":"A01","Timestamp":"2018-01-10 16:23:19"},
 {"machineNumber":"A02","Timestamp":"2018-01-11 16:23:19"}
]

*/

date_default_timezone_set('Asia/Colombo');

//$currentTime = date("H:i:s");
$currentTime =time();

$machineList = array("A01", "A02", "A03","A04", "A05");

$randomMachine = mt_rand (0,4);

$data = array
  (
  array("machineNumber" => $machineList[$randomMachine],"Timestamp" => $currentTime)
  );

//$data = array("machineNumber" => "A01", "Timestamp" => "2018-01-10 16:23:19");                                                                    
$data_string = json_encode($data);  

//Change address when pushing into server
                                                                                                                     
$ch = curl_init($GLOBALS['URL']."notify_piece_out_api.php");    
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
} else {
    // check the HTTP status code of the request
    $resultStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if ($resultStatus == 200) {
        // everything went better than expected
    } else {
        // the request did not complete as expected. common errors are 4xx
        // (not found, bad request, etc.) and 5xx (usually concerning
        // errors/exceptions in the remote script execution)

        die('Request failed: HTTP status code: ' . $resultStatus);
    }
}

curl_close($ch);

// let's pretend this is the behaviour of the target server
if ($result) {
   
    echo $result;
} else {
    die('Request failed: Error: ' . $result);
}


?>