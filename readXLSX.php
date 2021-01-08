<?php 
error_reporting(E_ALL);
ini_set('display_errors','1');
require 'Classes/PHPExcel/IOFactory.php';
function readAndCDMX($fileU){
$con = mysqli_connect("localhost","root","Lasric.2018","Minmer");
$fileName = "/var/www/html/Minmer/uploads/".$fileU;
$obReader = PHPExcel_IOFactory::load($fileName); 
$obReader->setActiveSheetIndex(0);
$nRows = $obReader->setActiveSheetIndex(0)->getHighestRow();
for($i = 2; $i <= $nRows; $i++){
    $FechaC = $obReader->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
    $FechaE = $obReader->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
    $Operador = $obReader->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
    $Placas = $obReader->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
    $ID = $obReader->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
    $SO = $obReader->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
    $Factura = $obReader->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
    $Cliente = $obReader->getActiveSheet()->getCell('H'.$i)->getCalculatedValue();
    $PZS = $obReader->getActiveSheet()->getCell('I'.$i)->getCalculatedValue();
    $Cajas = intval($obReader->getActiveSheet()->getCell('J'.$i)->getCalculatedValue());
    $Subtotal = $obReader->getActiveSheet()->getCell('K'.$i)->getCalculatedValue();
    $Horario = $obReader->getActiveSheet()->getCell('L'.$i)->getCalculatedValue();
    $Direccion = $obReader->getActiveSheet()->getCell('M'.$i)->getCalculatedValue();
    $Destino = $obReader->getActiveSheet()->getCell('N'.$i)->getCalculatedValue();
    $Concepto = $obReader->getActiveSheet()->getCell('O'.$i)->getCalculatedValue();
    $Capacidad = $obReader->getActiveSheet()->getCell('P'.$i)->getCalculatedValue();
    $Observaciones = $obReader->getActiveSheet()->getCell('Q'.$i)->getCalculatedValue();
    $OE = $obReader->getActiveSheet()->getCell('R'.$i)->getCalculatedValue();
    $Custodia = $obReader->getActiveSheet()->getCell('S'.$i)->getCalculatedValue();
    $sql = "INSERT INTO CDMX(FechaC,FechaE,Operador,Placas,ID,SO,Factura,Cliente,PZS,Caja,Subtotal,Horario,Direccion,Destino,Concepto,Capacidad,Observaciones,OE,Custodia) VALUES('$FechaC','$FechaE','$Operador','$Placas','$ID','$SO','$Factura','$Cliente','$PZS','$Cajas','$Subtotal','$Horario','$Direccion','$Destino','$Concepto','$Capacidad','$Observaciones','$OE','$Custodia');";
    $rmysql = mysqli_query($con, $sql);
    if($rmysql){
       // echo "capturado!!";
    }else{
        echo "algo falló";
    }
}
}


?>