<?php

date_default_timezone_set('UTC');

$mysqli= new mysqli('localhost','u349494272_root','Is0205737464','u349494272_cvsi');
if($mysqli->connect_errno){
    echo"cannot connect MYSQLI error no{$mysqli->connect_errno}:{$mysqli->connect_errno}";
    exit();
}
session_start();

$reg_root = 'https://member.cvsiworld.net/';


function lock($item){

    return base64_encode(base64_encode(base64_encode($item)));
}
function unlock($item){

    return base64_decode(base64_decode(base64_decode($item)));
}

?>


