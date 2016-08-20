<?php

session_start();
include '../db/config.php';

$payment_id=$_POST['payment_id'];
$date = $_POST['date'];
$payname = $_REQUEST['payname'];
$amount = $_POST['amount'];




$username = $_SESSION['uName'];//system user name
$userr_id = 0;//career id
try {
    $selectsql = "SELECT
register.id
FROM
register
WHERE
register.`first` = '" . $payname . "'";

    foreach ($db->query($selectsql)as $row) {


        $userr_id = $row['id'];
        
    }
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
}





$sql = "UPDATE payments 
SET date='".$date."',register_id=$userr_id,amount=$amount 
WHERE id=$payment_id";
//$sql = "INSERT INTO leave(user_id)value(1)";
//$res =;
//echo $res;


if ($db->query($sql) == TRUE) {
    echo "1";
} else {

    echo "Error: " . $sql . "<br>" . $db->error;
}
?>

