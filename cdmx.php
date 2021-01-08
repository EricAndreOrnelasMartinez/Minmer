<?php 
include("setsession.php");

if(!$booleanS){
    header("index.php");
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
    <div>
    

    </div>
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
        $petition = 'SELECT * FROM CDMX';
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
            <td><?php echo $show['SO'] ?></td>
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
        </tr> 
        <?php }?>
    </table>

    <form enctype="multipart/form-data" method="post">
        Subir registro exel: <input type="file" name="myfile">
        <input type="submit" value="Subir">
    </form>
</body>
</html>
<?php 
error_reporting(E_ALL);
ini_set('display_errors','1');
$reUserN = $_SESSION['usuario'];
if(isset($_FILES) && isset($_FILES['myfile']) && !empty($_FILES['myfile']['name']) && !empty($_FILES['myfile']['tmp_name'])){
    session_start();
    $_SESSION['usuario'] = $reUserN;

    if(!is_uploaded_file($_FILES['myfile']['tmp_name'])){
        echo "Error: el fichero no fue procesado correctamente";
    }

    $source = $_FILES['myfile']['tmp_name'];
    $destination = __DIR__.'/uploads/'.$_FILES['myfile']['name'];

    if( is_file($destination)){
        echo "Error: fichero existente";
        @unlink(ini_get('upload_tmp_dir').$_FILES['myfile']['tmp_name']);
        exit;
    }
    if( ! @move_uploaded_file($source, $destination)){
        echo "Error: el fichero no se pudo mover a la carpeta destino ".$destination;
        @unlink(ini_get('upload_tmp_dir').$_FILES['myfile']['tmp_name']);
        exit;
    }
   

    echo "Se completo correctamente!! ||";
    echo $_FILES['myfile']['name'];
    include('readXLSX.php');
    echo "working yet";
    readAndCDMX($_FILES['myfile']['name']);
}
?>
