<?php
header('Access-Control-Allow-Origin: *');
require_once('mybaza.php');
$id=$_GET['id'];
$zapros=$_GET['zapros'];
$response = array();
$client = mysqli_query($conn,"SELECT * FROM `message` WHERE `e_id` = '$id'"); 
if($row_client = mysqli_fetch_array($client)){	
$clients = mysqli_query($conn,"SELECT * FROM `message` WHERE `e_id` = '$id' ORDER BY `message`.`id` ASC"); 
while($row = mysqli_fetch_array($clients)){	
if ($zapros=="admin"){
$dan['text']=$row['comment'];
if ($row['type']=="sent"){	
$dan['type']="received";
	$dan['footer']='';
}
else{
$dan['type']="sent";
if ($row['active']=="0")
$dan['footer']='не прочитано';
else	
$dan['footer']='прочитано';
}	
$dan['name']=$row['data'];
$dan['avatar']=$row['avatar'];
}
else
{
$dan['text']=$row['comment'];	
$dan['type']=$row['type'];	
$dan['name']=$row['data'];	
$dan['avatar']=$row['avatar'];	
if ($row['type']=="sent")
{
if ($row['active']=="0")
$dan['footer']='не прочитано';
else	
$dan['footer']='прочитано';
}
else
	$dan['footer']='';
}
array_push($response, $dan);
}
}

echo json_encode($response,JSON_UNESCAPED_UNICODE);
?>