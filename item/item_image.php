<?php

include_once "../includes/_connect_db.php";
include_once "../includes/_sql_func.php";
//----------------------------item_image-------------------------------

$item_id = $_POST['item_id'];
$url = $_POST['url'];
$date = date('Y-m-d H:i:s');
$sql3 = "INSERT INTO item_image (item_id, url, create_date)
                       VALUES('$item_id','$url', '$date')";
$result = mysql_query($sql3);