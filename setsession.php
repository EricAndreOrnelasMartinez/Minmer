<?php 
$booleanS;
function startST($userN){

    session_start();

    $_SESSION['usuario'] = $userN;

    if(isset($_SESSION['usuario'])){
        echo "valido";
        $booleanS = true;
    }else {
        echo "invalido";
        $booleanS = false;
    }
}
function getSession(){
    return $booleanS;
}


?>