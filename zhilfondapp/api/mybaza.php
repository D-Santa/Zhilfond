
<?php
$sdd_db_host='localhost'; // ваш хост <meta http-equiv="Refresh" content="5" />
$sdd_db_name='zhilfond'; // ваша бд <META HTTP-EQUIV="Refresh" Content="11, URL=index.php">
$sdd_db_user='zhilfond'; // пользователь бд
$sdd_db_pass='vXCkPc8gbw821uf'; // пароль к бд

$conn = mysqli_connect($sdd_db_host,$sdd_db_user,$sdd_db_pass,$sdd_db_name)// коннект с сервером бд
    or die("Ошибка " . mysqli_error($conn));
mysqli_set_charset($conn,"utf8");
/*

$host='srv-pleskdb34.ps.kz'; // ваш хост <meta http-equiv="Refresh" content="5" />
$database='fcarsena_balatime'; // ваша бд <META HTTP-EQUIV="Refresh" Content="11, URL=index.php">
$user='fcars_balatime'; // пользователь бд
$password='787fm%Jp'; // пароль к бд
$link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link));
//mysqli_close($link);
//mysqli_set_charset('utf8'*/
?>