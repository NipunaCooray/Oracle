<?php

include("globals.php");



$data = array
  (
  array("defectid" => 12,"downtime" => 18)
  );

//$data = array("machineNumber" => "A01", "Timestamp" => "2018-01-10 16:23:19");                                                                    
$data_string = json_encode($data);  

echo $data_string;

//Change address when pushing into server
                                                                                                                     
$ch = curl_init("https://api.powerbi.com/beta/852c5799-8134-4f15-9d38-eba4296cc76f/datasets/85314e6d-4366-4298-bab3-3823d2e52e0a/rows?key=pA1K30FTY%2B9fVB9oLcWFAHf37uNOhgaT8lL88SK9RnjcY7HHKs9M6J%2BtWjZudOq2JOlX8%2FWShPCPAfRdLByj5w%3D%3D");    
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