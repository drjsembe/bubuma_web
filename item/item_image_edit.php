<?php
include_once "../includes/_connect_db.php";
include_once "../includes/_sql_func.php";


$item_id = $_POST['item_id'];
$url = $_POST['url'];
$date = date('Y-m-d H:i:s');
$id = $_POST['id'];

$sql5 = "UPDATE item_image SET
            item_id='" . $item_id. "',
            url ='" . $url. "',
            update_date ='". $date ."'
            WHERE id='" . $id . "' ";

$rows = mysql_query($sql5);