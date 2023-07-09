<?php
header('Access-Control-Allow-Origin: *');
require_once('mybaza.php');
$id=$_GET['id'];
$response = array();
$zapros=$_GET['zapros'];
if ($zapros=="list"){
	$clients1 = mysqli_query($conn,"SELECT * FROM `history_dolg` WHERE `id_user`='$id' ORDER BY `history_dolg`.`id` DESC"); 
if($row1 = mysqli_fetch_array($clients1));else{
		$dan['message']="no";	
	array_push($response, $dan); 	
}
$clients = mysqli_query($conn,"SELECT * FROM `history_dolg` WHERE `id_user`='$id' ORDER BY `history_dolg`.`id` DESC"); 
while($row = mysqli_fetch_array($clients)){
	$dan['message']="ok";	
	$dan['data_proverka']=$row['data'];
$dan['nan']=$row['nan'];	
$dan['stat']=$row['stat'];  
$dan['data']=$row['data_dolg'];
$dan['d_start']=$row['data_start'];
$dan['d_end']=$row['data_end'];
$dan['summa']=$row['summa']; 
$dan['kfc']=$row['kfc']; 
$dan['naim']=$row['naim']; 
$dan['id_dog']=$row['id_dog'];
array_push($response, $dan);
}

	
}
echo json_encode($response,JSON_UNESCAPED_UNICODE);

?>