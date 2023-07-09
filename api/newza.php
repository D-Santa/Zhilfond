<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
require_once('mybaza.php');
$response = array();
$fio=$_POST['fio'];
$iin=$_POST['iin'];
$iban=$_POST['iban'];
$cat=$_POST['cat'];
$tel=$_POST['tel'];
$post=$_POST['post'];
$zapros=$_POST['zapros'];
if ($zapros=="list"){
    $clients2 = mysqli_query($conn,"SELECT * FROM `newza` ORDER BY `newza`.`id` ASC");
    while($row2 = mysqli_fetch_array($clients2)){
    $dan['message']="ok";
    $dan['fio']=$row2['fio'];
    $dan['iin']=$row2['iin'];
    $dan['iban']=$row2['iban'];
    $dan['cat']=$row2['cat'];
    $dan['tel']=$row2['tel'];
    $dan['post']=$row2['post'];
    array_push($response, $dan);
    }
}else
if ($zapros=="add"){
    $sql="INSERT INTO `newza` (`id`, `fio`, `iin`, `iban`, `cat`, `tel`, `post`) VALUES (NULL, '$fio', '$iin', '$iban', '$cat', '$tel', '$post');";
    if(mysqli_query($conn, $sql)){
    $dan['message']="ok";
    array_push($response, $dan);
    }
}
echo json_encode($response,JSON_UNESCAPED_UNICODE); 
?>