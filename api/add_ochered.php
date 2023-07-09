<?php
header('Access-Control-Allow-Origin: *'); 
//header_remove ( "X-Frame-Options: DENY ");
ini_set('max_execution_time', 0);
//ini_set('memory_limit', '512M');
require_once('mybaza.php');
require_once ('Classes/PHPExcel.php');
require_once('Classes/PHPExcel/Writer/Excel5.php');
$id = $_GET['id'];
if ( empty($_FILES)){
    echo "
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
    <meta charset=\"utf-8\">
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css\" />
    <link rel=\"stylesheet\" href=\"http://bootstraptema.ru/plugins/2015/bootstrap3/bootstrap.min.css\" />
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js\"></script>
    <style>
    .btn-file {
    position: relative;
    overflow: hidden;
    }
    .btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
    }
    [class*=\"sticker\"] {
position: relative;
margin: 15px 0;
padding: 33px 15px 15px;
background: #fff;
    border-radius: 6px;
    box-shadow: 1px 1px 5px 2px rgba(0, 0, 0, .64)
}
[class*=\"sticker\"]:after {
content: attr(data-sticker);
position: absolute;
top: 0;
padding: 3px 7px;
font-size: 14px;
font-weight: bold;
background: #999;
color: #fff
}
.sticker-left {
    border-top-left-radius: 6px
}
.sticker-left:after {
left: 0;
    border-radius: 6px 0 6px 0
}

