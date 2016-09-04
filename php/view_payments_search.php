<?php

session_start();

include '../db/config.php';
$data_back = json_decode(file_get_contents("php://input"));

$date_from=$data_back->date_from_pay;
$date_to=$data_back->date_to_pay;
$emp_name=$data_back->employee_name;
//$date_from=$_REQUEST['date_from_pay'];
//$date_to=$_REQUEST['date_to_pay'];
//$emp_name=$_REQUEST['employee_name'];

$result = "SELECT
payments.id,
payments.date,
payments.amount

FROM
payments ,
register
WHERE
payments.register_id = register.id AND
payments.date BETWEEN '".$date_from."' AND '".$date_to."' AND
register.`first` = '".$emp_name."'
ORDER BY
payments.date DESC
";

$sql = $db->query($result);
$data_arr = array();
$data_set=[];
$i = 0;
$total=0;
foreach ($sql as $r) {
   

    $data_set[$i]['id']=$r['id'];
    $data_set[$i]['date'] = $r['date'];
    $data_set[$i]['amount'] = $r['amount'];
    $total=$total+$r['amount'];
   
    $i++;
}
$data_arr['data_set']=$data_set;
$data_arr['total']=$total;
echo json_encode($data_arr);
?>




