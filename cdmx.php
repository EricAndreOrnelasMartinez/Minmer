<?php 
error_reporting(E_ALL);
ini_set('display_errors','1');
include('cndb.php');
$userN = $_POST['username'];
$pass = $_POST['pass'];
$sql = 'SELECT Contrasena FROM Users WHERE Nombre="'.$userN.'";';
$sql2 = 'SELECT Nombre FROM Users WHERE Nombre="'.$userN.'";';
$ans2 = mysqli_query($con, $sql2);
if($ans2->num_rows > 0){
    $ans = mysqli_query($con,$sql);
    $result = mysqli_fetch_assoc($ans);
    $str = implode($result);
    if($pass === $str){

    }else{
        header("Location:login.html");
    }
}else{
    header("Location:login.html");
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
    
    </ol>
    <table>
        <tr>
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
            <td>Custodia</td>
        </tr>    
    </table>

    <form enctype="multipart/form-data" method="post">
        Subir registro exel: <input type="file" name="myfile">
        <input type="submit" value="Subir" onclick="setFileName(<?php $_FILES['myfile']['name'] ?>)">
    </form>
</body>
</html>

