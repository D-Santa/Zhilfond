<?php
header('Access-Control-Allow-Origin: *');
require_once('mybaza.php');
$text1=$_POST['text1'];
$text2=$_POST['text2'];
$text3=$_POST['text3'];
$text4=$_POST['text4'];
$text5=$_POST['text5'];
$text6=$_POST['text6'];
$text7=$_POST['text7'];
$text8=$_POST['text8'];
$text9=$_POST['text9'];
$text10=$_POST['text10'];
$text11=$_POST['text11'];
$text12=$_POST['text12'];
$text13=$_POST['text13'];
$text14=$_POST['text14'];
$text15=$_POST['text15'];
$text16=$_POST['text16'];
$text17=$_POST['text17'];

$text1_kz=$_POST['text1_kz'];
$text2_kz=$_POST['text2_kz'];
$text3_kz=$_POST['text3_kz'];
$text4_kz=$_POST['text4_kz'];
$text5_kz=$_POST['text5_kz'];
$text6_kz=$_POST['text6_kz'];
$text7_kz=$_POST['text7_kz'];
$text8_kz=$_POST['text8_kz'];
$text9_kz=$_POST['text9_kz'];
$text10_kz=$_POST['text10_kz'];
$text11_kz=$_POST['text11_kz'];
$text12_kz=$_POST['text12_kz'];
$text13_kz=$_POST['text13_kz'];
$text14_kz=$_POST['text14_kz'];
$text15_kz=$_POST['text15_kz'];
$text16_kz=$_POST['text16_kz'];
$text17_kz=$_POST['text17_kz'];
$response = array();
$zapros=$_POST['zapros'];

if ($zapros=="save"){
$update_client = mysqli_query( $conn,"UPDATE `zhilfond`.`kontakt` SET `text1` = '$text1', `text2` = '$text2', `text3` = '$text3', `text4` = '$text4', `text5` = '$text5', `text6` = '$text6', `text7` = '$text7', `text8` = '$text8', `text9` = '$text9', `text10` = '$text10', `text11` = '$text11', `text12` = '$text12', `text13` = '$text13', `text14` = '$text14', `text15` = '$text15', `text16` = '$text16', `text17` = '$text17', `text1_kz` = '$text1_kz', `text2_kz` = '$text2_kz', `text3_kz` = '$text3_kz', `text4_kz` = '$text4_kz', `text5_kz` = '$text5_kz', `text6_kz` = '$text6_kz', `text7_kz` = '$text7_kz', `text8_kz` = '$text8_kz', `text9_kz` = '$text9_kz', `text10_kz` = '$text10_kz', `text11_kz` = '$text11_kz', `text12_kz` = '$text12_kz', `text13_kz` = '$text13_kz', `text14_kz` = '$text14_kz', `text15_kz` = '$text15_kz', `text16_kz` = '$text16_kz', `text17_kz` = '$text17_kz'   WHERE `kontakt`.`id` = 1");
$dan['message']="ok";  
array_push($response, $dan);
}
else
	if ($zapros=="list"){
$clients = mysqli_query($conn,"SELECT * FROM `kontakt`"); 
while($row2 = mysqli_fetch_array($clients)){
$dan['message']="ok";
$dan['text1']=$row2['text1'];
$dan['text2']=$row2['text2'];
$dan['text3']=$row2['text3'];
$dan['text4']=$row2['text4'];
$dan['text5']=$row2['text5'];
$dan['text6']=$row2['text6'];
$dan['text7']=$row2['text7'];
$dan['text8']=$row2['text8'];
$dan['text9']=$row2['text9'];
$dan['text10']=$row2['text10'];
$dan['text11']=$row2['text11'];
$dan['text12']=$row2['text12'];
$dan['text13']=$row2['text13'];
$dan['text14']=$row2['text14'];
$dan['text15']=$row2['text15'];
$dan['text16']=$row2['text16'];
$dan['text17']=$row2['text17'];

$dan['text1_kz']=$row2['text1_kz'];
$dan['text2_kz']=$row2['text2_kz'];
$dan['text3_kz']=$row2['text3_kz'];
$dan['text4_kz']=$row2['text4_kz'];
$dan['text5_kz']=$row2['text5_kz'];
$dan['text6_kz']=$row2['text6_kz'];
$dan['text7_kz']=$row2['text7_kz'];
$dan['text8_kz']=$row2['text8_kz'];
$dan['text9_kz']=$row2['text9_kz'];
$dan['text10_kz']=$row2['text10_kz'];
$dan['text11_kz']=$row2['text11_kz'];
$dan['text12_kz']=$row2['text12_kz'];
$dan['text13_kz']=$row2['text13_kz'];
$dan['text14_kz']=$row2['text14_kz'];
$dan['text15_kz']=$row2['text15_kz'];
$dan['text16_kz']=$row2['text16_kz'];
$dan['text17_kz']=$row2['text17_kz'];
array_push($response, $dan);
}
}		

echo json_encode($response,JSON_UNESCAPED_UNICODE);
?>