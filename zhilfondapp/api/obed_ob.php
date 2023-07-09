<?php
header('Access-Control-Allow-Origin: *');
require_once('mybaza.php');
$e_id="0";
$e_cl="0";
$result2 = mysqli_query( $conn,"select * from e_ob ORDER BY id_client ASC, id ASC"); 
while($row2 = mysqli_fetch_array($result2)){
    $id = $row2['id'];
    if ($e_cl!=$row2['id_client']){
        $e_cl = $row2['id_client'];
        $e_id = $row2['id'];
    }
    else
    $update_client2 = mysqli_query( $conn,"DELETE from `e_ob` WHERE `e_ob`.`id` = '$id'");
    $update_client = mysqli_query( $conn,"UPDATE `message` SET `e_id` = '$e_id' WHERE `message`.`e_id` = '$id'");
    
echo $row2['id']."---".$e_id."<br>";
}
echo "ok";

?>