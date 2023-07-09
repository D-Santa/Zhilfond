<?php
ini_set('max_execution_time', 0);
ini_set('memory_limit', '512M');
$finalKey=array();
 require_once('mybaza.php');
$title = "Уважаемый(ая) пользователь Zhilfond";
$message = $_GET['title'];
$sobw = "Уведомление: ".$message;
 $path_to_FCM = 'https://fcm.googleapis.com/fcm/send';
 $server_key = 'AAAAGbt-630:APA91bGMxxAVMG6USIWbFpaj_tGB3bcCU7q6nWzQ_8nB63TUOuCpuK9JbqJaPnWD0gJfUPNX6mDZvdjZKWW36b5xrPvRRyk-MDJcyGMuqSm8RyMc78PCt7EHiUJiy9H7xCwwMuSMI3rw';

$headers = array('Authorization:key='.$server_key,'Content-Type:application/json');
$result = mysqli_query( $conn,"select * from tokeny");
$s=0;
	while($row = mysqli_fetch_array($result)){
		//if ($row['push']=="1")
$finalKey[]=$row['text']; 
	}
$field = array('registration_ids'=>$finalKey,'notification'=>array('title'=>$title,'body'=>$sobw,'sound'=>'default'));
$payload = json_encode($field);
$curl_session = curl_init();
curl_setopt($curl_session, CURLOPT_URL, $path_to_FCM); 
curl_setopt($curl_session, CURLOPT_POST, true);
curl_setopt($curl_session, CURLOPT_HTTPHEADER, $headers); 
curl_setopt($curl_session, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl_session, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl_session, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
curl_setopt($curl_session, CURLOPT_POSTFIELDS, $payload);
	$result = curl_exec($curl_session);
	curl_close($curl_session);


?>
