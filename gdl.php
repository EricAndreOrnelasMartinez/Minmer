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
                echo round($show['Horario'] * 24).':00';
            }else {
                echo $show['Horario'];
            } ?></td>
            <td><?php echo $show['Direccion'] ?></td>
            <td><?php echo $show['Destino'] ?></td>
            <td><?php echo $show['Concepto'] ?></td>
            <td><?php echo $show['Capacidad'] ?></td>
            <td><?php echo $show['Observaciones'] ?></td>
            <td><?php echo $show['OE'] ?></td>
            <td><?php echo $show['Custodia'] ?></td>
            <td><a href="edit.php?ids='<?php echo $show['ID_SQL'] ?>'"><button type="button" class="btn btn-succes">Modificar</button></a></td>
        </tr>
        <?php }?>
    </table>

</body>
</html>