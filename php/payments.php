<?php

session_start();
include '../db/config.php';


$date = $_POST['date'];
$payname = $_REQUEST['payname'];


$amount = $_POST['amount'];

$status = "1";



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





$sql = "INSERT INTO payments(amount,date,register_id,user,status)values('" . $amount . "','" . $date . "', $userr_id,'" . $username . "','" . $status . "')";
//$sql = "INSERT INTO leave(user_id)value(1)";
//$res =;
//echo $res;


if ($db->query($sql) == TRUE) {
    echo "1";
} else {

    echo "Error: " . $sql . "<br>" . $db->error;
}
?>

