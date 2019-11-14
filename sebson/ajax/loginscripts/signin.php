<?php

include("../../../config.php");

$emailaddress=mysqli_real_escape_string($mysqli,$_POST['emailaddress']);
$pass=mysqli_real_escape_string($mysqli,$_POST['password']);

$password = md5($pass);


$res=$mysqli->query("SELECT * FROM sebsonadmin WHERE `emailaddress` = '$emailaddress' 
                            AND `password` = '$password'");
$rowcount = mysqli_num_rows($res);

$getdetails = $res->fetch_assoc();
$fullname = $getdetails['fullname'];
$emailaddress = $getdetails['emailaddress'];
$memberid = $emailaddress;
/*$verified = $getdetails['email_verified'];*/

ob_start();
system('ipconfig /all');
$mycom=ob_get_contents();
ob_clean();
$findme = 'physique';
$pmac = strpos($mycom, $findme);
$mac_address = substr($mycom,($pmac+33),17);


function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
        $ip_address=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
        $ip_address=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
        $ip_address=$_SERVER['REMOTE_ADDR'];
    }
    return $ip_address;

}

$ip_add = getRealIpAddr();

$today = date("Y-m-d H:i:s");



if ($rowcount == "0"){

    $mysqli->query("INSERT INTO `logs`
            (`message`,
             `logdate`,
             `emailaddress`,
             `telephone`,
             `macaddress`,
             `ipaddress`,
             `action`)
VALUES ('Email or password error after attempted login',
        '$today',
        '$emailaddress',
        '',
        '$mac_address',
        '$ip_add',
        'Failed')") or die(mysqli_error($mysqli));

    echo 3;

}

else {

    $mysqli->query("INSERT INTO `logs`
            (`message`,
             `logdate`,
             `emailaddress`,
             `telephone`,
             `macaddress`,
             `ipaddress`,
             `action`)
VALUES ('Logged in successfully',
        '$today',
        '$emailaddress',
        '',
        '$mac_address',
        '$ip_add',
        'Successful')") or die(mysqli_error($mysqli));

    $_SESSION['fullname'] = $fullname;
    $_SESSION['memberid'] = $memberid;
    $_SESSION['emailaddress'] = $emailaddress;
    $_SESSION['password'] = $pass;

    echo 1;




}










?>