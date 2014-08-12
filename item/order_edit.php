<?php
include_once "../includes/_connect_db.php";
include_once "../includes/_sql_func.php";

$item_id = $_POST['item_id'];
$user_id = $_POST['user_id'];
$status = $_POST['status_id'];
$date = date('Y-m-d H:i:s');
$id = $_POST['id'];

$sql5 = "UPDATE order_1 SET
            item_id='" . $item_id. "',
            user_id ='" . $user_id. "',
            status ='" . $status. "',
            update_date ='". $date ."'
            WHERE id='" . $id . "' ";

$rows = mysql_query($sql5);