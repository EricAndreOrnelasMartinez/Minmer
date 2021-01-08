<?php 
error_reporting(E_ALL);
ini_set('display_errors','1');
$userN = 'd';
$pass = 'd';
function startST($user_N ,$pas_s){
    $userN = $user_N;
    $pass = $pas_s;
}

function getU(){
    return $userN;
}
function getP(){
    return $pass;
}


?>