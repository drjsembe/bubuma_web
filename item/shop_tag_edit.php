<?php
include_once "../includes/_connect_db.php";
include_once "../includes/_sql_func.php";

$shop_id = $_POST['shop_id'];
$tag_id = $_POST['tag_id'];
$date = date('Y-m-d H:i:s');
$id = $_POST['id'];

$sql5 = "UPDATE shop_tag SET
            shop_id='" . $shop_id. "',
            tag_id ='" . $tag_id. "',
            update_date ='". $date ."'
            WHERE id='" . $id . "' ";

$rows = mysql_query($sql5);