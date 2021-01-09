<?php 
error_reporting(E_ALL);
ini_set('display_errors','1');

session_start();

if(isset($_SESSION['user'])){
}else{
    header("Location:index.php");
}
function hasA($string){
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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="gdl.php" method="post">
    <?php
    $con = mysqli_connect("localhost","root","Lasric.2018","Minmer");
    $tem_id = round($_GET['ids']) + 1;
    echo $tem_id;
    $tem_hor = $_GET['hor'];
    echo $tem_hor;
    $sqlFC = "SELECT FechaC FROM GDL WHERE ID_SQL=".$tem_id.";";
    $resultFC = mysqli_query($con,$sqlFC);
    $sqlFE = "SELECT FechaE FROM GDL WHERE ID_SQL=".$tem_id.";";
    $resultFE = mysqli_query($con,$sqlFE);
    $sqlOper = "SELECT Operador FROM GDL WHERE ID_SQL=".$tem_id.";";
    $resultOper = mysqli_query($con,$sqlOper);
    $sqlPlac = "SELECT Placas FROM GDL WHERE ID_SQL=".$tem_id.";";
    $resultPlac = mysqli_query($con,$sqlPlac);
    $sqlID = "SELECT ID FROM GDL WHERE ID_SQL=".$tem_id.";";
    $resultID = mysqli_query($con,$sqlID);
    $sqlOS = "SELECT OS FROM GDL WHERE ID_SQL=".$tem_id.";";
    $resultOS = mysqli_query($con,$sqlOS);
    $sqlFact = "SELECT Factura FROM GDL WHERE ID_SQL=".$tem_id.";";
    $resultFact = mysqli_query($con,$sqlFact);
    $sqlCli = "SELECT Cliente FROM GDL WHERE ID_SQL=".$tem_id.";";
    $resultCli = mysqli_query($con,$sqlCli);
    $sqlPZS = "SELECT PZS FROM GDL WHERE ID_SQL=".$tem_id.";";
    $resultPZS = mysqli_query($con,$sqlPZS);
    $sqlCaja = "SELECT Caja FROM GDL WHERE ID_SQL=".$tem_id.";";
    $resultCaja = mysqli_query($con,$sqlCaja);
    $sqlSub =  "SELECT Subtotal FROM GDL WHERE ID_SQL=".$tem_id.";";
    $resultSub = mysqli_query($con,$sqlSub);
    $resultHor = $tem_hor;
    $sqlDire = "SELECT Direccion FROM GDL WHERE ID_SQL=".$tem_id.";";
    $resultDire = mysqli_query($con,$sqlDire);
    $sqlDest =  "SELECT Destino FROM GDL WHERE ID_SQL=".$tem_id.";";
    $resultDest = mysqli_query($con,$sqlDest);
    $sqlConce = "SELECT Concepto FROM GDL WHERE ID_SQL=".$tem_id.";";
    $resultConce = mysqli_query($con,$sqlConce);
    $sqlCapa = "SELECT Capacidad FROM GDL WHERE ID_SQL=".$tem_id.";";
    $resultCapa = mysqli_query($con,$sqlCapa);
    $sqlObser = "SELECT Observaciones FROM GDL WHERE ID_SQL=".$tem_id.";";
    $resultObser =  mysqli_query($con,$sqlObser);
    $sqlOE = "SELECT OE FROM GDL WHERE ID_SQL=".$tem_id.";";
    $resultOE = mysqli_query($con,$sqlOE);
    $sqlCust = "SELECT Custodia FROM GDL WHERE ID_SQL=".$tem_id.";";
    $resultCust = mysqli_query($con,$sqlCust);
    ?>
    Fecha de carga: <input type="text" name="FechaC"  value="<?php echo implode(mysqli_fetch_assoc($resultFC)); ?>"><br>
    Fecha de entrega: <input type="text" name="FechaE"  value="<?php echo implode(mysqli_fetch_assoc($resultFE)); ?>"><br>
    Operador: <input type="text" name="Operador" value="<?php echo implode(mysqli_fetch_assoc($resultOper)); ?>"><br>
    Placas: <input type="text" name="Placas"  value="<?php echo implode(mysqli_fetch_assoc($resultPlac)); ?>"><br>
    ID: <input type="text" name="ID" value="<?php echo implode(mysqli_fetch_assoc($resultID)); ?>"><br>
    SO: <input type="text" name="OS"  value="<?php echo implode(mysqli_fetch_assoc($resultOS)); ?>"><br>
    Factura: <input type="text" name="Factura"  value="<?php echo implode(mysqli_fetch_assoc($resultFact)); ?>"><br>
    Cliente: <input type="text" name="Cliente"  value="<?php echo implode(mysqli_fetch_assoc($resultCli)); ?>"><br>
    PZS: <input type="text" name="PZS"  value="<?php echo implode(mysqli_fetch_assoc($resultPZS)); ?>"><br>
    Cajas: <input type="text" name="Caja"  value="<?php echo implode(mysqli_fetch_assoc($resultCaja)); ?>"><br>
    Subtotal: <input type="text" name="Subtotal"  value="<?php echo implode(mysqli_fetch_assoc($resultSub)); ?>"><br>
    Horario: <input type="text" name="Horario"  value="<?php echo $resultHor; ?>"><br>
    Direccion: <input type="text" name="Direccion"  value="<?php echo implode(mysqli_fetch_assoc($resultDire)); ?>"><br>
    Destino: <input type="text" name="Destino"  value="<?php echo implode(mysqli_fetch_assoc($resultDest)); ?>"><br>
    Concepto: <input type="text" name="Concepto"  value="<?php echo implode(mysqli_fetch_assoc($resultConce)); ?>"><br>
    Capacidad: <input type="text" name="Capacidad"  value="<?php echo implode(mysqli_fetch_assoc($resultCapa)); ?>"><br>
    Observaciones: <input type="text" name="Observaciones"  value="<?php echo implode(mysqli_fetch_assoc($resultObser)); ?>"><br>
    OE: <input type="text" name="OE"  value="<?php echo implode(mysqli_fetch_assoc($resultOE)); ?>"><br>
    Custodia: <input type="text" name="Custodia"  value="<?php echo implode(mysqli_fetch_assoc($resultCust)); ?>"><br>
    <input type="hidden" name="ID_SQL" value="<?php echo $tem_id;  ?>">
    <input type="submit" value="Guardar">
    </form>
    <?php $con->close(); ?>
</body>
</html>