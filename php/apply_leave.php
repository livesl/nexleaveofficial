<?php

session_start();
include '../db/config.php';


$reason = $_POST['reason'];
$assignperson = $_POST['assignperson'];
$datepickerfrom = $_POST['datepickerfrom'];
$halftime = $_POST['halftime'] ;
$datepickerto = $_POST['datepickerto'];
$statusleave = "0";

$user_id = "1";

echo $halftime;
//if (isset($_POST['halftime']) && $_POST['halftime'] == "1") {
//    $halftime = 1;
//} else {
//
//    $halftime = 0;
//}


$sql = "INSERT INTO `leave`(user_id,assign_person_name,reason,leavedate_from,startdate_half,leavedate_to,status)values('" . $user_id . "','" . $assignperson . "','" . $reason . "','" . $datepickerfrom . "','" . $halftime . "','" . $datepickerto . "','" . $statusleave . "')";
//$sql = "INSERT INTO leave(user_id)value(1)";
//$res =;
//echo $res;


//if ($db->query($sql) == TRUE) {
//    echo "1";
//} else {
//
//    echo "Error: " . $sql . "<br>" . $db->error;
//}
?>

