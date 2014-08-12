<?php
include_once "../includes/_connect_db.php";
include_once "../includes/_sql_func.php";
//----------------------------category_sub-------------------------------

$cat_sub_name = $_POST['sub_cat_name'];
$category_id = $_POST['category_id'];
$date = date('Y-m-d H:i:s');
$sql4 = "INSERT INTO category_sub (name, category_id, create_date)
                       VALUES('$cat_sub_name','$category_id','$date')";
$result = mysql_query($sql4);