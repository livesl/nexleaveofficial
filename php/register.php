<?php

session_start();
include '../db/config.php';


$first = $_POST['first'];
$last = $_POST['last'];
$tp = $_POST['tp'];
$pass = $_POST['pass'];
$passmatch = $_POST['passmatch'];
$nic = $_POST['nic'];
$dob = $_POST['dob'];
$eduqlf = $_POST['eduqlf'];
$proqlf = $_POST['proqlf'];
$salory = $_POST['salory'];
$image = $_POST['image_user'];
$status= "1";



$sql = "INSERT INTO register(first,last,tp,pass,confirmpass,basic_salory,education_qualifications,professional_qualifications,"
        . "image,nic,dob,status)values('".$first."','".$last."','".$tp."','".$pass."','".$passmatch."','".$salory."','".$eduqlf."','".$proqlf."','".$image."','".$nic."','".$dob."','".$status."') ";

//$res =;
//echo $res;


if($db->query($sql)==TRUE){
    echo "1";
    
}else{
    
    echo "Error: " . $sql . "<br>" . $db->error;
}

?>

