<?php 
error_reporting(E_ALL);
ini_set('display_errors','1');
echo "todo bien";
include('cndb.php');
echo "todo bien 2";
$userN = $_POST['username'];
$pass = $_POST['pass'];
$sql = 'SELECT Contrasena FROM Users WHERE Nombre="'.$userN.'";';
$ans = mysqli_query($con,$sql);
$booleanR = false;
if($ans){
while($result = mysqli_fetch_array($ans)){
    $str = implode($result);
    if($pass === $str){
        $booleanR = true;
    }
}
}
if($booleanR){
    echo "Usuario valido";
}else{
    echo "Usuario invalido";
}
echo "todo bien 3";
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