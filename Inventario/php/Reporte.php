
<?php
if (PHP_SAPI == 'cli')
	die('Este ejemplo sólo se puede ejecutar desde un navegador Web');
 
/** Incluye PHPExcel */
/** Incluye PHPExcel */
require_once dirname(__FILE__) . '/Classes/PHPExcel.php';
// Crear nuevo objeto PHPExcel
$objPHPExcel = new PHPExcel();

 
// Propiedades del documento
$objPHPExcel->getProperties()->setCreator("Obed Alvarado")
							 ->setLastModifiedBy("Obed Alvarado")
							 ->setTitle("Office 2010 XLSX Documento de prueba")
							 ->setSubject("Office 2010 XLSX Documento de prueba")
							 ->setDescription("Documento de prueba para Office 2010 XLSX, generado usando clases de PHP.")
							 ->setKeywords("office 2010 openxml php")
							 ->setCategory("Archivo con resultado de prueba");
 
 
 
// Combino las celdas desde A1 hasta E1
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:Ñ1');
 
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'REPORTE DE EQUIPOS')
            ->setCellValue('A2', 'NUMERO DE SERIE')
            ->setCellValue('B2', 'HOST')
            ->setCellValue('C2', 'MARCA')
			->setCellValue('D2', 'MODELO')
			->setCellValue('E2', 'CAPACIDAD DE DISCO DURO')
            ->setCellValue('F2', 'CAPACIDAD DE RAM')
            ->setCellValue('G2', 'SISTEMA OPERATIVO')
            ->setCellValue('H2', 'AREA')
			->setCellValue('I2', 'USUARIO')
			->setCellValue('J2', 'FECHA DE MODIFICACION')
            ->setCellValue('K2', 'FECHA DE ASIGNACION')
            ->setCellValue('L2', 'OBSERVACIONES')
            ->setCellValue('M2', 'RESPONSIVA')
			->setCellValue('N2', 'ESTADO DEL EQUIPO')
			->setCellValue('Ñ2', 'FECHA DE PORXIMO SERVICIO');

// Fuente de la primera fila en negrita
$boldArray = array('font' => array('bold' => true,),'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
 
$objPHPExcel->getActiveSheet()->getStyle('A1:Ñ2')->applyFromArray($boldArray);		
 
	
			
//Ancho de las columnas
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);	
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);	
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);	
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);	
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);	
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);	
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(30);	
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);	
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);	
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(15);	
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);	
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(30);	
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(15);	
$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);	
$objPHPExcel->getActiveSheet()->getColumnDimension('Ñ')->setWidth(15);	

/*Extraer datos de MYSQL*/
	# conectare la base de datos
    $con=@mysqli_connect('localhost', 'root', ' ', 'inventary');
    if(!$con){
        die("imposible conectarse: ".mysqli_error($con));
    }
    if (@mysqli_connect_errno()) {
        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }
	$sql="SELECT * FROM countries  order by countryName";
	$query=mysqli_query($con,$sql);
	$cel=3;//Numero de fila donde empezara a crear  el reporte
	while ($row=mysqli_fetch_array($query)){
		$numserie=$rows['Num_Serie'];
		$host=$rows['Host'];
		$marca=$rows['Marca'];
		$modelo=$rows['Modelo'];
		$capacidad_dd=$rows['Capacidad_DD'];
        $capacidadram=$rows['Capacidad_RAM'];
        $sisoperativo=$rows['Sis_Operativo'];
        $area=$rows['Area'];
        $usuario=$rows['Usuario'];
        $fechamod=$rows['Fecha_Modificacion'];
        $fechasi=$rows['Fecha_Asignacion'];
        $observacion=$rows['Observaciones'];
        $responsiva=$rows['IDNum_Responsiva'];
        $estadoequi=$rows['Estado_del_Equipo'];
        $fechaserv=$rows['Fecha_proximoservicio'];
		
			$a="A".$cel;
			$b="B".$cel;
			$c="C".$cel;
			$d="D".$cel;
			$e="E".$cel;
            $f="F".$cel;
			$g="G".$cel;
			$h="H".$cel;
			$i="I".$cel;
			$j="J".$cel;
            $k="K".$cel;
			$l="L".$cel;
			$m="M".$cel;
			$n="N".$cel;
			$ñ="Ñ".$cel;
           
            
			// Agregar datos
			$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue($a, $numserie)
            ->setCellValue($b, $host)
            ->setCellValue($c, $marca)
            ->setCellValue($d, $modelo)
			->setCellValue($e, $capacidad_dd)
            ->setCellValue($f, $capacidadram)
            ->setCellValue($g, $sisoperativo)
            ->setCellValue($h, $area)
            ->setCellValue($i, $usuario)
			->setCellValue($j, $fechamod)
            ->setCellValue($k, $fechasi)
            ->setCellValue($l, $observacion)
            ->setCellValue($m, $responsiva)
            ->setCellValue($n, $estadoequi)
			->setCellValue($ñ, $fechaserv);
            
			
	$cel+=1;
	}
 
/*Fin extracion de datos MYSQL*/
$rango="A2:$e";
$styleArray = array('font' => array( 'name' => 'Arial','size' => 12),
'borders'=>array('allborders'=>array('style'=> PHPExcel_Style_Border::BORDER_THIN,'color'=>array('argb' => 'FFF')))
);
$objPHPExcel->getActiveSheet()->getStyle($rango)->applyFromArray($styleArray);
// Cambiar el nombre de hoja de cálculo
$objPHPExcel->getActiveSheet()->setTitle('Reporte de paises');
 
 
// Establecer índice de hoja activa a la primera hoja , por lo que Excel abre esto como la primera hoja
$objPHPExcel->setActiveSheetIndex(0);
 
 
// Redirigir la salida al navegador web de un cliente ( Excel5 )
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="reporte.xls"');
header('Cache-Control: max-age=0');
// Si usted está sirviendo a IE 9 , a continuación, puede ser necesaria la siguiente
header('Cache-Control: max-age=1');
 
// Si usted está sirviendo a IE a través de SSL , a continuación, puede ser necesaria la siguiente
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0
 
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;