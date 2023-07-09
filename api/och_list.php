<?php
header('Access-Control-Allow-Origin: *');
require_once('mybaza.php');
$id=$_GET['id'];
$response = array();
$zapros=$_GET['zapros'];
if ($zapros=="list"){
$clients = mysqli_query($conn,"SELECT * FROM `history_ochered` WHERE `id_user`='$id' ORDER BY `history_ochered`.`id` DESC"); 
while($row = mysqli_fetch_array($clients)){
$dan['message']="ok";	
$dan['data_proverka']=$row['data'];
$dan['nomer']=$row['nomer'];	
$dan['data']=$row['data_ochered'];
$dan['cat']=$row['cat'];
$dan['iin']=$row['iin'];
$dan['fam']=$row['fam'];
$dan['im']=$row['im'];
$dan['ot']=$row['ot'];
$dan['god']="2019";
array_push($response, $dan);
}

	
}
echo json_encode($response,JSON_UNESCAPED_UNICODE);

?>