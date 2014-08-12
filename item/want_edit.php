<?php
include_once "../includes/_connect_db.php";
include_once "../includes/_sql_func.php";

$user_id = $_POST['user_id'];
$item_id = $_POST['item_id'];
$date = date('Y-m-d H:i:s');
$id = $_POST['id'];

$sql5 = "UPDATE want SET
            user_id='" . $user_id. "',
            item_id='" . $item_id. "',
            update_date ='". $date ."'
            WHERE id='" . $id . "' ";

$rows = mysql_query($sql5);
