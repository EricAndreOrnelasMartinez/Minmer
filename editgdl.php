<?php 

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
    $sqlFC = "SELECT FechaC FROM GDL WHERE ID_SQL=".$tem_id.";";
    $resultFC = mysqli_query($con,$sqlFC);
    $sqlFE = "SELECT FechaE FROM GDL WHERE ID_SQL=$tem_id";
    $resultFE = mysqli_query($con,$sqlFE);
    $sqlOper = "SELECT Operador FROM GDL WHERE ID_SQL='$tem_id'";
    $resultOper = mysqli_query($con,$sqlOper);
    $sqlPlac = "SELECT Placas FROM GDL WHERE ID_SQL='$tem_id'";
    $resultPlac = mysqli_query($con,$sqlPlac);
    $sqlID = "SELECT ID FROM GDL WHERE ID_SQL='$tem_id'";
    $resultID = mysqli_query($con,$sqlID);
    $sqlOS = "SELECT OS FROM GDL WHERE ID_SQL='$tem_id'";
    $resultOS = mysqli_query($con,$sqlOS);
    $sqlFact = "SELECT Factura FROM GDL WHERE ID_SQL='$tem_id'";
    $resultFact = mysqli_query($con,$sqlFact);
    $sqlCli = "SELECT Cliente FROM GDL WHERE ID_SQL='$tem_id'";
    $resultCli = mysqli_query($con,$sqlCli);
    $sqlPZS = "SELECT PZS FROM GDL WHERE ID_SQL='$tem_id'";
    $resultPZS = mysqli_query($con,$sqlPZS);
    $sqlCaja = "SELECT Caja FROM GDL WHERE ID_SQL='$tem_id'";
    $resultCaja = mysqli_query($con,$sqlCaja);
    $sqlSub =  "SELECT Subtotal FROM GDL WHERE ID_SQL='$tem_id'";
    $resultSub = mysqli_query($con,$sqlSub);
    $sqlHor =  "SELECT Horario FROM GDL WHERE ID_SQL='$tem_id'";
    $preResultHor =  mysqli_query($con,$sqlHor);
    $resultHor = "";
    if(!hasA($preResultHor)){
        $resultHor = round($preResultHor * 24).':00';
    }else {
        $resultHor = $preResultHor;
    }
    $sqlDire = "SELECT Direccion FROM GDL WHERE ID_SQL='$tem_id'";
    $resultDire = mysqli_query($con,$sqlDire);
    $sqlDest =  "SELECT Destino FROM GDL WHERE ID_SQL='$tem_id'";

    ?>
    Fecha de carga: <input type="text" name="newText" id="" value="<?php echo implode(mysqli_fetch_assoc($resultFC)); ?>">
    
    
    </form>
</body>
</html>