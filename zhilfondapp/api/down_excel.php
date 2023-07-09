<?php
$sdd_db_host='localhost'; // ваш хост <meta http-equiv="Refresh" content="5" />
$sdd_db_name='zhilfond'; // ваша бд <META HTTP-EQUIV="Refresh" Content="11, URL=index.php">
$sdd_db_user='zhilfond'; // пользователь бд
$sdd_db_pass='vXCkPc8gbw821uf'; // пароль к бд

$conn = mysqli_connect($sdd_db_host,$sdd_db_user,$sdd_db_pass,$sdd_db_name)// коннект с сервером бд
or die("Ошибка " . mysqli_error($conn));
mysqli_set_charset($conn,"utf8");

require_once ('Classes/PHPExcel.php');
require_once('Classes/PHPExcel/Writer/Excel5.php');
$ii=0;
$response = array();
if ($_GET['dan']=="newza"){

    $xls = new PHPExcel();
    $xls->setActiveSheetIndex(0);
    $sheet = $xls->getActiveSheet();
        $sheet->setCellValue("A1", "Заявки на 15 000 тенге");
        $sheet->getStyle('A1')->getFill()->setFillType(
                                                       PHPExcel_Style_Fill::FILL_SOLID);
        $sheet->getStyle('A1')->getFill()->getStartColor()->setRGB('EEEEEE');
        $sheet->mergeCells('A1:G1');
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(
                                                              PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue("A2", "ФИО");
        $sheet->setCellValue("B2", "ИИН");
        $sheet->setCellValue("C2", "Номер лицевого счета");
        $sheet->setCellValue("D2", "Категория");
        $sheet->setCellValue("E2", "Контакты");
        $sheet->setCellValue("F2", "Электронная почта");
        $sheet->setCellValue("G2", "Комментарий");
        $sheet->getColumnDimension('A')->setWidth(50);
        $sheet->getColumnDimension('B')->setWidth(50);
        $sheet->getColumnDimension('C')->setWidth(50);
        $sheet->getColumnDimension('D')->setWidth(50);
        $sheet->getColumnDimension('E')->setWidth(50);
        $sheet->getColumnDimension('F')->setWidth(50);
        $sheet->getColumnDimension('G')->setWidth(50);
        $sheet->getStyle('A2')->getFill()->getStartColor()->setRGB('FFFF00');
        $sheet->getStyle('B2')->getFill()->getStartColor()->setRGB('FFFF00');
        $sheet->getStyle('C2')->getFill()->getStartColor()->setRGB('FFFF00');
        $sheet->getStyle('D2')->getFill()->getStartColor()->setRGB('FFFF00');
        $sheet->getStyle('E2')->getFill()->getStartColor()->setRGB('FFFF00');
        $sheet->getStyle('F2')->getFill()->getStartColor()->setRGB('FFFF00');
        $sheet->getStyle('G2')->getFill()->getStartColor()->setRGB('FFFF00');
        $sheet->getStyle('A2')->getAlignment()->setHorizontal(
                                                              PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('B2')->getAlignment()->setHorizontal(
                                                              PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('C2')->getAlignment()->setHorizontal(
                                                              PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('D2')->getAlignment()->setHorizontal(
                                                              PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('E2')->getAlignment()->setHorizontal(
                                                              PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('F2')->getAlignment()->setHorizontal(
                                                              PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('G2')->getAlignment()->setHorizontal(
                                                                PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $result = mysqli_query( $conn,'select * from newza ORDER BY id ASC');
        while ($row = mysqli_fetch_array($result)) {
            $response[$ii][0]=$row['fio'];
            $response[$ii][1]=$row['iin'];
            $response[$ii][2]=$row['iban'];
            $response[$ii][3]=$row['cat'];
            $response[$ii][4]=$row['tel'];
            $response[$ii][5]=$row['post'];
            $response[$ii][6]=$row['comment'];
            $ii++;
        }
        
        
    
    
    for ($i = 2; $i < 9; $i++) {
        for ($j = 3; $j < $ii+3; $j++) {
            $sheet->setCellValueByColumnAndRow($i - 2,$j,$response[$j-3][$i-2]);
            $sheet->getStyleByColumnAndRow($i - 2, $j)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        }
    }

    header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=Подача заявки на возмещение затрат за коммунальные услуги в период ЧП.xls");
header("Pragma: no-cache");
header("Expires: 0");

}else{
$xls = new PHPExcel();
$xls->setActiveSheetIndex(0);
$sheet = $xls->getActiveSheet();
    $sheet->setCellValue("A1", "Клиенты");
    $sheet->getStyle('A1')->getFill()->setFillType(
                                                   PHPExcel_Style_Fill::FILL_SOLID);
    $sheet->getStyle('A1')->getFill()->getStartColor()->setRGB('EEEEEE');
    $sheet->mergeCells('A1:F1');
    $sheet->getStyle('A1')->getAlignment()->setHorizontal(
                                                          PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $sheet->setCellValue("A2", "ID");
    $sheet->setCellValue("B2", "Фамилия");
    $sheet->setCellValue("C2", "Имя");
    $sheet->setCellValue("D2", "Отчество");
    $sheet->setCellValue("E2", "Телефон");
    $sheet->setCellValue("F2", "Дата регистраций");
    $sheet->getColumnDimension('A')->setWidth(10);
    $sheet->getColumnDimension('B')->setWidth(50);
    $sheet->getColumnDimension('C')->setWidth(50);
    $sheet->getColumnDimension('D')->setWidth(50);
    $sheet->getColumnDimension('E')->setWidth(50);
    $sheet->getColumnDimension('F')->setWidth(50);
    $sheet->getStyle('A2')->getFill()->getStartColor()->setRGB('FFFF00');
    $sheet->getStyle('B2')->getFill()->getStartColor()->setRGB('FFFF00');
    $sheet->getStyle('C2')->getFill()->getStartColor()->setRGB('FFFF00');
    $sheet->getStyle('D2')->getFill()->getStartColor()->setRGB('FFFF00');
    $sheet->getStyle('E2')->getFill()->getStartColor()->setRGB('FFFF00');
    $sheet->getStyle('F2')->getFill()->getStartColor()->setRGB('FFFF00');
    $sheet->getStyle('A2')->getAlignment()->setHorizontal(
                                                          PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle('B2')->getAlignment()->setHorizontal(
                                                          PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle('C2')->getAlignment()->setHorizontal(
                                                          PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle('D2')->getAlignment()->setHorizontal(
                                                          PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle('E2')->getAlignment()->setHorizontal(
                                                          PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle('F2')->getAlignment()->setHorizontal(
                                                          PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $result = mysqli_query( $conn,'select * from user');
    while ($row = mysqli_fetch_array($result)) {
        $response[$ii][0]=$row['id'];
        $response[$ii][1]=$row['fam'];
        $response[$ii][2]=$row['im'];
        $response[$ii][3]=$row['ot'];
        $response[$ii][4]=$row['phone'];
        $response[$ii][5]=$row['data'];
        $ii++;
    }
    
    


for ($i = 2; $i < 8; $i++) {
    for ($j = 3; $j < $ii+3; $j++) {
        $sheet->setCellValueByColumnAndRow($i - 2,$j,$response[$j-3][$i-2]);
        $sheet->getStyleByColumnAndRow($i - 2, $j)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    }
}
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=Клиенты.xls");
header("Pragma: no-cache");
header("Expires: 0");
}

$objWriter = new PHPExcel_Writer_Excel5($xls);
$objWriter->save('php://output');
?>

