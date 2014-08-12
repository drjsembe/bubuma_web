<?php
include_once "../includes/_connect_db.php";
include_once "../includes/_sql_func.php";

$tag_name = $_POST['tag_name'];
$date = date('Y-m-d H:i:s');
$id = $_POST['id'];

$sql5 = "UPDATE tag SET
            tag_name='" . $tag_name. "',
            update_date ='". $date ."'
            WHERE id='" . $id . "' ";

$rows = mysql_query($sql5);
