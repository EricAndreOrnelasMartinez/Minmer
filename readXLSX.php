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
    echo "bien 4";
    $FechaC = date($obReader->getActiveSheet()->getCell('A'.$i)->getDateFormat());
    $FechaE = date($obReader->getActiveSheet()->getCell('B'.$i)->getDateFormat());
    $Operador = $obReader->getActiveSheet()->getCell('C'.$i)->getValue();
    $Placas = $obReader->getActiveSheet()->getCell('D'.$i)->getValue();
    $ID = $obReader->getActiveSheet()->getCell('E'.$i)->getValue();
    $SO = $obReader->getActiveSheet()->getCell('F'.$i)->getValue();
    $Factura = $obReader->getActiveSheet()->getCell('G'.$i)->getValue();
    $Cliente = $obReader->getActiveSheet()->getCell('H'.$i)->getValue();
    $PZS = $obReader->getActiveSheet()->getCell('I'.$i)->getValue();
    $Cajas = $obReader->getActiveSheet()->getCell('J'.$i)->getValue();
    $Subtotal = $obReader->getActiveSheet()->getCell('K'.$i)->getValue();
    $Horario = $obReader->getActiveSheet()->getCell('L'.$i)->getValue();
    $Direccion = $obReader->getActiveSheet()->getCell('M'.$i)->getValue();
    $Destino = $obReader->getActiveSheet()->getCell('N'.$i)->getValue();
    $Concepto = $obReader->getActiveSheet()->getCell('O'.$i)->getValue();
    $Capacidad = $obReader->getActiveSheet()->getCell('P'.$i)->getValue();
    $Observaciones = $obReader->getActiveSheet()->getCell('Q'.$i)->getValue();
    $OE = $obReader->getActiveSheet()->getCell('R'.$i)->getValue();
    $Custodia = $obReader->getActiveSheet()->getCell('S'.$i)->getValue();
    $sql = "INSERT INTO CDMX(FechaC,FechaE,Operador,Placas,ID,SO,Factura,Cliente,PZS,Caja,Subtotal,Horario,Direccion,Destino,Concepto,Capacidad,Observaciones,OE,Custodia) VALUES('$FechaC','$FechaE','$Operador','$Placas','$ID','$SO','$Factura','$Cliente','$PZS','$Cajas','$Subtotal','$Horario','$Direccion','$Destino','$Concepto','$Capacidad','$Observaciones','$OE','$Custodia');";
    $rmysql = mysqli_query($con, $sql);
    if($rmysql){
        echo "capturado!!";
    }else{
        echo "algo falló";
    }
}
}


?>