<?php 

    session_start();

    $usuaroS = $_SESSION['dev'];

    $status = false;

    if(isset($usuaroS)){
        $status = true;
        echo "sessión empezada";
    }

