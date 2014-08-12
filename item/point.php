<?php

include_once "../includes/_connect_db.php";
include_once "../includes/_sql_func.php";
//----------------------------point-------------------------------

$value = $_POST['point'];
$sender_id = $_POST['sender_id'];
$receiver_id = $_POST['receiver_id'];
$item_id = $_POST['item_id'];
$date = date('Y-m-d H:i:s');
$sql4 = "INSERT INTO point (value, sender_id, receiver_id, item_id, create_date)
                       VALUES('$value','$sender_id','$receiver_id','$item_id','$date')";
$result = mysql_query($sql4);