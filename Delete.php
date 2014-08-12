<?php
//--------------------------img_upload---------------------------
if ($_FILES['file']['name'] != "") {
    if ($_FILES['file']['size'] > 1048123123576) {
        $img3_up = "error";
        $rep = "&rep=fsizennn";
    } else {
        $ext_arr = explode(".", $_FILES['file']['name']);
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
    $phone = $_POST['picture']; // ***
    if ($img3_up == "yes") {
        if ($phone != "") {
            if (file_exists("../upload/product/" . $phone)) {
                unlink("../upload/product/" . $phone);
            }
        }
        $phone = 'phone-' . $RandNumber . "." . $urg3; // ***
        $uploaddir = "../upload/product/";
        $uploadfile = $uploaddir . $phone;
        if (!move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
            $img3_up = "error";
            $rep = "&rep=imgnnn_err";
        }
    }
}
//---------------------------img_upload---------------------------