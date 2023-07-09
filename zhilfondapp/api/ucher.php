<?php
header('Access-Control-Allow-Origin: *');
require_once('mybaza.php');
$text=$_POST['text'];
$text_kz=$_POST['text_kz'];
$response = array();
$zapros=$_POST['zapros'];

if ($zapros=="save"){
$update_client = mysqli_query( $conn,"UPDATE `zhilfond`.`ucher` SET `text` = '$text', `text_kz` = '$text_kz'  WHERE `ucher`.`id` = 1");
$dan['message']="ok";  
array_push($response, $dan);
}
else
	if ($zapros=="list"){
$clients = mysqli_query($conn,"SELECT * FROM `ucher`"); 
while($row2 = mysqli_fetch_array($clients)){
$dan['message']="ok";
$dan['text']=$row2['text'];
$dan['text_kz']=$row2['text_kz'];
array_push($response, $dan);
}
}		

echo json_encode($response,JSON_UNESCAPED_UNICODE);
?>