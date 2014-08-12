<?php

include_once "../includes/_connect_db.php";
include_once "../includes/_sql_func.php";
//----------------------------category-------------------------------

$category_name = @$_POST['point'];
$date = date('Y-m-d H:i:s');
$sql5 = "INSERT INTO category (category_name, create_date)
                       VALUES('$category_name','$date')";
$result = mysql_query($sql5);
