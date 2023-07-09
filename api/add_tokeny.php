<?php
header('Access-Control-Allow-Origin: *');
require_once('mybaza.php');
$text=$_GET['token'];
$tokens = mysqli_query( $conn,"select * from tokeny WHERE text ='".$text."'");
if($row_t = mysqli_fetch_array($tokens));
else
{
 $sqls="INSERT into tokeny SET text='".$text."'"; 
   mysqli_query($conn, $sqls); 
   }	

?>