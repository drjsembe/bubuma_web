<?php
include_once "../includes/_connect_db.php";
include_once "../includes/_sql_func.php";
//----------------------------category_sub-------------------------------

$tag_name = $_POST['tag_name'];
$date = date('Y-m-d H:i:s');
$sql4 = "INSERT INTO tag (tag_name, create_date)
                       VALUES('$tag_name','$date')";
$result = mysql_query($sql4);