<?php
$test = $_POST['']

$sql2 = "UPDATE ps_img SET delete_request='" . $delete_rq . "', created_date='". $date ."' WHERE picture_file='" . $pic . "' ";

$rows = mysql_query($sql2);