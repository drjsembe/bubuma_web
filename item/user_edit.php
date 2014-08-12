<?php
include_once "../includes/_connect_db.php";
include_once "../includes/_sql_func.php";

$name = @$_POST['username'];
$password = @$_POST['password'];
$email = @$_POST['email'];
$face = @$_POST['face'];
$twitt = @$_POST['twitt'];
$RandNumber = md5(rand(1000, 9999));
$date = date('Y-m-d H:i:s');
$id = $_POST['id'];
//--------------------------img_upload---------------------------
if ($_FILES['icon']['name'] != "") {
    if ($_FILES['icon']['size'] > 1048123123576) {
        $img3_up = "error";
        $rep = "&rep=fsizennn";
    } else {
        $ext_arr = explode(".", $_FILES['icon']['name']);
        $urg3 = $ext_arr[count($ext_arr) - 1];
        $extentions = array("1", "gif", "jpg", "bmp", "JPG", "png");
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
    // header("location: control.php?page=banner");
} else {
   $phone = @$_POST['icon']; // ***
    if ($img3_up == "yes") {
        if ($phone != "") {
            if (file_exists("../images" . $phone)) {
                unlink("../images/" . $phone);
            }
        }
        $phone = 'edit-' . $RandNumber . "." . $urg3; // ***
        $uploaddir = "../images/";
        $uploadfile = $uploaddir . $phone;
        if (!move_uploaded_file($_FILES['icon']['tmp_name'], $uploadfile)) {
            $img3_up = "error";
            $rep = "&rep=imgnnn_err";
        }
    }
}


$sql5 = "UPDATE user SET
            name='" . $name. "',
            password='" . $password. "',
            email='" . $email. "',
            icon='" . $phone. "',
            facebook_token='" . $face. "',
            twitter='" .$twitt. "',
            update_date ='". $date ."'
            WHERE id='" . $id . "' ";

$rows = mysql_query($sql5);