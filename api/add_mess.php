<?php
header('Access-Control-Allow-Origin: *');
require_once('mybaza.php');
$id=$_GET['id'];
$text = $_GET['text'];
$type = $_GET['type'];
$name = $_GET['name'];
    if ($id == ""){
        $id=$_POST['id'];
        $text = $_POST['text'];
        $type = $_POST['type'];
        $name = $_POST['name'];
    }
if ($type=="sent")
$avatar = 'http://zhilfondapp.kz/api/user.jpg';
else
$avatar = 'http://zhilfondapp.kz/api/admin.jpg';	
$response = array();
$sqls="INSERT INTO `message` (`id`, `e_id`, `comment`, `type`, `active`, `data`, `avatar`) VALUES (NULL, '$id', '$text', '$type', '0',  current_timestamp(), '$avatar');";	
mysqli_query($conn, $sqls);
    
    $chat = mysqli_query($conn,"SELECT * FROM `e_ob` WHERE `id` = '$id'");
    if($row_chat = mysqli_fetch_array($chat)){
        $id_client = $row_chat['id_client'];
        $client = mysqli_query($conn,"SELECT * FROM `user` WHERE `id` = '$id_client'");
        if($row_client= mysqli_fetch_array($client)){
            $title = 'Уважаемый(ая) пользвователь Zhilfond!';
            $message = 'К вам пришло новое сообщение';
            $path_to_FCM = 'https://fcm.googleapis.com/fcm/send';
            $server_key = 'AAAAGbt-630:APA91bGMxxAVMG6USIWbFpaj_tGB3bcCU7q6nWzQ_8nB63TUOuCpuK9JbqJaPnWD0gJfUPNX6mDZvdjZKWW36b5xrPvRRyk-MDJcyGMuqSm8RyMc78PCt7EHiUJiy9H7xCwwMuSMI3rw';
            $headers = array('Authorization:key='.$server_key,'Content-Type:application/json');
            $key=$row_client['token_app'];
            $field = array('to'=>$key,'notification'=>array('title'=>$title,'body'=>$message,'sound'=>'default'));
            $payload = json_encode($field);
            $curl_session = curl_init();
            curl_setopt($curl_session, CURLOPT_URL, $path_to_FCM);
            curl_setopt($curl_session, CURLOPT_POST, true);
            curl_setopt($curl_session, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl_session, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl_session, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl_session, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
            curl_setopt($curl_session, CURLOPT_POSTFIELDS, $payload);
            $result = curl_exec($curl_session);
            curl_close($curl_session);
            
        }
    }
    
    
$dan['message']="ok";	
$dan['avatar']=$avatar;	
$dan['footer']="Не прочитано";	
$dan['data']=$conn->data;
array_push($response, $dan);	
echo json_encode($response,JSON_UNESCAPED_UNICODE);
?>
