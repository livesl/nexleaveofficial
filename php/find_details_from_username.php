<?php

session_start();

include '../db/config.php';

//$user_namefind=$_POST["user_name"];

$result = "SELECT
register.id,
register.`first`,
register.last,
register.tp,
register.pass,
register.confirmpass,
register.basic_salory,
register.education_qualifications,
register.professional_qualifications,
register.imageurl,
register.nic,
register.dob,
register.`status`,
register.bank_name,
register.account_number
FROM
register";

$sql = $db->query($result);
$data_arr = array();
$i = 0;
foreach ($sql as $r) {
//    if ($r['status'] == "0") {
//
//        $status = "Pending";
//    } else if($r['status'] == "1"){
//
//        $status = "Approved";
//    }else if($r['status'] == "2"){
//         $status = "Rejected";
//        
//    }


    $data_arr[$i]['id'] = $r['id'];
    $data_arr[$i]['first'] = $r['first'];
    $data_arr[$i]['last'] = $r['last'];
    $data_arr[$i]['tp'] = $r['tp'];
    $data_arr[$i]['pass'] = $r['pass'];
    $data_arr[$i]['confirmpass'] = $r['confirmpass'];
    $data_arr[$i]['basic_salory'] = $r['basic_salory'];
    $data_arr[$i]['education_qualifications'] = $r['education_qualifications'];
    $data_arr[$i]['professional_qualifications'] = $r['professional_qualifications'];
    $data_arr[$i]['imageurl'] = $r['imageurl'];
    $data_arr[$i]['nic'] = $r['nic'];
    $data_arr[$i]['dob'] = $r['dob'];
    $data_arr[$i]['bank_name'] = $r['bank_name'];
    $data_arr[$i]['account_number'] = $r['account_number'];
    $data_arr[$i]['status'] = $r['status'];
   $i++;
    
}

echo json_encode($data_arr);
?>




