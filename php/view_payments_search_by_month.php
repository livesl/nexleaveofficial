<?php

session_start();

include '../db/config.php';
$data_back = json_decode(file_get_contents("php://input"));

//print_r($data_back);
$emp_name=$data_back->employee_name;

$emp_month=$data_back->month_name;
//$date_from=$_REQUEST['date_from_pay'];
//$date_to=$_REQUEST['date_to_pay'];
//$emp_name=$_REQUEST['employee_name'];

$result = "SELECT
payments.id,
payments.date,
payments.amount,
MONTHNAME(date),
YEAR(date)
FROM
payments ,
register
WHERE
MONTHNAME(date) = '".$emp_month."' AND
YEAR(date) = 2016 AND
payments.register_id = register.id AND
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




