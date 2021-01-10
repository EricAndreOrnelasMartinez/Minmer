<?php 
error_reporting(E_ALL);
ini_set('display_errors','1');
require 'Classes/PHPExcel/IOFactory.php';

function hasAA($string){
    $prove = false;//explode
    $arr = explode(" ",$string);
    foreach($arr as $indexL){
        if($indexL === "a" || $indexL === "A"){
            $prove = true;
            break;
        }
    }
    return $prove;
}
function readAndCDMX($fileU){
$con = mysqli_connect("localhost","root","Lasric.2018","Minmer");
$fileName = __DIR__."/uploads/".$fileU;
$obReader = PHPExcel_IOFactory::load($fileName); 
$obReader->setActiveSheetIndex(0);
$isfished = false;
$nRows = $obReader->setActiveSheetIndex(0)->getHighestRow();
for($i = 2; $i <= $nRows; $i++){
    $HorarioT = "error";
    $FechaC = $obReader->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
    $FechaE = $obReader->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
    $Operador = $obReader->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
    $Placas = $obReader->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
    $ID = $obReader->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
    $SO = $obReader->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
    $Factura = $obReader->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
    $Cliente = $obReader->getActiveSheet()->getCell('H'.$i)->getCalculatedValue();
    $PZS = $obReader->getActiveSheet()->getCell('I'.$i)->getCalculatedValue();
    $Cajas = round($obReader->getActiveSheet()->getCell('J'.$i)->getCalculatedValue());
    $Subtotal = $obReader->getActiveSheet()->getCell('K'.$i)->getCalculatedValue();
    $Horario = $obReader->getActiveSheet()->getCell('L'.$i)->getCalculatedValue();
    if(!empty($Horario)){
        if(!hasAA($Horario)){
            $HorarioT = $Horario * 24;
        }else {
            $HorarioT = $Horario;
        }
    }else{
        $HorarioT = "PENDIENTE";
    }
    $Direccion = $obReader->getActiveSheet()->getCell('M'.$i)->getCalculatedValue();
    $Destino = $obReader->getActiveSheet()->getCell('N'.$i)->getCalculatedValue();
    $Concepto = $obReader->getActiveSheet()->getCell('O'.$i)->getCalculatedValue();
    $Capacidad = $obReader->getActiveSheet()->getCell('P'.$i)->getCalculatedValue();
    $Observaciones = $obReader->getActiveSheet()->getCell('Q'.$i)->getCalculatedValue();
    $OE = $obReader->getActiveSheet()->getCell('R'.$i)->getCalculatedValue();
    $Custodia = $obReader->getActiveSheet()->getCell('S'.$i)->getCalculatedValue();
    $sql = "INSERT INTO CDMX(FechaC,FechaE,Operador,Placas,ID,SO,Factura,Cliente,PZS,Caja,Subtotal,Horario,Direccion,Destino,Concepto,Capacidad,Observaciones,OE,Custodia) VALUES('$FechaC','$FechaE','$Operador','$Placas','$ID','$SO','$Factura','$Cliente','$PZS','$Cajas','$Subtotal','$HorarioT','$Direccion','$Destino','$Concepto','$Capacidad','$Observaciones','$OE','$Custodia');";
    $rmysql = mysqli_query($con, $sql);
    if($i == $nRows){
        $isfished = true;
    }
    if($rmysql){
       // echo "capturado!!";
    }else{
        //echo "algo falló";
    }
    if($isfished){
    readAndGDL($fileU);
    $con->close();
    }
}
}

function readAndGDL($fileU){
    $con1 = mysqli_connect("localhost","root","Lasric.2018","Minmer");
    $fileName1 = __DIR__."/uploads/".$fileU;
    $obReader1 = PHPExcel_IOFactory::load($fileName1); 
    $obReader1->setActiveSheetIndex(1);
    $nRows1 = $obReader1->setActiveSheetIndex(1)->getHighestRow();
    $HorarioT1 = "Error";
    for($i = 2; $i <= $nRows1; $i++){
        $FechaC1 = $obReader1->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
        $FechaE1 = $obReader1->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
        $Operador1 = $obReader1->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
        $Placas1 = $obReader1->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
        $ID1 = $obReader1->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
        $SO1 = $obReader1->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
        $Factura1 = $obReader1->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
        $Cliente1 = $obReader1->getActiveSheet()->getCell('H'.$i)->getCalculatedValue();
        $PZS1 = $obReader1->getActiveSheet()->getCell('I'.$i)->getCalculatedValue();
        $Cajas1 = round($obReader1->getActiveSheet()->getCell('J'.$i)->getCalculatedValue());
        $Subtotal1 = $obReader1->getActiveSheet()->getCell('K'.$i)->getCalculatedValue();
        $Horario1 = $obReader1->getActiveSheet()->getCell('L'.$i)->getCalculatedValue();
        if(!empty($Horario1)){
            if(!hasAA($Horario1)){
                $HorarioT1 = $Horario1 * 24;
            }else {
                $HorarioT1 = $Horario1;
            }
        }else{
            $HorarioT1 = "PENDIENTE";
        }
        $Direccion1 = $obReader1->getActiveSheet()->getCell('M'.$i)->getCalculatedValue();
        $Destino1 = $obReader1->getActiveSheet()->getCell('N'.$i)->getCalculatedValue();
        $Concepto1 = $obReader1->getActiveSheet()->getCell('O'.$i)->getCalculatedValue();
        $Capacidad1 = $obReader1->getActiveSheet()->getCell('P'.$i)->getCalculatedValue();
        $Observaciones1 = $obReader1->getActiveSheet()->getCell('Q'.$i)->getCalculatedValue();
        $OE1 = $obReader1->getActiveSheet()->getCell('R'.$i)->getCalculatedValue();
        $Custodia1 = $obReader1->getActiveSheet()->getCell('S'.$i)->getCalculatedValue();
        $sql1 = "INSERT INTO GDL(FechaC,FechaE,Operador,Placas,ID,OS,Factura,Cliente,PZS,Caja,Subtotal,Horario,Direccion,Destino,Concepto,Capacidad,Observaciones,OE,Custodia) VALUES('$FechaC1','$FechaE1','$Operador1','$Placas1','$ID1','$SO1','$Factura1','$Cliente1','$PZS1','$Cajas1','$Subtotal1','$HorarioT1','$Direccion1','$Destino1','$Concepto1','$Capacidad1','$Observaciones1','$OE1','$Custodia1');";
        $rmysql1 = mysqli_query($con1, $sql1);
        if($rmysql1){
            echo "capturado!!";
        }else{
            echo "algo falló";
        }
        $con1->close();
    }
    }


?>