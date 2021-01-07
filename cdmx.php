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
    echo "Usuario valido";
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
    
</body>
</html>

