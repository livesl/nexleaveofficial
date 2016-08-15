<?php

session_start();
include '../db/config.php';


$reason = $_POST['reason'];
$assignperson = $_POST['assignperson'];
$datepickerfrom = $_POST['datepickerfrom'];
$halftime = $_POST['halftime'];
$datepickerto = $_POST['datepickerto'];
$statusleave = "0";

$user_id = 0;
$username = $_SESSION['uName'];

try {
$selectsql = "SELECT
register.id
FROM
register
WHERE
register.`first` = '" . $assignperson . "'";

foreach ($db->query($selectsql)as $row){
    
        
        $user_id=$row['id'] ;
   
    
}
    
    
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
}





$sql = "INSERT INTO `leave`(user_id,assign_person_name,reason,leavedate_from,startdate_half,leavedate_to,status)values('" . $user_id . "','" . $assignperson . "','" . $reason . "','" . $datepickerfrom . "','" . $halftime . "','" . $datepickerto . "','" . $statusleave . "')";
//$sql = "INSERT INTO leave(user_id)value(1)";
//$res =;
//echo $res;


if ($db->query($sql) == TRUE) {
    echo "1";
} else {

    echo "Error: " . $sql . "<br>" . $db->error;
}
?>

