<?php
include_once "../includes/_connect_db.php";
include_once "../includes/_sql_func.php";
//----------------------------category_sub-------------------------------

$shop_id = $_POST['shop_id'];
$tag_id = $_POST['tag_id'];
$date = date('Y-m-d H:i:s');
$sql4 = "INSERT INTO shop_tag (shop_id, tag_id, create_date)
                       VALUES('$shop_id','$tag_id','$date')";
$result = mysql_query($sql4);