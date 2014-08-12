<?php

include_once "../includes/_connect_db.php";
include_once "../includes/_sql_func.php";

//----------------------------item_category_sub-------------------------------

$category_id = $_POST['category_id'];
$date = date('Y-m-d H:i:s');
$sql3 = "INSERT INTO item_category_sub (category_id, create_date)
                       VALUES('$category_id', '$date')";
$result = mysql_query($sql3);