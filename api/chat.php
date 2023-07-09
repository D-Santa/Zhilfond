<?php
header('Access-Control-Allow-Origin: *');
require_once('mybaza.php');
$id=$_GET['id'];
$response = array();
$client = mysqli_query($conn,"SELECT * FROM `e_ob` WHERE `id` = '$id'"); 
if($row_client = mysqli_fetch_array($client)){	
$dan['message']="ok";
$dan['id']=$row_client['id'];
//$dan['data']=$row_client['data'];
}
array_push($response, $dan);
echo json_encode($response,JSON_UNESCAPED_UNICODE);
?>