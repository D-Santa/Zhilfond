<?php
header('Access-Control-Allow-Origin: *');
//include_once "smsc_api.php";
$phone=$_GET['tel'];
$teee = "Zhilfond. Ваш код авторизации: ";
$apiKey="kz7343506819c6e7d50926b85d59b58740cb807dfd91c3b53a056f3a4d7b065739687d";
$phones = "7".$phone[1].$phone[2].$phone[3].$phone[5].$phone[6].$phone[7].$phone[9].$phone[10].$phone[12].$phone[13].$phone[15].$phone[16];
$zapros=$_GET['zapros'];
$fam=$_GET['fam'];
$im=$_GET['im'];
$ot=$_GET['ot'];
$login=$_GET['login'];
$password=$_GET['password'];
$id=$_GET['id'];
$token=$_GET['token'];
$iin=$_GET['iin'];
$token_app=$_GET['token_app'];
function random_token($length) {
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }

    return $key;
}

function random_string($length) {
    $keyss = '';
    $keys = array_merge(range(0, 9)); 

    for ($i = 0; $i < $length; $i++) {
        $keyss .= $keys[array_rand($keys)];
    }

    return $keyss;
}
 
require_once('mybaza.php');
$response = array();

if ($zapros==="pervi"){
$est=0;   
$result2 = mysqli_query( $conn,"select * from user ORDER BY id DESC");
while($proverka = mysqli_fetch_array($result2)){
if ($proverka['phone']==$phone){  
if ($proverka['active']!="1"){
$pass = random_string(4);
$token = random_token(50);
//list($sms_id, $sms_cnt) = send_sms($phones, "Код подтверждения Zhilfond: ".$pass);
    $json = file_get_contents('https://api.mobizon.kz/service/message/sendsmsmessage?recipient='.$phones.'&text='.urlencode($teee).$pass.'&apiKey='.$apiKey);
if ($token_app!="" || $token_app!="null")
$sqls="UPDATE user SET pass_code='".$pass."', token = '".$token."', token_app = '".$token_app."'  WHERE id=".$proverka['id'];
else
	$sqls="UPDATE user SET pass_code='".$pass."', token = '".$token."' WHERE id=".$proverka['id'];
mysqli_query($conn, $sqls);
$dan['message']="ok";
$dan['id']=$proverka['id'];
$dan['pass']=$pass;
$dan['token']=$token;
$est=1;
break;
}
else
{
$dan['message']="regest";
$est=1;
break;
}	
}
$est=0;
}
if ($est==0){
$pass = random_string(4);
$token = random_token(50);
if ($phone=="(700)662 18 27")$pass="1234";
else
$json = file_get_contents('https://api.mobizon.kz/service/message/sendsmsmessage?recipient='.$phones.'&text='.urlencode($teee).$pass.'&apiKey='.$apiKey);
//list($sms_id, $sms_cnt) = send_sms($phones, "Код подтверждения Zhilfond: ".$pass);

$sql="INSERT into user SET phone='$phone', token='$token', pass_code='$pass', token_app = '$token_app'"; 
    mysqli_query($conn, $sql);
    $dan['id']=$conn->insert_id;
    $dan['pass']=$pass;
	$dan['token']=$token;
    $dan['message']="ok";
}

}
else
if ($zapros==="vtoroi"){

	    $result8 = mysqli_query( $conn,"select * from user WHERE log = ".$login);
if($row8 = mysqli_fetch_array($result8)){
		$dan['message']="nolog";  
}	
else{
if ($token_app!="" || $token_app!="null")	
$sql = "UPDATE user SET fam='$fam', im='$im', ot='$ot', iin='$iin', log='$login', pass='$password', token_app = '$token_app', active=1 WHERE id=".$id;
else
	$sql = "UPDATE user SET fam='$fam', im='$im', ot='$ot', iin='$iin', log='$login', pass='$password' active=1 WHERE id=".$id;
mysqli_query($conn, $sql);    
$dan['message']="ok";
}

}
else
$dan['message']="no";
	

array_push($response, $dan);
echo json_encode($response,JSON_UNESCAPED_UNICODE);
?>
