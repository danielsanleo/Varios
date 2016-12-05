<?php

  	## Funcion enviar notificaciones
  	function sendPushNotificationToGCMSever($token, $titulo, $body) {

		// Clave google Notificaciones
		$server_key='AAAAOpuNUp8:APA91bGkLnyoLy-QRu95-ZqCQxysxbkL8v1X0T7yGwG-SQmYtiFuFkDBr5QD0ZIMkhYolN-2L4JNqEY4Kyhn-kI7E5tWc_JzhY7ozqjbc9EAi1fZfwZJh12piyQmALqPkGslaldOCkH1gtSZ-un7F1BTHxHrRJG8bw';

        $path_to_firebase_cm = 'https://fcm.googleapis.com/fcm/send';
		
		$fields = array(
            'to' => $token,
            'notification' => array('title' => $titulo, 'body' => $body),
            'data' => array('message' => $message)
        );

        $headers = array(
            'Authorization:key=' . $server_key,
            'Content-Type:application/json'
        );		
		$ch = curl_init();
 
        curl_setopt($ch, CURLOPT_URL, $path_to_firebase_cm); 
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4 ); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    
        $result = curl_exec($ch);
       
        curl_close($ch);

        return $result;
	}
  
  
      # Ejecutar funcion
      $message = array("FCM" => $_POST['titular']);
		  $jsonString = sendPushNotificationToGCMSever($token['token'], 'Villamayor Noticias', $_POST['titular']);
		  $jsonObject = json_decode($jsonString);  
  
  
?>
