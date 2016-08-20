<?php

session_start();
include '../db/config.php';


$id = $_POST['id'];
$status = "2";



$updatesql = "UPDATE `leave` SET status='" . $status . "' WHERE id='" . $id . "'";

//$res =;
//echo $res;


if ($db->query($updatesql) == TRUE) {
    echo "1";
} else {

    echo "Error: " . $updatesql . "<br>" . $db->error;
}
?>

