<?php
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
$update_client = mysqli_query( $conn,"UPDATE `zhilfond`.`poleznyi` SET `topick` = '$topick', `text` = '$text', `topick_kz` = '$topick_kz', `text_kz` = '$text_kz' WHERE `poleznyi`.`id` = ".$id);
$dan['message']="ok";  
array_push($response, $dan);
}
else
	if ($zapros=="list"){
if ($id==""){
$clients = mysqli_query($conn,"SELECT * FROM `poleznyi` ORDER BY `poleznyi`.`id` ASC"); 
if($row = mysqli_fetch_array($clients)){	
$clients2 = mysqli_query($conn,"SELECT * FROM `poleznyi` ORDER BY `poleznyi`.`id` ASC"); 
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
$clients = mysqli_query($conn,"SELECT * FROM `poleznyi` WHERE `id` = '$id' ORDER BY `poleznyi`.`id` ASC"); 
if($row = mysqli_fetch_array($clients)){	
$dan['message']="ok";
$dan['topick']=$row['topick'];
$dan['text']=$row['text'];
$dan['topick_kz']=$row['topick_kz'];
$dan['text_kz']=$row['text_kz'];
array_push($response, $dan);
} 

}	
		
	}
	else
		if ($zapros=="delete"){
$sql = "DELETE FROM poleznyi WHERE id=".$id;
 mysqli_query($conn,$sql);
$dan['message']="ok";
array_push($response, $dan);
}
else
if ($zapros=="add"){ 
	
$sqls="INSERT INTO `poleznyi` (`id`, `topick`, `text`, `topick_kz`, `text_kz`) VALUES (NULL, '$topick', '$text', '$topick_kz', '$text_kz');";	
mysqli_query($conn, $sqls);	
$dan['message']="ok";
array_push($response, $dan);
} 
echo json_encode($response,JSON_UNESCAPED_UNICODE);
?>