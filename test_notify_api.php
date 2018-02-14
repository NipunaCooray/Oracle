<?php


//Make sure that it is a POST request.
if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') != 0){
    throw new Exception('Request method must be POST!');
}
 
//Make sure that the content type of the POST request has been set to application/json
$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
if(strcasecmp($contentType, 'application/json') != 0){
    throw new Exception('Content type must be: application/json');
}
 
# Get JSON as a string
$json_str = file_get_contents('php://input');
 
# Get as an object
$json_obj = json_decode($json_str,false);
 
// //If json_decode failed, the JSON is invalid.
// if(!is_array($json_obj)){
//     throw new Exception('Received content contained invalid JSON!');
// }

print_r($json_obj);



?>