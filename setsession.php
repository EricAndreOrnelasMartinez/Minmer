<?php 
function startST($userN){

    session_start();

    $_SESSION['usuario'] = $userN;

    if(isset($_SESSION['usuario'])){
        echo "valido";
    }else {
        echo "invalido";
    }
}
function getSession(){
    $booleanS = false;
    if(isset($_SESSION['usuario'])){
        $booleanS = true;
    }
    return $booleanS;
}


?>