.btn {
display: inline-block;
border: none;
    border-radius: .3em;
    box-shadow: inset 0 0 0 1px rgba(0, 0, 0, 0.1), inset 0 -0.25em 0 rgba(0, 0, 0, 0.25), 0 0.25em 0.25em rgba(0, 0, 0, 0.05);
cursor: pointer;
    font-weight: 300;
    line-height: 1.5;
    letter-spacing: 1px;
padding: .5em 1.5em .75em;
position: relative;
    text-decoration: none;
    text-shadow: 0 1px 1px rgba(255, 255, 255, 0.25);
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
.btn:active {
outline: none;
    box-shadow: inset 0 0 0 1px rgba(0, 0, 0, 0.2), inset 0 2px 0 rgba(255, 255, 255, 0.1), inset 0 0.25em 0.5em rgba(0, 0, 0, 0.05);
    margin-top: .25em;
    padding-bottom: .5em;
}
#thumbnail-preview-indicators {
position: relative;
overflow: hidden;
}
#thumbnail-preview-indicators .slides .slide-1,
#thumbnail-preview-indicators .slides .slide-2,
#thumbnail-preview-indicators .slides .slide-3 {
background-size: cover;
background-position: center center;
background-repeat: no-repeat;
}
#thumbnail-preview-indicators,
#thumbnail-preview-indicators .slides,
#thumbnail-preview-indicators .slides .slide-1,
#thumbnail-preview-indicators .slides .slide-2,
#thumbnail-preview-indicators .slides .slide-3 {
height: 465px;
}
#thumbnail-preview-indicators .slides .slide-1 {
background-image: url(4.jpg);
}
#thumbnail-preview-indicators .slides .slide-2 {
background-image: url(2.jpg);
}
#thumbnail-preview-indicators .slides .slide-3 {
background-image: url(3.jpg);
}
#thumbnail-preview-indicators .carousel-inner .item .carousel-caption {
top: 20%;
bottom: inherit;
}
#thumbnail-preview-indicators .carousel-indicators li,
#thumbnail-preview-indicators .carousel-indicators li.active {
position: relative;
width: 100px;
height: 8px;
}
#thumbnail-preview-indicators .carousel-indicators li > .thumbnail {
position: absolute;
top: 0;
width: 100px;
display: none;
opacity: 0;
left: 50%;
margin-top: -80px;
margin-left: -50px;
}
#thumbnail-preview-indicators .carousel-indicators li:hover > .thumbnail,
#thumbnail-preview-indicators .carousel-indicators li.active > .thumbnail {
display: block;
opacity: .8;
}
#thumbnail-preview-indicators .carousel-indicators li.active > .thumbnail:hover{
opacity: 1;
}
@media screen and (max-width : 480px) {
    #thumbnail-preview-indicators .carousel-indicators li,
    #thumbnail-preview-indicators .carousel-indicators li.active {
width: 50px;
height: 8px;
position: relative;
}
#thumbnail-preview-indicators .carousel-indicators li > .thumbnail {
width: 50px;
left: 50%;
margin-top: -50px;
margin-left: -25px;
}
</style>
<div class=\"container\">
<div class=\"row\">
<div class=\"sticker-left\" data-sticker=\"Загрузите Excell файл\">
<form method='post' enctype='multipart/form-data' action='add_ochered.php?id=".$id."'>
<div class=\"col-xs-12 col-md-12\">
<button class=\"btn btn-success btn-file\"  style=\"width:100%;\">Выбрать файл
<input type='file'  name='excel'>
</button>
</div>
<br>
<br>
<br>
<div style=\"width=100%;\" align=\"right\">
<button class=\"btn btn-danger\" style=\"width:30%;\" type='submit'>Загрузка</button>
</div>
</form>
</div>
";
}else{
    $excel = PHPExcel_IOFactory::load($_FILES['excel']['tmp_name']);
    $excel->setActiveSheetIndex(0); 
    $sheets = $excel->getActiveSheet();
    
    $response1 = array();
    $colNumber = PHPExcel_Cell::columnIndexFromString($sheets->getHighestColumn());
  //  $colStrings = PHPExcel_Cell::stringFromColumnIndex($colNumber);
    //$colStrings2 = PHPExcel_Cell::stringFromColumnIndex($colNumber);
    //$colString = PHPExcel_Cell::stringFromColumnIndex($colNumber);
    for ($i = 2; $i <= $sheets->getHighestRow(); $i++) {
        for ($j=0; $j<7; $j++){
            $colString = PHPExcel_Cell::stringFromColumnIndex($j);
            $response1[$i-2][$j] = $excel->getActiveSheet()->getCell($colString .$i)->getValue();   
        }
    }
	if ($id=="1"){
	$sql = "TRUNCATE TABLE ochered_1";
	mysqli_query($conn,$sql); 
		mysqli_query($conn,'SET autocommit=0;');
mysqli_query($conn,'START TRANSACTION;');
	
	for ($s = 0; $s<count($response1); $s++){
	$sqls="INSERT INTO `ochered_1` (`id`, `nomer`, `iin`, `fam`, `im`, `ot`, `data`, `cat`) VALUES (NULL, '".$response1[$s][0]."', '".$response1[$s][2]."', '".$response1[$s][3]."', '".$response1[$s][4]."', '".$response1[$s][5]."', '".$response1[$s][1]."', '".$response1[$s][6]."'); ";	
	mysqli_query($conn, $sqls);	
    }
	
	mysqli_query($conn,'COMMIT;');
mysqli_query($conn,'SET autocommit=1;');	
	echo "Успешно добавлено ".count($response1)." записей";
	}
	else
	if ($id=="2"){
		$sql = "TRUNCATE TABLE ochered_2";
	mysqli_query($conn,$sql); 
		mysqli_query($conn,'SET autocommit=0;');
mysqli_query($conn,'START TRANSACTION;');
	
	for ($s = 0; $s<count($response1); $s++){
	$sqls="INSERT INTO `ochered_2` (`id`, `nomer`, `iin`, `fam`, `im`, `ot`, `data`, `cat`) VALUES (NULL, '".$response1[$s][0]."', '".$response1[$s][2]."', '".$response1[$s][3]."', '".$response1[$s][4]."', '".$response1[$s][5]."', '".$response1[$s][1]."', '".$response1[$s][6]."'); ";	
	mysqli_query($conn, $sqls);	
    }
	
	mysqli_query($conn,'COMMIT;');
mysqli_query($conn,'SET autocommit=1;');	
	echo "Успешно добавлено ".count($response1)." записей";
	}
	if ($id=="3"){
	$sql = "TRUNCATE TABLE ochered_3";
	mysqli_query($conn,$sql); 
		mysqli_query($conn,'SET autocommit=0;');
mysqli_query($conn,'START TRANSACTION;');
	
	for ($s = 0; $s<count($response1); $s++){
	$sqls="INSERT INTO `ochered_3` (`id`, `nomer`, `iin`, `fam`, `im`, `ot`, `data`, `cat`) VALUES (NULL, '".$response1[$s][0]."', '".$response1[$s][2]."', '".$response1[$s][3]."', '".$response1[$s][4]."', '".$response1[$s][5]."', '".$response1[$s][1]."', '".$response1[$s][6]."'); ";	
	mysqli_query($conn, $sqls);	
    }
	
	mysqli_query($conn,'COMMIT;');
mysqli_query($conn,'SET autocommit=1;');	
	echo "Успешно добавлено ".count($response1)." записей";
	}
	if ($id=="4"){
        $sql = "TRUNCATE TABLE ochered_4";
	mysqli_query($conn,$sql); 
		mysqli_query($conn,'SET autocommit=0;');
mysqli_query($conn,'START TRANSACTION;');
	
	for ($s = 0; $s<count($response1); $s++){
	$sqls="INSERT INTO `ochered_4` (`id`, `nomer`, `iin`, `fam`, `im`, `ot`, `data`, `cat`) VALUES (NULL, '".$response1[$s][0]."', '".$response1[$s][2]."', '".$response1[$s][3]."', '".$response1[$s][4]."', '".$response1[$s][5]."', '".$response1[$s][1]."', '".$response1[$s][6]."'); ";	
	mysqli_query($conn, $sqls);	
    }
	
	mysqli_query($conn,'COMMIT;');
mysqli_query($conn,'SET autocommit=1;');	
	echo "Успешно добавлено ".count($response1)." записей";
	}
	if ($id=="5"){
	$sql = "TRUNCATE TABLE ochered_5";
	mysqli_query($conn,$sql); 
		mysqli_query($conn,'SET autocommit=0;');
mysqli_query($conn,'START TRANSACTION;');
	
	for ($s = 0; $s<count($response1); $s++){
	$sqls="INSERT INTO `ochered_5` (`id`, `nomer`, `iin`, `fam`, `im`, `ot`, `data`, `cat`) VALUES (NULL, '".$response1[$s][0]."', '".$response1[$s][2]."', '".$response1[$s][3]."', '".$response1[$s][4]."', '".$response1[$s][5]."', '".$response1[$s][1]."', '".$response1[$s][6]."'); ";	
	mysqli_query($conn, $sqls);	
    }
	
	mysqli_query($conn,'COMMIT;');
mysqli_query($conn,'SET autocommit=1;');	
	echo "Успешно добавлено ".count($response1)." записей";
	}
	if ($id=="6"){
	$sql = "TRUNCATE TABLE ochered_6";
	mysqli_query($conn,$sql); 
		mysqli_query($conn,'SET autocommit=0;');
mysqli_query($conn,'START TRANSACTION;');
	
	for ($s = 0; $s<count($response1); $s++){
	$sqls="INSERT INTO `ochered_6` (`id`, `nomer`, `iin`, `fam`, `im`, `ot`, `data`, `cat`) VALUES (NULL, '".$response1[$s][0]."', '".$response1[$s][2]."', '".$response1[$s][3]."', '".$response1[$s][4]."', '".$response1[$s][5]."', '".$response1[$s][1]."', '".$response1[$s][6]."'); ";	
	mysqli_query($conn, $sqls);	
    }
	
	mysqli_query($conn,'COMMIT;');
mysqli_query($conn,'SET autocommit=1;');	
	echo "Успешно добавлено ".count($response1)." записей";
	}
	
}
?>

