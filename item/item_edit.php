<?php
include_once "../includes/_connect_db.php";
include_once "../includes/_sql_func.php";

$shop_id = @$_POST['shop_id'];
$item_name = @$_POST['item_name'];
$brand_name = @$_POST['brand_name'];
$price = @$_POST['price'];
$point = @$_POST['point'];
$status = @$_POST['status'];
$date = date('Y-m-d H:i:s');
$id = $_POST['id'];

$sql5 = "UPDATE item SET
            shop_id='" . $shop_id. "',
            name='" . $item_name. "',
            brand_name =' " .$brand_name. " ',
            price='" . $price. "',
            point =' " .$point. " ',
            status =' " .$status. " ',
            update_date='". $date ."'
            WHERE id='" . $id . "' ";

$rows = mysql_query($sql5);