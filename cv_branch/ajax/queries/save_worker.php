<?php

include('../../../config.php');


$memberid = mysqli_real_escape_string($mysqli, $_POST['memberid']);
$branch = $_SESSION['branch'];

$mysqli->query("INSERT INTO `church_worker`
            (
            `memberid`,
            `branch`
            )
            
VALUES (
          '$memberid',
          '$branch'
          )")

or die(mysqli_error($mysqli));

echo 1;



?>