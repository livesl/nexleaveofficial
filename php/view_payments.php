<?php

session_start();

include '../db/config.php';

$result = "SELECT
payments.id,
register.`first`,
payments.date,
payments.amount,
register.id as user_id
FROM
payments ,
register
WHERE
payments.register_id = register.id";
$sql = $db->query($result);
$data_arr = array();
$i = 0;
foreach ($sql as $r) {
   


    $data_arr[$i]['id'] = $r['id'];
    $data_arr[$i]['date'] = $r['date'];
    $data_arr[$i]['person_name'] = $r['first'];
    $data_arr[$i]['amount'] = $r['amount'];
    $data_arr[$i]['user_id'] = $r['user_id'];
    


    $i++;
}

echo json_encode($data_arr);
?>




