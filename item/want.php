<?php

include_once "../includes/_connect_db.php";
include_once "../includes/_sql_func.php";
//----------------------------want-------------------------------

$user_id = $_POST['user_id'];
$item_id = $_POST['item_id'];
$date = date('Y-m-d H:i:s');
$sql3 = "INSERT INTO want (user_id, item_id, create_date)
                       VALUES('$user_id','$item_id','$date')";
$result = mysql_query($sql3);