<?php
header('Access-Control-Allow-Origin: *');
require_once('mybaza.php');
$id=$_GET['id'];
$theme=$_GET['theme'];
$comment=$_GET['comment'];
$ochered=$_GET['ochered'];
$zapros=$_GET['zapros'];
$name = $_GET['name'];
$iin = $_GET['iin'];
$response = array();
if ($zapros==""){
if ($comment=="")
$comment = "?";
$result22 = mysqli_query( $conn,"select * from e_ob WHERE id_client='$id'"); 
if($row22 = mysqli_fetch_array($result22)){
	$e_id = $row22['id'];
	$sqls="INSERT INTO `message` (`id`, `e_id`, `comment`, `type`, `active`, `data`, `avatar`) VALUES (NULL, '$e_id', '$comment', 'sent', '0',  current_timestamp(), 'http://zhilfondapp.kz/api/user.jpg');";	
	mysqli_query($conn, $sqls);
}
else{
$sql="INSERT INTO `e_ob` (`id`, `id_client`, `ochered`, `theme`, `comment`, `iin`) VALUES (NULL, '$id', '$ochered', '$theme', '$comment', '$iin');";
if(mysqli_query($conn, $sql)){
$e_id = $conn->insert_id;
$sqls="INSERT INTO `message` (`id`, `e_id`, `comment`, `type`, `active`, `data`, `avatar`) VALUES (NULL, '$e_id', '$comment', 'sent', '0',  current_timestamp(), 'http://zhilfondapp.kz/api/user.jpg');";	
mysqli_query($conn, $sqls);
}
}
$dan['message']="ok";
array_push($response, $dan);
}
else
{
	if ($id=="0"){
	$result2 = mysqli_query( $conn,"select * from e_ob ORDER BY id DESC"); 
while($row2 = mysqli_fetch_array($result2)){	
$sum = 0;
	$result = mysqli_query( $conn,"select * from user WHERE id=".$row2['id_client']); 
	$dan['message']="ok";
if($row = mysqli_fetch_array($result)){		
$dan['fam']=$row['fam'];
$dan['im']=$row['im'];
$dan['ot']=$row['ot'];
$dan['phone']=$row['phone'];
}
$e_id = $row2['id']; 
$client = mysqli_query($conn,"SELECT * FROM `message` WHERE `e_id` = '$e_id' and `type` = 'sent' and `active` = '0'"); 
if($row_client = mysqli_fetch_array($client)){	
$sum +=mysqli_num_rows($client);
$dan['ochered']= $sum;
}
else
$dan['ochered']=$sum;
$dan['theme']=$row2['theme'];
$dan['iin']=$row2['iin'];
$dan['id']=$row2['id'];
array_push($response, $dan);
}			
	}
	else
	{
$result = mysqli_query( $conn,"select * from e_ob WHERE id_client='$id'");
if($row = mysqli_fetch_array($result)){
	$result2 = mysqli_query( $conn,"select * from e_ob WHERE id_client='$id'");
while($row2 = mysqli_fetch_array($result2)){
$sum = 0;	
$dan['message']="ok";
$dan['theme']=$row2['theme'];
$dan['id']=$row2['id'];
$e_id = $row2['id']; 
$client = mysqli_query($conn,"SELECT * FROM `message` WHERE `e_id` = '$e_id' and `type` = 'received' and `active` = '0'"); 
if($row_client = mysqli_fetch_array($client)){	
$sum +=mysqli_num_rows($client);
$dan['ochered']= $sum;
}
else
$dan['ochered']=$sum;	
array_push($response, $dan);
}
}
else
{
$dan['message']="no";
array_push($response, $dan);
}
}
	
}


echo json_encode($response,JSON_UNESCAPED_UNICODE); 
?>
