<?php
header('Access-Control-Allow-Origin: *');
require_once('mybaza.php');
$id=$_GET['id'];
$zapros=$_GET['zapros'];
if ($zapros=="sent")
$update_client = mysqli_query( $conn,"UPDATE `zhilfond`.`message` SET `active` = '1' WHERE `message`.`e_id` = ".$id." AND `message`.`type` ='sent';");
else
$update_client = mysqli_query( $conn,"UPDATE `zhilfond`.`message` SET `active` = '1' WHERE `message`.`e_id` = ".$id." AND `message`.`type` ='received';");	
?>