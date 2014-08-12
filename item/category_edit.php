<?php
include_once "../includes/_connect_db.php";
include_once "../includes/_sql_func.php";

$category_name = $_POST['point'];
$date = date('Y-m-d H:i:s');
$id = $_POST['id'];

$sql5 = "UPDATE category SET
            category_name='" . $category_name. "',
             update_date='". $date ."'
             WHERE id='" . $id . "' ";

$rows = mysql_query($sql5);