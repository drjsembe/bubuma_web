<?php
include_once "../includes/_connect_db.php";
include_once "../includes/_sql_func.php";
//----------------------------order-------------------------------

$item_id = $_POST['item_id'];
$user_id = $_POST['user_id'];
$status = $_POST['status_id'];
$date = date('Y-m-d H:i:s');
$sql4 = "INSERT INTO order_1 (item_id, user_id, status, create_date)
                       VALUES('$item_id','$user_id','$status','$date')";
$result = mysql_query($sql4);