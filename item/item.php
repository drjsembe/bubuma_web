<?php

include_once "../includes/_connect_db.php";
include_once "../includes/_sql_func.php";

//------------------------------item------------------------------
$shop_id = @$_POST['shop_id'];
$item_name = @$_POST['item_name'];
$brand_name = @$_POST['brand_name'];
$price = @$_POST['price'];
$point = @$_POST['point'];
$status = @$_POST['status'];
$date = date('Y-m-d H:i:s');
$sql2 = "INSERT INTO item (shop_id, name, brand_name, price, point, status, create_date)
                       VALUES('$shop_id','$item_name','$brand_name','$price','$point','$status','$date')";


$result = mysql_query($sql2);






