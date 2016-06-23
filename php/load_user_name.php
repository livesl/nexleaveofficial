<?php

include '../db/config.php';

$result = "select id,first from register";
$sql = $db->query($result);
$data_arr = array();
$i = 0;
while ($r = mysqli_fetch_array($sql)) {

    $data_arr[$i]['id'] = $r['id'];
    $data_arr[$i]['name'] = $r['first'];
    $i++;
}

echo json_encode($data_arr);
?>




