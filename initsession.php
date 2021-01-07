<?php 

    session_start();

    $usuaroS = $_SESSION['var'];

    $status = false;

    if(isset($usuaroS)){
        $status = true;
    }

?>