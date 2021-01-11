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
    <link rel="stylesheet" href="estilos.css">
    <title>Document</title>
</head>
<body>
    <form action="nuevor.php" method="post">
    <?php
    $con = mysqli_connect("localhost","root","Lasric.2018","Minmer");
    ?>
    <select name="DB">
        <option value="CDMX">CDMX</option>
        <option value="GDL">GDL</option>
        <option value="MTY">MTY</option>
        <option value="CUN">CUN</option>
        <option value="SJD">SJD</option>
        <option value="QRO">QRO</option>
    </select>
    Fecha de carga: <input type="text" name="FechaC" ><br>
    Fecha de entrega: <input type="text" name="FechaE"><br>
    Operador: <input type="text" name="Operador"><br>
    Placas: <input type="text" name="Placas"><br>
    ID: <input type="text" name="ID"><br>
    SO: <input type="text" name="OS"><br>
    Factura: <input type="text" name="Factura"><br>
    Cliente: <input type="text" name="Cliente"><br>
    PZS: <input type="text" name="PZS" ><br>
    Cajas: <input type="text" name="Caja"><br>
    Subtotal: <input type="text" name="Subtotal"><br>
    Horario: <input type="text" name="Horario">:00<br>
    Direccion: <input type="text" name="Direccion"><br>
    Destino: <input type="text" name="Destino" ><br>
    Concepto: <input type="text" name="Concepto"><br>
    Capacidad: <input type="text" name="Capacidad"><br>
    Observaciones: <input type="text" name="Observaciones"><br>
    OE: <input type="text" name="OE"><br>
    Custodia: <input type="text" name="Custodia"><br>
    <input type="hidden" name="ID_SQL" value="<?php echo $tem_id;  ?>">
    <input type="submit" value="Guardar">
    </form>
    <form enctype="multipart/form-data" method="post">
        Subir registro exel: <input type="file" name="myfile">
        <link rel="stylesheet" href="cssforT.css">
        <input type="submit" value="Subir">
    </form>
    <?php $con->close(); ?>
</body>
</html>
<?php 
error_reporting(E_ALL);
ini_set('display_errors','1');
if(isset($_FILES) && isset($_FILES['myfile']) && !empty($_FILES['myfile']['name']) && !empty($_FILES['myfile']['tmp_name'])){
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
    //echo "working yet";
    readAndCDMX($_FILES['myfile']['name']);
}
?>
<?php 

if(isset($_POST['FechaC'])){
    $horarioT = 'falló';
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
    $ciudad = $_POST['DB'];
    $sqlUpdate = "";
    if($ciudad == "CDMX"){
        $sqlUpdate = "INSERT INTO $ciudad(FechaC,FechaE,Operador,Placas,ID,SO,Factura,Cliente,PZS,Caja,Subtotal,Horario,Direccion,Destino,Concepto,Capacidad,Observaciones,OE,Custodia) VALUES('$FechaC','$FechaE','$Operador','$Placas','$ID','$SO','$Factura','$Cliente','$PZS','$Cajas','$Subtotal','$HorarioT','$Direccion','$Destino','$Concepto','$Capacidad','$Observaciones','$OE','$Custodia');";
    }else{
        $sqlUpdate = "INSERT INTO $ciudad(FechaC,FechaE,Operador,Placas,ID,OS,Factura,Cliente,PZS,Caja,Subtotal,Horario,Direccion,Destino,Concepto,Capacidad,Observaciones,OE,Custodia) VALUES('$FechaC','$FechaE','$Operador','$Placas','$ID','$SO','$Factura','$Cliente','$PZS','$Cajas','$Subtotal','$HorarioT','$Direccion','$Destino','$Concepto','$Capacidad','$Observaciones','$OE','$Custodia');";
    }
    $resulupdate = mysqli_query($con2,$sqlUpdate) or die(mysqli_error($con2));
    if($resulupdate){
       // echo "Perfecto eres un crack";
    }else {
        //echo "ota vez te equivocaste por pendejo";
    }
    $con2->close();
    header("Location:cdmx.php");
}




?>