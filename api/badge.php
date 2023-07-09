<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
require_once('mybaza.php');
$id_user=$_GET['id_user'];
$zapros=$_GET['zapros'];
$response = array();
if ($zapros=="glav"){
	$sum = 0;
	$dan['ochered']=$sum;
	$e_ob = mysqli_query($conn,"SELECT * FROM `e_ob` WHERE `id_client` = '$id_user'");
while($row_e_ob = mysqli_fetch_array($e_ob)){	
$e_id = $row_e_ob['id'];
$client = mysqli_query($conn,"SELECT * FROM `message` WHERE `e_id` = '$e_id' and `type` = 'received' and `active` = '0'"); 
if($row_client = mysqli_fetch_array($client)){	
$sum +=mysqli_num_rows($client);
$dan['ochered']= $sum;
}
else
$dan['ochered']=$sum;	

}
$notifi = mysqli_query($conn,"SELECT * FROM `uvedom` WHERE `id` = '1'");
if($row_notifi = mysqli_fetch_array($notifi)){	
$client = mysqli_query($conn,"SELECT * FROM `user` WHERE `id` = '$id_user'");
if($row_client = mysqli_fetch_array($client)){
if ($row_client['notification']==$row_notifi['text'])	$dan['notifi']="0";	
else $dan['notifi']="1";
}	
}
}
else
{
$sum = 0;
$zap = 0;
$client = mysqli_query($conn,"SELECT * FROM `message` WHERE `type` = 'sent' and `active` = '0'"); 
if($row_client = mysqli_fetch_array($client)){	
$sum =mysqli_num_rows($client);
}
$dan['ochered']=$sum;	
$timezone  = +6;
$data=date('Y-m-d',time() + 3600*($timezone+date("I")));
$zapis = mysqli_query($conn,"SELECT * FROM `zapisi`"); 
while($row_zapis = mysqli_fetch_array($zapis)){	
if ($row_zapis['data']>=$data)
$zap++;
}
$dan['zapis']=$zap;
}	

array_push($response, $dan);
echo json_encode($response,JSON_UNESCAPED_UNICODE);
?>