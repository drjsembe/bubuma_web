<?php
include_once "../includes/_connect_db.php";
include_once "../includes/_sql_func.php";


$category_id = $_POST['category_id'];
$date = date('Y-m-d H:i:s');
$id = $_POST['id'];

$sql5 = "UPDATE item_category_sub SET
            category_id='" . $category_id. "',
            update_date='". $date ."'
            WHERE id='" . $id . "' ";

$rows = mysql_query($sql5);