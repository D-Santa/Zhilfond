<?php
header('Access-Control-Allow-Origin: *'); 
//include_once "smsc_api.php";
$apiKey="kz7343506819c6e7d50926b85d59b58740cb807dfd91c3b53a056f3a4d7b065739687d";
$phone=$_GET['tel'];
$phones = "7".$phone[1].$phone[2].$phone[3].$phone[5].$phone[6].$phone[7].$phone[9].$phone[10].$phone[12].$phone[13].$phone[15].$phone[16];
$tex = "Доступ к личному кабинету Zhilfond.";
    $pass = "Пароль: ";
$login= "Логин: ";
$response = array();
require_once('mybaza.php');
$ss=0;
$result7 = mysqli_query( $conn,"select * from user ORDER BY id DESC");
while($row7 = mysqli_fetch_array($result7)){
if ($phone  == $row7['phone']){
	if ( $row7['log']==""){
		$dan['message']="noreg";
	break;
	}
	else{
$json = file_get_contents('https://api.mobizon.kz/service/message/sendsmsmessage?recipient='.$phones.'&text='.urlencode($tex).'%0A'.urlencode($login).$row7['log'].'%0A'.urlencode($pass).$row7['pass'].'&apiKey='.$apiKey);
//list($sms_id, $sms_cnt) = send_sms($phones, "Доступ к личному кабинету Zhilfond \n Логин: ".$row7['log']."\n Пароль: ".$row7['pass']);
$dan['message']="ok";
$ss=1;
break;
}
}
else
	$dan['message']="noreg";
}
array_push($response, $dan);
echo json_encode($response,JSON_UNESCAPED_UNICODE);
?> 
