<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
require_once('mybaza.php');
$response = array();
$e_ob = mysqli_query($conn,"SELECT * FROM `e_ob`"); 
$dan['e_ob'] = mysqli_num_rows($e_ob);
$ochered = mysqli_query($conn,"SELECT * FROM `history_ochered`"); 
$dan['ochered']= mysqli_num_rows($ochered);
$download = mysqli_query($conn,"SELECT * FROM `obw`"); 
if($row_download = mysqli_fetch_array($download)){
$dan['download']= $row_download['download'];
}
$clients2 = mysqli_query($conn,"SELECT * FROM `user` WHERE `active` = 1 ORDER BY `user`.`id` ASC");
while($row2 = mysqli_fetch_array($clients2)){
$dan['message']="ok";
$dan['fio']=$row2['fam']." ".$row2['im']." ".$row2['ot'];
$dan['data']=$row2['data'];
$dan['phone']=$row2['phone'];
array_push($response, $dan);
} 
echo json_encode($response,JSON_UNESCAPED_UNICODE); 
?>
