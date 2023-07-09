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
$comment=$_POST['comment'];
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
    $dan['comment']=$row2['comment'];
    array_push($response, $dan);
    }
}else
if ($zapros=="add"){
    $clients2 = mysqli_query($conn,"SELECT * FROM newza WHERE iin = ".$iin);
    if($row2 = mysqli_fetch_array($clients2)){
        $dan['message']="ok";
    array_push($response, $dan);
    }
    else
    {
    $sql="INSERT INTO `newza` (`id`, `fio`, `iin`, `iban`, `cat`, `tel`, `post`, `comment`) VALUES (NULL, '$fio', '$iin', '$iban', '$cat', '$tel', '$post', '$comment');";
    if(mysqli_query($conn, $sql)){
    $dan['message']="ok";
    array_push($response, $dan);
    }
}
}
echo json_encode($response,JSON_UNESCAPED_UNICODE); 
?>