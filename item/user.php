<?php

include_once "../includes/_connect_db.php";
include_once "../includes/_sql_func.php";
//----------------------------USER-------------------------------

$name = @$_POST['username'];
$password = @$_POST['password'];
$email = @$_POST['email'];
$face = @$_POST['face'];
$twitt = @$_POST['twitt'];
$date = date('Y-m-d H:i:s');
$RandNumber = md5(rand(1000, 9999));
        //--------------------------img_upload---------------------------
if (@$_FILES['icon']['name'] != "") {
    if ($_FILES['icon']['size'] > 110481357612) {
        $img3_up = "error";
        $rep = "&rep=fsizennn";
    } else {
        $ext_arr = explode(".", $_FILES['icon']['name']);
        $urg3 = $ext_arr[count($ext_arr) - 1];
        $extentions = array("1", "jpeg", "JPEG", "gif", "jpg", "bmp", "JPG", "png");
        if (!array_search($urg3, $extentions)) {
            $img3_up = "error";
            $rep = "&rep=ftypennn";
        } else {
            $img3_up = "yes";
        }
    }
} else {
    $img3_up = "no";
}
if ($img3_up == "error") {

} else {
    $phone = ""; // ***
    if ($img3_up == "yes") {
        $phone = 'icon-' . $RandNumber . "." . $urg3; // ***
        $uploaddir = "../images/";
        $uploadfile = $uploaddir . $phone;
        if (!move_uploaded_file($_FILES['icon']['tmp_name'], $uploadfile)) {
            $img3_up = "error";
            $rep = "&rep=imgnnn_err";
        }
    }
}
            //---------------------------img_upload---------------------------

$sql = "INSERT INTO user (Name, Password,email,icon,Facebook_token,Twitter,Create_Date)
                       VALUES('$name','$password','$email','$phone','$face','$twitt','$date')";


$result = mysql_query($sql);
            //----------------------------shop--------------------------------
$user_id = mysql_insert_id();

$sql1 = "INSERT INTO shop (name,owner_id, Create_Date)
VALUES ('$name','$user_id','$date')";


$result = mysql_query($sql1);


