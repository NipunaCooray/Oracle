<?php 
      
function send_notification ($tokens, $message)
{
      $url = 'https://fcm.googleapis.com/fcm/send';
      $fields = array(
             'registration_ids' => $tokens,
             'data' => $message
            );
      $headers = array(
            'Authorization:key = AAAASLAl14E:APA91bG9dF2IJmuTsiqxLZuGqYryMRjTAvLjdyAlmnznuqlGeybG10M3dsbAdUwpY5PIgdhpOInIn5QFVIVdsaaoNwOmEM_Fc-ObyiaIqJGPNZkW_-k0EZ1zmJbB81ARLzLEWvgh06F0 ',
            'Content-Type: application/json'
            );
   $ch = curl_init();
 curl_setopt($ch, CURLOPT_URL, $url);
 curl_setopt($ch, CURLOPT_POST, true);
 curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);  
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
 $result = curl_exec($ch);           
 if ($result === FALSE) {
     die('Curl failed: ' . curl_error($ch));
 }
 curl_close($ch);
 return $result;
}

?>