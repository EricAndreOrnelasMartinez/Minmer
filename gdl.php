<?php 
error_reporting(E_ALL);
ini_set('display_errors','1');

$con = mysqli_connect("localhost","root","Lasric.2018","Minmer");
session_start();

if(isset($_SESSION['user'])){
    //echo "validoo";
}else {
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
    <ol>
        <li><a href="cdmx.php">CDMX</a></li>
        <li><a href="gdl.php">GDL</a></li>
        <li><a href="mty.php">MTY</a></li>
        <li><a href="cun.php">CUN</a></li>
        <li><a href="sjd.php">SJD</a></li>
        <li><a href="qro.php">QRO</a></li>
        <li><a href="buscar.php">Buscar</a></li>
    
    </ol>
    <table border="1">
        <tr>
            <td>ID SQL</td>
            <td>Fecha de carga</td>
            <td>Fecha de entrega</td>
            <td>Operador</td>
            <td>Placas</td>
            <td>ID</td>
            <td>SO</td>
            <td>Factura</td>
            <td>Cliente</td>
            <td>PZS</td>
            <td>Cajas</td>
            <td>Subtotal</td>
            <td>Horario</td>
            <td>Dirección</td>
            <td>Destino</td>
            <td>Concepto</td>
            <td>Capacidad</td>
            <td>Observaciones</td>
            <td>OE</td>
            <td>Custodia</td>
        </tr>
        <?php   
        $petition = 'SELECT * FROM GDL';
        $ack = mysqli_query($con, $petition);
        $temVar = "no definido";
        while($show = mysqli_fetch_array($ack)){
        ?>
        <tr>
            <td><?php echo $show['ID_SQL'] ?></td>
            <td><?php echo $show['FechaC'] ?></td>
            <td><?php echo $show['FechaE'] ?></td>
            <td><?php echo $show['Operador'] ?></td>
            <td><?php echo $show['Placas'] ?></td>
            <td><?php echo $show['ID'] ?></td>
            <td><?php echo $show['OS'] ?></td>
            <td><?php echo $show['Factura'] ?></td>
            <td><?php echo $show['Cliente'] ?></td>
            <td><?php echo $show['PZS'] ?></td>
            <td><?php echo $show['Caja'] ?></td>
            <td><?php echo $show['Subtotal'] ?></td>
            <td><?php if(!hasA($show['Horario'])){
                $temVar = round($show['Horario'] * 24).':00';
                echo round($show['Horario'] * 24).':00';
            }else {
                $temVar =  $show['Horario'];
                echo $show['Horario'];
            } ?></td>
            <td><?php echo $show['Direccion'] ?></td>
            <td><?php echo $show['Destino'] ?></td>
            <td><?php echo $show['Concepto'] ?></td>
            <td><?php echo $show['Capacidad'] ?></td>
            <td><?php echo $show['Observaciones'] ?></td>
            <td><?php echo $show['OE'] ?></td>
            <td><?php echo $show['Custodia'] ?></td>
            <td><a href="editgdl.php?ids='<?php echo $show['ID_SQL']?>'&hor='<?php echo $temVar ?>'"><button type="button" class="btn btn-succes">Modificar</button></a></td>
        </tr>
        <?php } $con->close()?>
    </table>

</body>
</html>
<?php 

if(isset($_POST['FechaC'])){
    $con2 = mysqli_connect("localhost","root","Lasric.2018","Minmer");
    $FechaC1 = $_POST['FechaC'];
    $FechaE1 = $_POST['FechaE'];
    $Operador1 = $_POST['Operador'];
    $Placas1 = $_POST['Placas'];
    $ID1 = $_POST['ID'];
    $SO1 = $_POST['OS'];
    $Factura1 = $_POST['Factura'];
    $Cliente1 = $_POST['Cliente'];
    $PZS1 = $_POST['PZS'];
    $Cajas1 = $_POST['Caja'];
    $Subtotal1 = $_POST['Subtotal'];
    $Horario1 = $_POST['Horario'];
    $Direccion1 = $_POST['Direccion'];
    $Destino1 = $_POST['Destino'];
    $Concepto1 = $_POST['Concepto'];
    $Capacidad1 = $_POST['Capacidad'];
    $Observaciones1 = $_POST['Observaciones'];
    $OE1 = $_POST['OE'];
    $Custodia1 = $_POST['Custodia'];
    $idsql = $_POST['ID_SQL'];
    $sqlUpdate = "UPDATE GDL SET FechaC='$FechaC1',FechaE='$FechaE1',Operador='$Operador1',Placas='$Placas1',ID='$ID1',OS='$SO1',Factura='$Factura1',Cliente='$Cliente1',PZS='$PZS1',Caja='$Cajas1',Subtotal='$Subtotal1',Horario='$Horario1',Direccion='$Direccion1',Destino='$Destino1',Concepto='$Concepto1',Capacidad='$Capacidad1',Observaciones='$Observaciones1',OE='$OE1',Custodia='$Custodia1' WHERE ID_SQL=".$idsql;
    $resulupdate = mysqli_query($con2,$sqlUpdate);
    if($resulupdate){
        echo "Perfecto eres un crack";
    }else {
        echo "ota vez te equivocaste por pendejo";
    }
}




?>