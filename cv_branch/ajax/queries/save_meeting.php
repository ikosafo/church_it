<?php

include('../../../config.php');


$membername = mysqli_real_escape_string($mysqli, $_POST['membername']);
$memberperiod = mysqli_real_escape_string($mysqli, $_POST['memberperiod']);
$men = mysqli_real_escape_string($mysqli, $_POST['men']);
$women = mysqli_real_escape_string($mysqli, $_POST['women']);
$guys = mysqli_real_escape_string($mysqli, $_POST['guys']);
$ladies = mysqli_real_escape_string($mysqli, $_POST['ladies']);
$children = mysqli_real_escape_string($mysqli, $_POST['children']);
$offering = mysqli_real_escape_string($mysqli, $_POST['offering']);
$branch = $_SESSION['branch'];

$period = date("Y-m-d H:i:s");


$mysqli->query("INSERT INTO `meeting`
            (`membername`,
             `men`,
             `women`,
             `ladies`,
             `guys`,
             `children`,
             `offering`,
             `branch`,
             `periodstarted`,
             `periodclosed`)
VALUES ('$membername',
        '$men',
        '$women',
        '$ladies',
        '$guys',
        '$children',
        '$offering',
        '$branch',
        '$periodstarted',
        '$periodclosed')")
or die(mysqli_error($mysqli));

echo 1;


?>