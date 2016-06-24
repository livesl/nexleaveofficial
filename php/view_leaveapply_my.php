<?php

session_start();

include '../db/config.php';



$result = "SELECT
`leave`.id,
register.first as username,
`leave`.assign_person_name,
`leave`.reason,
`leave`.leavedate_from,
`leave`.leavedate_to,
`leave`.`status`
FROM
`leave`
INNER JOIN register ON `leave`.user_id = register.id
where
register.`first` = '".$_SESSION['uName']."' order by leave.id desc 
";

$sql = $db->query($result);
$data_arr = array();
$i = 0;
foreach ($sql as $r) {
    if ($r['status'] == "0") {

        $status = "Pending";
    } else {

        $status = "Approved";
    }


    $data_arr[$i]['id'] = $r['id'];
   
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




