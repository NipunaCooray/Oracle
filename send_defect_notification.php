<?php 
	
	include("connect.php");

	//Ideally the BOT should send a signal with machine that the piece is out to this file. i.e machineNumber, time

	//Once the signal arrives, need to select the android tab assigned to that machine and need to send a notification


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


	//This will send notifications to android device assigned to particular machine whenever piece is out


	$link=Connection();

	$machineNumber = isset($_POST['machineNumber']) ? $_POST['machineNumber'] : null;

	$getTokensQuery = " Select tabid,token From androidtokens";
	$tokens = array();
	$tokenResult = mysqli_query($link,$getTokensQuery) or die(mysqli_error());

	while($row = mysqli_fetch_array($tokenResult)) {
		$tokens[] = $row["token"];
	}



	$message = array("machine" => "A001","type" => "defect","timestamp" => "20170927");
	$message_status = send_notification($tokens, $message);
	echo $message_status;


	
 ?>