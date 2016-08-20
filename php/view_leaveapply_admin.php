<?php

session_start();

include '../db/config.php';

$result = "SELECT
        `leave`.id,
        `leave`.reason,
        `leave`.leavedate_from,
        `leave`.startdate_half,
        `leave`.leavedate_to,
        `leave`.`status`,
        `leave`.`assign_person_name`,
        register.`first` as username
        

        FROM
        `leave`
        INNER JOIN register ON `leave`.user_id = register.id ORDER BY
`leave`.id DESC";
$sql = $db->query($result);
$data_arr = array();
$i = 0;
foreach ($sql as $r) {
     if ($r['status'] == "0") {

        $status = "Pending";
    } else if($r['status'] == "1"){

        $status = "Approved";
    }else if($r['status'] == "2"){
         $status = "Rejected";
        
    }

    $data_arr[$i]['id'] = $r['id'];
    $data_arr[$i]['name'] = $r['username'];
    $data_arr[$i]['assign_person_name'] = $r['assign_person_name'];
    $data_arr[$i]['reason'] = $r['reason'];
    $data_arr[$i]['leavedate_from'] = $r['leavedate_from'];
    $data_arr[$i]['leavedate_to'] = $r['leavedate_to'];
    $data_arr[$i]['status'] = $status;
    ;


    $i++;
}

echo json_encode($data_arr);
?>




