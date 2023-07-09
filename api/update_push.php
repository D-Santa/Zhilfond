<?php
header('Access-Control-Allow-Origin: *');
require_once('mybaza.php');
$id=$_GET['id'];
$zapros=$_GET['zapros'];
$response = array(); 

$update_client = mysqli_query( $conn,"UPDATE `zhilfond`.`user` SET `push` = '$zapros'  WHERE `user`.`id` =".$id);
$dan['message']="ok";  
array_push($response, $dan);
		 

echo json_encode($response,JSON_UNESCAPED_UNICODE);
?>