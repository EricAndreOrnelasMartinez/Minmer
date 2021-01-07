<?php 
error_reporting(E_ALL);
ini_set('display_errors','1');
include('cndb.php');
$userN = $_POST['username'];
$pass = $_POST['pass'];
$sql = 'SELECT Contrasena FROM Users WHERE Nombre="'.$userN.'";';
$ans = mysqli_query($con,$sql);
$result = mysqli_fetch_assoc($ans);
$str = implode($result);
if($pass === $str){
    echo "Usuario valido";
}else{
    echo "Usuario Invalido";
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
    
</body>
</html>

