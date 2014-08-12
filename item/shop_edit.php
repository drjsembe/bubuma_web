<?php
include_once "../includes/_connect_db.php";
include_once "../includes/_sql_func.php";

$name = $_POST['shop_name'];
$owner_id = $_POST['owner_id'];
$date = date('Y-m-d H:i:s');
$id = $_POST['id'];

$sql5 = "UPDATE shop SET
            name='" . $name. "',
            owner_id='" . $owner_id. "',
            update_date ='". $date ."'
            WHERE id='" . $id . "' ";

$rows = mysql_query($sql5);