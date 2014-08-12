<?php
include_once "../includes/_connect_db.php";
include_once "../includes/_sql_func.php";

$value = $_POST['point'];
$sender_id = $_POST['sender_id'];
$receiver_id = $_POST['receiver_id'];
$item_id = $_POST['item_id'];
$date = date('Y-m-d H:i:s');
$id = $_POST['id'];

$sql5 = "UPDATE point SET
            value='" . $value. "',
            sender_id ='" . $sender_id. "',
            receiver_id ='" . $receiver_id. "',
            item_id ='" . $item_id. "',
            update_date ='". $date ."'
            WHERE id='" . $id . "' ";

$rows = mysql_query($sql5);