<?php

include("../../../config.php");


$full_name = mysqli_real_escape_string($mysqli,$_POST['full_name']);
$username = mysqli_real_escape_string($mysqli,$_POST['username']);
$user_branch = mysqli_real_escape_string($mysqli,$_POST['user_branch']);
$password = md5(mysqli_real_escape_string($mysqli,$_POST['password']));

$res=$mysqli->query("select * from users where `username` = '$username'");
$rowcount = mysqli_num_rows($res);


if ($rowcount == "0"){



    $mysqli->query("INSERT INTO `users`
            (`fullname`,
             `username`,
             `password`,
             `branch`)
VALUES ('$full_name',
        '$username',
        '$password',
        '$user_branch')")
    or die(mysqli_error($mysqli));

    echo 1;

}

else {


    echo 2;

}










?>