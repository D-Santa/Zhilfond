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
$id=$_POST['id'];
$token=$_POST['token'];
$token_app = $_POST['token_app']; 
$response = array();
$vhod=$_POST['vhod'];
if ($vhod=="app"){
$result = mysqli_query( $conn,"select * from user WHERE token='$token' and id='$id'");
if($row = mysqli_fetch_array($result)){
$dan['message']="ok";
  $dan['id']=$row['id'];
   $dan['fam']=$row['fam'];
 $dan['im']=$row['im'];
  $dan['ot']=$row['ot'];
    $dan['phone']=$row['phone'];
	if ($token_app!="")
		if ($token_app!="null"){
	 $sql="UPDATE user SET token_app='".$token_app."' WHERE id=".$row['id'];
 mysqli_query($conn, $sql);
 $tokens = mysqli_query( $conn,"select * from tokeny WHERE text ='".$token_app."'");
if($row_t = mysqli_fetch_array($tokens));
else
{
 $sqls="INSERT into tokeny SET text='".$token_app."'"; 
   mysqli_query($conn, $sqls);
}	
	}
}else 
$dan['message']="no";
}
else{
$result = mysqli_query( $conn,"select * from user WHERE log='$log' and pass='$pass'");    
if($row = mysqli_fetch_array($result)){   
 $dan['message']='ok'; 
 $token=random_string(50);
  $dan['id']=$row['id'];
 $dan['token']=$token;
    $dan['fam']=$row['fam'];
 $dan['im']=$row['im'];
  $dan['ot']=$row['ot'];
    $dan['phone']=$row['phone'];
	if ($token_app!="" || $token_app!="null"){
 $sql="UPDATE user SET token='".$token."', token_app='".$token_app."' WHERE id=".$row['id'];
 $tokens = mysqli_query( $conn,"select * from tokeny WHERE text ='".$token_app."'");
if($row_t = mysqli_fetch_array($tokens));
else
{
 $sqls="INSERT into tokeny SET text='".$token_app."'"; 
   mysqli_query($conn, $sqls);
}	
	}
	else
	 $sql="UPDATE user SET token='".$token."' WHERE id=".$row['id'];
  mysqli_query($conn, $sql);
}
else $dan['message']='no'; 
}
 array_push($response, $dan);
    echo json_encode($response,JSON_UNESCAPED_UNICODE);

?>