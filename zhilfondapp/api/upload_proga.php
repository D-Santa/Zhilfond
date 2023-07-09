<?php
header('Access-Control-Allow-Origin: *');
require_once('mybaza.php');
$img = $_POST['img'];
//$put = $_POST['put'];
//$name=$_POST['name'];
$topick=$_POST['topick'];
$text=$_POST['text'];
$topick_kz=$_POST['topick_kz'];
$text_kz=$_POST['text_kz'];
$glav=$_POST['glav'];

$response = array();
$zapros=$_POST['zapros'];

if ($zapros=="update"){
	$id=$_POST['id']; 
if ($img!=""){
	$format = "data:image/png;base64";

if (stristr($img, $format)) {
	$format = "png";
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
} 
else
{
$format = "jpg";
$img = str_replace('data:image/jpeg;base64,', '', $img);
$img = str_replace(' ', '+', $img);
}

$data = base64_decode($img);	
	
		$clients = mysqli_query($conn,"SELECT * FROM `proga` WHERE `id` = '$id' ORDER BY `proga`.`id` ASC"); 
if($row = mysqli_fetch_array($clients)){
unlink($row['image']);
}
$image = 'img_proga/'.$id.'.'.$format;	
$update_client = mysqli_query( $conn,"UPDATE `zhilfond`.`proga` SET `image` = '$image', `topick` = '$topick', `text` = '$text', `topick_kz` = '$topick_kz', `text_kz` = '$text_kz' WHERE `proga`.`id` = ".$id);
file_put_contents($image, $data);
}
else{
$update_client = mysqli_query( $conn,"UPDATE `zhilfond`.`proga` SET `topick` = '$topick', `text` = '$text', `topick_kz` = '$topick_kz', `text_kz` = '$text_kz' WHERE `proga`.`id` = ".$id);
 
}
$dan['message']="ok";  
array_push($response, $dan);
}
else
{
if ($img!=""){
		$format = "data:image/png;base64";

if (stristr($img, $format)) {
		$format = "png";
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
}
else
{
	$format = "jpg";
	$img = str_replace('data:image/jpeg;base64,', '', $img);
$img = str_replace(' ', '+', $img);
}
$data = base64_decode($img);
/*if (!file_exists($put)) {
    mkdir($put, 0777, true);
}*/
$sqls="INSERT INTO `proga` (`id`, `image`, `topick`, `text`, `topick_kz`, `text_kz`) VALUES (NULL, 'null', '$topick', '$text', '$topick_kz', '$text_kz');";	
if (mysqli_query($conn, $sqls)){	
$id=$conn->insert_id;
$image = 'img_proga/'.$id.'.'.$format;
$update_client = mysqli_query( $conn,"UPDATE `zhilfond`.`proga` SET `image` = '$image' WHERE `proga`.`id` = ".$id);	
file_put_contents($image, $data);
$dan['message']="ok";

array_push($response, $dan);	
}
else{
	$dan['message']="no";
array_push($response, $dan);
}
}
else{
$sqls="INSERT INTO `proga` (`id`, `image`, `topick`, `text`, `topick_kz`, `text_kz`) VALUES (NULL, 'null', '$topick', '$text', '$topick_kz', '$text_kz');";	
mysqli_query($conn, $sqls);	
$dan['message']="ok";
array_push($response, $dan);
}
} 
echo json_encode($response,JSON_UNESCAPED_UNICODE);
?>