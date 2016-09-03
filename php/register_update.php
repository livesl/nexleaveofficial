<?php

session_start();
include '../db/config.php';


$empid = $_POST['user_id'];
$first = $_POST['first'];
$last = $_POST['last'];
$tp = $_POST['tp'];
$pass = $_POST['pass'];
$passmatch = $_POST['passmatch'];
$nic = $_POST['nic'];
$dob = $_POST['datepickerfromdob'];
$eduqlf = $_POST['eduqlf'];
$proqlf = $_POST['proqlf'];
$salory = $_POST['salory'];
$bankname = $_POST['bankname'];
$accountno = $_POST['accountno'];
//$image = $_POST['image_user'];
//$status = "0";


//$sql = "UPDATE register
//        SET first='$first',last= $last,tp=$tp,basic_salory='$salory',education_qualifications='$eduqlf', professional_qualifications=$proqlf, nic='$nic',dob='$dob', bank_name='$bankname',account_number='$accountno'
//        WHERE id= '$empid'";
$sql = "UPDATE register
        SET first='$first',last='$last',tp='$tp',basic_salory='$salory',education_qualifications='$eduqlf',professional_qualifications='$proqlf',nic='$nic',dob='$dob',bank_name='$bankname',account_number='$accountno'
        WHERE id= '$empid'";


if ($db->query($sql) == TRUE) {
    echo "1";
} else {

    echo "Error: " . $sql . "<br>" . $db->error;
}


?>

