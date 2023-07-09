<?php
    header('Access-Control-Allow-Origin: *');
    require_once('mybaza.php');
    $response = array();
    $zapros = $_GET['zapros'];
    $fio = $_GET['fio'];
    $iin= $_GET['iin'];
    $rabota = $_GET['rabota'];
    $adres = $_GET['adres'];
    $data = $_GET['data'];
    $komu = $_GET['komu'];
      $phone = $_GET['phone'];
    $comment = $_GET['comment'];
    $id=$_GET['id'];
    if ($zapros=="add"){
      $result2 = mysqli_query( $conn,"select * from data_zapis WHERE ot<='$data' and do>='$data' and users='$komu'");
      if($row2 = mysqli_fetch_array($result2))$dan['message']="no";
      else
     {
        $schet=0;
        $result2 = mysqli_query( $conn,"select * from zapisi WHERE data='$data' and  komu='$komu' ORDER BY id DESC");
        while($row2 = mysqli_fetch_array($result2)){
            $schet++;
        }
        if ($schet!=5){
        $sql="INSERT INTO `zapisi` (`id`, `id_user`, `data`, `komu`, `fio`, `iin`, `adres`, `rabota`, `phone`, `comment`, `dat`) VALUES (NULL, '$id', '$data', '$komu', '$fio', '$iin', '$adres', '$rabota', '$phone', '$comment' , current_timestamp());";
        mysqli_query($conn, $sql);
            $dan['message']="ok";
            
        }
        else
           $dan['message']="no";
          }
  array_push($response, $dan);
     
    }
    else
    if ($zapros=="list"){
				$dan['message']="no";
		if ($_GET['all'] == "yes"){
		$result2 = mysqli_query( $conn,"select * from zapisi WHERE data>='$data' ORDER BY data DESC");
        while($row2 = mysqli_fetch_array($result2)){
                $dan['message']="ok";
             $dan['fio']=$row2['fio'];
             $dan['iin']=$row2['iin'];
             $dan['adres']=$row2['adres'];
             $dan['rabota']=$row2['rabota'];
             $dan['phone']=$row2['phone'];
             $dan['data']=$row2['data'];
            $dan['comment']=$row2['comment'];
            $dan['komu']=$row2['komu'];
              array_push($response, $dan);	
		}
		}
		else
		{
        $result2 = mysqli_query( $conn,"select * from zapisi WHERE data='$data' ORDER BY id DESC");
        while($row2 = mysqli_fetch_array($result2)){
                $dan['message']="ok";
             $dan['fio']=$row2['fio'];
             $dan['iin']=$row2['iin'];
             $dan['adres']=$row2['adres'];
             $dan['rabota']=$row2['rabota'];
             $dan['phone']=$row2['phone'];
             $dan['data']=$row2['data'];
            $dan['comment']=$row2['comment'];
            $dan['komu']=$row2['komu'];
              array_push($response, $dan);
        }
		}
		if ($dan['message']=="no")array_push($response, $dan);
    }
    else
    if ($zapros=="list_ot"){
      $result2 = mysqli_query( $conn,"select * from data_zapis ORDER BY id DESC");
      while($row2 = mysqli_fetch_array($result2)){
            $dan['message']="ok";
            $dan['id']=$row2['id'];
           $dan['ot']=$row2['ot'];
           $dan['do']=$row2['do'];
           $dan['usr']=$row2['users'];
           $dan['active']=$row2['active'];
          array_push($response, $dan);	
  }
    }
    else
    if ($zapros=="list_add_ot"){
      $ot=$_GET['ot'];
      $do = $_GET['do'];
      $usr=$_GET['usr'];
      $sql="INSERT INTO `data_zapis` (`id`, `ot`, `do`, `users`, `active`) VALUES (NULL, '$ot', '$do', '$usr', '1');";
        if(mysqli_query($conn, $sql)){
          $result2 = mysqli_query( $conn,"select * from data_zapis ORDER BY id DESC");
      while($row2 = mysqli_fetch_array($result2)){
            $dan['message']="ok";
            $dan['id']=$row2['id'];
           $dan['ot']=$row2['ot'];
           $dan['do']=$row2['do'];
           $dan['usr']=$row2['users'];
           $dan['active']=$row2['active'];
          array_push($response, $dan);	
  }
        }
        else
        {
          $dan['message']="no";
        array_push($response, $dan);
        }
        
    }
    else
    if ($zapros=="dell_ot"){
      $sql="DELETE FROM `data_zapis` WHERE `data_zapis`.`id` = '$id'";
      if(mysqli_query($conn, $sql)){
        $dan['message']="ok";
        $result2 = mysqli_query( $conn,"select * from data_zapis ORDER BY id DESC");
    while($row2 = mysqli_fetch_array($result2)){
          $dan['message']="oks";
          $dan['id']=$row2['id'];
         $dan['ot']=$row2['ot'];
         $dan['do']=$row2['do'];
         $dan['usr']=$row2['users'];
         $dan['active']=$row2['active'];
        array_push($response, $dan);	
}
if (count($response)<=0)  array_push($response, $dan);
      }
      else
      {
        $dan['message']="no";
      array_push($response, $dan);
      }

        
    }
    else
    if ($zapros=="proverka"){
      $result2 = mysqli_query( $conn,"select * from data_zapis WHERE ot<='$data' and do>='$data' and users='$komu'");
      if($row2 = mysqli_fetch_array($result2))$dan['message']="no";
      else
      $dan['message']="ok";
      array_push($response, $dan);
    }
    echo json_encode($response,JSON_UNESCAPED_UNICODE);
    ?>
