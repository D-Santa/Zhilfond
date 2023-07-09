<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Cache-Control, Pragma, Origin, Authorization, Content-Type, X-Requested-With');
header('Access-Control-Allow-Methods: GET, PUT, POST');
require_once('mybaza.php');
require('html2text/html2text.php');
$response = array();
$id=$_POST['id'];
$user=$_POST['user'];
$zapros = $_POST['zapros'];
if ($zapros=="delete"){
$sql = "DELETE FROM proga WHERE id=".$id;
 mysqli_query($conn,$sql);
$dan['message']="ok";
array_push($response, $dan);
unlink("img_proga/".$id.".png");
unlink("img_proga/".$id.".jpg");
unlink("img_proga/".$id.".jpeg");
}
else
{
if ($id==""){
$clients = mysqli_query($conn,"SELECT * FROM `proga` ORDER BY `proga`.`id` DESC"); 
if($row = mysqli_fetch_array($clients)){	
$clients2 = mysqli_query($conn,"SELECT * FROM `proga` ORDER BY `proga`.`id` DESC"); 
while($row2 = mysqli_fetch_array($clients2)){
$dan['message']="ok";
$dan['topick']=$row2['topick'];
$dan['topick_kz']=$row2['topick_kz'];
$dan['text']=$row2['text'];
$dan['image']=$row2['image'];
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
$clients = mysqli_query($conn,"SELECT * FROM `proga` WHERE `id` = '$id' ORDER BY `proga`.`id` DESC"); 
if($row = mysqli_fetch_array($clients)){	
$dan['message']="ok";
$dan['image']=$row['image'];
$dan['topick']=$row['topick'];
$dan['text']=$row['text'];
$dan['topick_kz']=$row['topick_kz'];
$dan['text_kz']=$row['text_kz'];
array_push($response, $dan);
} 

}	
}
	
echo json_encode($response,JSON_UNESCAPED_UNICODE);

?>