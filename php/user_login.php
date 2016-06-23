<?php

session_start();
include '../db/config.php';


$uName = $_POST['username'];
$pWord = $_POST['password'];
$result = "SELECT
register.`first`,
register.pass
FROM
register
WHERE
register.`first` = '" . $uName . "' AND
register.pass = '" . $pWord . "' ";

//$res =;
//echo $res;


foreach ($db->query($result)as $row) {

    if ($row['first'] != NULL) {
        echo 1;
        $_SESSION['uName'] = $uName;
    } else {

        echo 0;
    }
//    echo $_SESSION['uName'];
}
?>




