<?php
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: Cache-Control, Pragma, Origin, Authorization, Content-Type, X-Requested-With');
    header('Access-Control-Allow-Methods: GET, PUT, POST');
function random_string($length) {
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));
    
    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }
    
    return $key;
}
require_once('mybaza.php');
$log=$_POST['log'];
$pass=$_POST['pass'];
$token=$_POST['token'];
$response = array();
    if ($token!=null){
        $result = mysqli_query( $conn,"select * from admin WHERE token='$token'");
        if($row = mysqli_fetch_array($result)){
            $dan['message']="ok";
            $dan['id']=$row['id'];
        }else
            $dan['message']="no";
    }else{
        $result = mysqli_query( $conn,"select * from admin WHERE log='$log' and pass='$pass'");
        if($row = mysqli_fetch_array($result)){
            $dan['message']='ok';
            $token=random_string(50);
            $dan['id']=$row['id'];
            $dan['token']=$token;
            $sql="UPDATE admin SET token='".$token."' WHERE id=".$row['id'];
            mysqli_query($conn, $sql);
        }
        else $dan['message']='no';
    }
    
array_push($response, $dan);
echo json_encode($response,JSON_UNESCAPED_UNICODE);

?>
