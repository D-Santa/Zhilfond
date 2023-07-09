<?php
header('Access-Control-Allow-Origin: *'); 
require_once('mybaza.php');
$response = array();
$iin=$_GET['iin'];
$fam=$_GET['fam'];
$im=$_GET['im'];
$ot=$_GET['ot'];
$id=$_GET['id'];
$response = array();
if ($iin!=""){
$client = mysqli_query($conn,"SELECT * FROM `ochered_1` WHERE `iin` = '$iin'"); 
if($row_client = mysqli_fetch_array($client)){		
$dan['message']="ok";	
$dan['nomer']=$row_client['nomer'];	
$dan['data']=$row_client['data'];
$dan['fam']=$row_client['fam'];
$dan['im']=$row_client['im'];
$dan['ot']=$row_client['ot'];
$dan['cat']=$row_client['cat'];
$dan['iin']=$row_client['iin'];
$dan['god']="2020";
} else
{
$client = mysqli_query($conn,"SELECT * FROM `ochered_2` WHERE `iin` = '$iin'"); 
if($row_client = mysqli_fetch_array($client)){		
$dan['message']="ok";	
$dan['nomer']=$row_client['nomer'];	
$dan['data']=$row_client['data'];
$dan['fam']=$row_client['fam'];
$dan['im']=$row_client['im'];
$dan['ot']=$row_client['ot'];
$dan['cat']=$row_client['cat'];
$dan['iin']=$row_client['iin'];
$dan['god']="2020";
}
 else
{
$client = mysqli_query($conn,"SELECT * FROM `ochered_3` WHERE `iin` = '$iin'"); 
if($row_client = mysqli_fetch_array($client)){		
$dan['message']="ok";	
$dan['nomer']=$row_client['nomer'];	
$dan['data']=$row_client['data'];
$dan['fam']=$row_client['fam'];
$dan['im']=$row_client['im'];
$dan['ot']=$row_client['ot'];
$dan['cat']=$row_client['cat'];
$dan['iin']=$row_client['iin'];
$dan['god']="2020";
}
 else
{
$client = mysqli_query($conn,"SELECT * FROM `ochered_4` WHERE `iin` = '$iin'"); 
if($row_client = mysqli_fetch_array($client)){		
$dan['message']="ok";	
$dan['nomer']=$row_client['nomer'];	
$dan['data']=$row_client['data'];
$dan['fam']=$row_client['fam'];
$dan['im']=$row_client['im'];
$dan['ot']=$row_client['ot'];
$dan['cat']=$row_client['cat'];
$dan['iin']=$row_client['iin'];
$dan['god']="2020";
}
 else
{
$client = mysqli_query($conn,"SELECT * FROM `ochered_5` WHERE `iin` = '$iin'"); 
if($row_client = mysqli_fetch_array($client)){		
$dan['message']="ok";	
$dan['nomer']=$row_client['nomer'];	
$dan['data']=$row_client['data'];
$dan['fam']=$row_client['fam'];
$dan['im']=$row_client['im'];
$dan['ot']=$row_client['ot'];
$dan['cat']=$row_client['cat'];
$dan['iin']=$row_client['iin'];
$dan['god']="2020";
}
 else
{
$client = mysqli_query($conn,"SELECT * FROM `ochered_6` WHERE `iin` = '$iin'"); 
if($row_client = mysqli_fetch_array($client)){		
$dan['message']="ok";	
$dan['nomer']=$row_client['nomer'];	
$dan['data']=$row_client['data'];
$dan['fam']=$row_client['fam'];
$dan['im']=$row_client['im'];
$dan['ot']=$row_client['ot'];
$dan['cat']=$row_client['cat'];
$dan['iin']=$row_client['iin'];
$dan['god']="2020";
}
else $dan['message']="no";
}
}
}
}
}
}
else
{
$client = mysqli_query($conn,"SELECT * FROM `ochered_1` WHERE `fam` = '$fam' and `im` = '$im' and `ot` = '$ot'"); 
if($row_client = mysqli_fetch_array($client)){		
$dan['message']="ok";	
$dan['nomer']=$row_client['nomer'];	
$dan['data']=$row_client['data'];
$dan['fam']=$row_client['fam'];
$dan['im']=$row_client['im'];
$dan['ot']=$row_client['ot'];
$dan['cat']=$row_client['cat'];
$dan['iin']=$row_client['iin'];
$dan['god']="2020";
}

else
{
$client = mysqli_query($conn,"SELECT * FROM `ochered_2` WHERE `fam` = '$fam' and `im` = '$im' and `ot` = '$ot'"); 
if($row_client = mysqli_fetch_array($client)){		
$dan['message']="ok";	
$dan['nomer']=$row_client['nomer'];	
$dan['data']=$row_client['data'];
$dan['fam']=$row_client['fam'];
$dan['im']=$row_client['im'];
$dan['ot']=$row_client['ot'];
$dan['cat']=$row_client['cat'];
$dan['iin']=$row_client['iin'];
$dan['god']="2020";
}	
else
{
$client = mysqli_query($conn,"SELECT * FROM `ochered_2` WHERE `fam` = '$fam' and `im` = '$im' and `ot` = '$ot'"); 
if($row_client = mysqli_fetch_array($client)){		
$dan['message']="ok";	
$dan['nomer']=$row_client['nomer'];	
$dan['data']=$row_client['data'];
$dan['fam']=$row_client['fam'];
$dan['im']=$row_client['im'];
$dan['ot']=$row_client['ot'];
$dan['cat']=$row_client['cat'];
$dan['iin']=$row_client['iin'];
$dan['god']="2020";
}
else
{
$client = mysqli_query($conn,"SELECT * FROM `ochered_3` WHERE `fam` = '$fam' and `im` = '$im' and `ot` = '$ot'"); 
if($row_client = mysqli_fetch_array($client)){		
$dan['message']="ok";	
$dan['nomer']=$row_client['nomer'];	
$dan['data']=$row_client['data'];
$dan['fam']=$row_client['fam'];
$dan['im']=$row_client['im'];
$dan['ot']=$row_client['ot'];
$dan['cat']=$row_client['cat'];
$dan['iin']=$row_client['iin'];
$dan['god']="2020";
}
else
{
$client = mysqli_query($conn,"SELECT * FROM `ochered_4` WHERE `fam` = '$fam' and `im` = '$im' and `ot` = '$ot'"); 
if($row_client = mysqli_fetch_array($client)){		
$dan['message']="ok";	
$dan['nomer']=$row_client['nomer'];	
$dan['data']=$row_client['data'];
$dan['fam']=$row_client['fam'];
$dan['im']=$row_client['im'];
$dan['ot']=$row_client['ot'];
$dan['cat']=$row_client['cat'];
$dan['iin']=$row_client['iin'];
$dan['god']="2020";
}
else
{
$client = mysqli_query($conn,"SELECT * FROM `ochered_5` WHERE `fam` = '$fam' and `im` = '$im' and `ot` = '$ot'"); 
if($row_client = mysqli_fetch_array($client)){		
$dan['message']="ok";	
$dan['nomer']=$row_client['nomer'];	
$dan['data']=$row_client['data'];
$dan['fam']=$row_client['fam'];
$dan['im']=$row_client['im'];
$dan['ot']=$row_client['ot'];
$dan['cat']=$row_client['cat'];
$dan['iin']=$row_client['iin'];
$dan['god']="2020";
}
else
{
$client = mysqli_query($conn,"SELECT * FROM `ochered_6` WHERE `fam` = '$fam' and `im` = '$im' and `ot` = '$ot'"); 
if($row_client = mysqli_fetch_array($client)){		
$dan['message']="ok";	
$dan['nomer']=$row_client['nomer'];	
$dan['data']=$row_client['data'];
$dan['fam']=$row_client['fam'];
$dan['im']=$row_client['im'];
$dan['ot']=$row_client['ot'];
$dan['cat']=$row_client['cat'];
$dan['iin']=$row_client['iin'];
$dan['god']="2020";
}
else
$dan['message']="no";		
}
}	
}
}
}
}
}
if ($dan['message']=="ok" && $id!="null" || $dan['message']=="ok" && $id!=""){
$nomer = $dan['nomer'];
$data_ochered = $dan['data'];
$cat = $dan['cat'];
$fam = $dan['fam'];
$im = $dan['im']; 
$ot = $dan['ot'];
$iins = $dan['iin'];
$sql="INSERT INTO `history_ochered` (`id`, `id_user`, `data`, `nomer`, `data_ochered`, `cat`, `fam`, `im`, `ot`, `iin`) VALUES (NULL, '$id', current_timestamp(), '$nomer', '$data_ochered', '$cat', '$fam', '$im', '$ot', '$iins');";
mysqli_query($conn, $sql);	
}
array_push($response, $dan);	
echo json_encode($response,JSON_UNESCAPED_UNICODE);
?>