<?php
header('Access-Control-Allow-Origin: *'); 
require_once('mybaza.php');
$response = array();
$nomer=$_GET['nomer'];
$iin=$_GET['iin'];
$id=$_GET['id'];
$response = array();
if ($iin==""){
$client = mysqli_query($conn,"SELECT * FROM `dolg` WHERE `nom` = '$nomer'"); 
if($row_client = mysqli_fetch_array($client)){		
$dan['message']="ok";	
$dan['nan']=$row_client['id_dog'];	
$dan['stat']=$row_client['stat'];
$dan['data']=$row_client['data'];
$dan['d_start']=$row_client['d_start'];
$dan['d_end']=$row_client['d_end'];
$dan['summa']=$row_client['summa']; 
$dan['kfc']=$row_client['kfs']; 
$dan['naim']=$row_client['naim']; 
$dan['id_dog']=$row_client['id_dog'];
} else $dan['message']="no";	
}
else
{
$client = mysqli_query($conn,"SELECT * FROM `dolg`");
$dan['message']=$iin;
while($row_client = mysqli_fetch_array($client)){	
if(stristr($row_client['id_dog'], $iin))
{
$dan['message']="ok";	
$dan['nan']=$row_client['id_dog'];	
$dan['stat']=$row_client['stat'];
$dan['data']=$row_client['data'];
$dan['d_start']=$row_client['d_start'];
$dan['d_end']=$row_client['d_end'];
$dan['summa']=$row_client['summa']; 
$dan['kfc']=$row_client['kfs']; 
$dan['naim']=$row_client['naim']; 
$dan['id_dog']=$row_client['id_dog'];
	break;
}
}

	 
}

if ($dan['message']=="ok" && $id!="null" || $dan['message']=="ok" && $id!=""){
$nan = $dan['nan'];
$stat = $dan['stat'];
$data = $dan['data'];
$d_start = $dan['d_start'];
$d_end = $dan['d_end'];
$summa=$dan['summa'];
$kfc=$dan['kfc'];
$naim=$dan['naim'];
$id_dog=$dan['id_dog'];
$sql="INSERT INTO `history_dolg` (`id`, `id_user`, `data`, `naim`, `nan`, `kfc`, `stat`, `data_dolg`, `data_start`, `data_end`, `summa`, `id_dog`) VALUES (NULL, '$id', current_timestamp(), '$naim', '$nan', '$kfc', '$stat', '$data', '$d_start', '$d_end', '$summa', '$id_dog');";
mysqli_query($conn, $sql);	
}
array_push($response, $dan);	 
echo json_encode($response,JSON_UNESCAPED_UNICODE);
?>