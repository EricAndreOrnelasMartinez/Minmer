<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="post">
        <h3>Wellcome</h3>
        <input type="text" name="username" id="1" placeholder="Nombre de usuario">
        <input type="password" name="pass" id="2" placeholder="Contraseña">
        <input type="submit" value="Login">
    
    </form>
</body>
</html>
<?php 
error_reporting(E_ALL);
ini_set('display_errors','1');
$con = mysqli_connect("localhost","root","Lasric.2018","Minmer");
$userN = $_POST['username'];
$pass = $_POST['pass'];
$sql = 'SELECT Contrasena FROM Users WHERE Nombre="'.$userN.'";';
$sql2 = 'SELECT Nombre FROM Users WHERE Nombre="'.$userN.'";';
$ans2 = mysqli_query($con, $sql2);
$ans = mysqli_query($con,$sql);
$result = mysqli_fetch_assoc($ans);
$str = implode($result);
if(isset($_POST['username'])){
if(!isset($_SESSION['user']) && !empty($userN) && !empty($pass) ){
    if($pass === $str){
        session_start();
        $_SESSION['user'] = $userN;
        header("Location:cdmx.php");
    }else{
        header("Location:index.php");
    }
}else{
    header("Location:index.php");
}
}



?>