<?php
include_once "../includes/_connect_db.php";
include_once "../includes/_sql_func.php";

$cat_sub_name = $_POST['sub_cat_name'];
$category_id = $_POST['category_id'];
$date = date('Y-m-d H:i:s');
$id = $_POST['id'];

$sql5 = "UPDATE category_sub SET
            name='" . $cat_sub_name. "',
            category_id=' " .$category_id. " ',
             update_date='". $date ."'
             WHERE id='" . $id . "' ";

$rows = mysql_query($sql5);