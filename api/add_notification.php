<?php
ini_set('max_execution_time', 0);
ini_set('memory_limit', '512M');
header('Access-Control-Allow-Origin: *');
require_once('mybaza.php');
$topick=$_POST['topick'];
$text=$_POST['text'];
$topick_kz=$_POST['topick_kz'];
$text_kz=$_POST['text_kz'];
$id=$_POST['id'];
$response = array();
$zapros=$_POST['zapros'];

if ($zapros=="update"){
	$id=$_POST['id']; 
$update_client = mysqli_query( $conn,"UPDATE `zhilfond`.`notification` SET `topick` = '$topick', `text` = '$text', `topick_kz` = '$topick_kz', `text_kz` = '$text_kz' WHERE `notification`.`id` = ".$id);
$dan['message']="ok";  
array_push($response, $dan);
}
else
	if ($zapros=="list"){
if ($id==""){
$clients = mysqli_query($conn,"SELECT * FROM `notification` ORDER BY `notification`.`id` ASC"); 
if($row = mysqli_fetch_array($clients)){	
$clients2 = mysqli_query($conn,"SELECT * FROM `notification` ORDER BY `notification`.`id` ASC"); 
while($row2 = mysqli_fetch_array($clients2)){
$dan['message']="ok";
$dan['topick']=$row2['topick'];
$dan['topick_kz']=$row2['topick_kz'];
$dan['text']=$row2['text'];
$dan['text_kz']=$row2['text_kz'];
$dan['id']=$row2['id'];
array_push($response, $dan);
}
}
else
{
$dan['message']="ok";
array_push($response, $dan);
}	
}
else
{
$clients = mysqli_query($conn,"SELECT * FROM `notification` WHERE `id` = '$id' ORDER BY `notification`.`id` ASC"); 
if($row = mysqli_fetch_array($clients)){	
$dan['message']="ok";
$dan['topick']=$row['topick'];
$dan['text']=$row['text'];  
$dan['topick_kz']=$row['topick_kz'];
$dan['text_kz']=$row['text_kz'];
array_push($response, $dan);
} 

}
$id_user=$_POST['id_user'];
if ($id_user!=""){
	$not = mysqli_query($conn,"SELECT * FROM `uvedom`"); 
if($row_not = mysqli_fetch_array($not)){
	$texs=$row_not['text'];
mysqli_query( $conn,"UPDATE `zhilfond`.`user` SET `notification` = '$texs' WHERE `user`.`id` = ".$id_user);
}
}	
		
	}
	else
		if ($zapros=="delete"){
$sql = "DELETE FROM notification WHERE id=".$id;
 mysqli_query($conn,$sql);
$dan['message']="ok";
array_push($response, $dan);
}
else
if ($zapros=="add"){ 
$sqls="INSERT INTO `notification` (`id`, `topick`, `text`, `topick_kz`, `text_kz`, `id_type`, `data`) VALUES (NULL, '$topick', '$text', '$topick_kz', '$text_kz', '1', current_timestamp());";	
mysqli_query($conn, $sqls);	
$dan['message']="ok";
array_push($response, $dan);

//file_get_contents("http://zhilfondapp.kz/api/send.php?title=".sprintf($topick));
$rand = rand(1000000, 9999999);
mysqli_query( $conn,"UPDATE `zhilfond`.`uvedom` SET `text` = '$rand' WHERE `uvedom`.`id` = 1");


$finalKey=array();
$title = "Уважаемый(ая) пользователь Zhilfond";
 $path_to_FCM = 'https://fcm.googleapis.com/fcm/send';
 $server_key = 'AAAAGbt-630:APA91bGMxxAVMG6USIWbFpaj_tGB3bcCU7q6nWzQ_8nB63TUOuCpuK9JbqJaPnWD0gJfUPNX6mDZvdjZKWW36b5xrPvRRyk-MDJcyGMuqSm8RyMc78PCt7EHiUJiy9H7xCwwMuSMI3rw';

$headers = array('Authorization:key='.$server_key,'Content-Type:application/json');
$result = mysqli_query( $conn,"select * from tokeny");
	while($row = mysqli_fetch_array($result)){
		//if ($row['push']=="1")
$finalKey[]=$row['text']; 
	}
$field = array('registration_ids'=>$finalKey,'notification'=>array('title'=>$title,'body'=>$topick,'sound'=>'default'));
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
} 
echo json_encode($response,JSON_UNESCAPED_UNICODE);
?>
