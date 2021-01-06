<?php 

include('cndb.php');

$userN = $_POST['username'];
$pass = $_POST['pass'];
$sql = 'SELECT Contrasena FROM Users WHERE Nombre="'.$userN;
$ans = mysqli_query($con,$sql);
echo $ans;





?>