<?php 
include("cdmx.php");
function startST(){

    session_start();

    $_SESSION['usuario'] = $userN;

    if(isset($_SESSION['usuario'])){
        echo "valido";
    }else {
        echo "invalido";
    }
}


?>