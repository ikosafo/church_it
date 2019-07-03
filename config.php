<?php

date_default_timezone_set('UTC');

$mysqli= new mysqli('localhost:3308','root','root','church_it');
if($mysqli->connect_errno){
    echo"cannot connect MYSQLI error no{$mysqli->connect_errno}:{$mysqli->connect_errno}";
    exit();
}
session_start();

$reg_root = 'http://church.local';


function lock($item){

    return base64_encode(base64_encode(base64_encode($item)));
}
function unlock($item){

    return base64_decode(base64_decode(base64_decode($item)));
}


function curl_get_contents($url)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

function sendSMS($message, $phone)
{
    $sender = $_POST['title'];
    $key = "MlEnpAUwzvRKOtVVun169uyPT";
    $url = "http://bulk.mnotify.net/smsapi?key=" . $key . "&to=" . $phone . "&msg=" . urlencode($message) . "&sender_id=" . $sender;
    $response = file_get_contents($url);
}


?>

