<?php
function query_select($select, $from, $where)
{
    global $link, $bug_key;
    $query_sel = "select " . $select . " from " . $from . " " . $where;
    $res = mysql_query($query_sel) or die ("Query failed: " . mysql_error());

    return $res;
}

// size input prevents buffer overrun exploits.
function sizeinput($input, $len)
{
    (int)$len;
    (string)$input;
    $n = substr($input, 0, $len);
    $ret = trim($n);
    $out = htmlentities($ret, ENT_QUOTES);
    return $out;
}

//Check the file is of correct format.

function checkfile($input)
{

    $ext = array('mpg', 'wma', 'mov', 'flv', 'mp4', 'm4v', 'avi', 'qt', 'wmv', 'rm');
    $extfile = substr($input['name'], -4);
    $extfile = explode('.', $extfile);
    $good = array();
    $extfile = $extfile[1];
    if (in_array($extfile, $ext)) {
        $good['safe'] = true;
        $good['ext'] = $extfile;
    } else {
        $good['safe'] = false;
    }
    return $good;
}

function query_insert($ta_fi, $value)
{
    global $link, $bug_key;
    $query_ins = "insert into " . $ta_fi . " values(" . $value . ")";
    $res = mysql_query($query_ins) or die ("Query failed: " . mysql_error());

    return $res;
}

function query_update($table_name, $fie_vals, $where)
{
    global $link, $bug_key;
    $query_up = "update " . $table_name . " set " . $fie_vals . " " . $where;
    $res = mysql_query($query_up) or die ("Query failed: " . mysql_error());

    return $res;

}

function report($text)
{
    echo "<center><font class='blue11bold'><b>$text</b></font></center>";
}

function alert($text)
{
    echo "<center><font size='2' face='arial' color='#cc0000'><b>$text</b></font></center>";
}

function create_img_list()
{
    global $SITE_DOMAIN;
    $sel = "file_name,files";
    $fro = "content_images";
    $whe = "order by id asc";
    $result = query_select($sel, $fro, $whe);
    $niit = mysql_num_rows($result);
    $dd = 1;
    $java_img_list = "var tinyMCEImageList = new Array(\n";
    while ($rows = mysql_fetch_object($result)) {
        $dd++;
        $java_img_list .= "[\"" . $rows->file_name . "\",\"http://www.puma.mn/content_imgs/" . $rows->files . "\"]";
        if ($niit >= $dd) {
            $java_img_list .= ",\n";
        }
    }
    $java_img_list .= "\n);";

    $file = "_image_list.js";
    $ftp = fopen($file, "w+");
    fwrite($ftp, $java_img_list);
    fclose($ftp);
}


function query_delete($table_file, $where)
{
    global $link, $bug_key;
    $query_del = "delete from " . $table_file . " " . $where;
    $res = mysql_query($query_del) or die ("Query failed: " . mysql_error());

    return $res;
}

function query_max($field, $table, $whe)
{
    global $link, $bug_key;
    $query_max = "select " . $field . " from " . $table . " " . $whe;
    $res = mysql_query($query_max) or die ("Query failed: " . mysql_error());

    return $res;
}

function on_off($whe_id, $from, $field, $val, $chb_ids)
{
    $er1 = "";
    $fro = $from;
    $fie_val = $field . "='" . $val . "'";
    while (list(, $ids) = each($chb_ids)) {
        $whe = "where " . $whe_id . "='" . $ids . "'";
        $result = query_update($fro, $fie_val, $whe);
        if (!$result) $er1 = "err";
    }
    if ($er1 == "err") return false;
    else return true;
}

function delete($whe_id, $from, $chb_ids)
{
    $er1 = "";
    $fro = $from;
    while (list(, $ids) = each($chb_ids)) {
        $whe = "where " . $whe_id . "='" . $ids . "'";
        $result = query_delete($fro, $whe);
        if (!$result) $er1 = "err";
    }
    if ($er1 == "err") return false;
    else return true;
}

function get_image_size($part, $imgheigth, $imgwidth)
{
    $size = getimagesize("$part");
    $height = $size[1];
    $width = $size[0];
    if ($height > $imgheigth) {
        $height = $imgheigth;
        $percent = ($size[1] / $height);
        $width = ($size[0] / $percent);
    }
    if ($width > $imgwidth) {
        $width = $imgwidth;
        $percent = ($size[0] / $width);
        $height = ($size[1] / $percent);
    }
    $heigth_width = "height = " . $height . " width = " . $width;
    echo $heigth_width;
}

function next_or_pre($pr, $p, $pg_r_id)
{ // function Page next or preview
    switch ($pg_r_id) {
//--------------------------------- news page ---------------------------------------------------------
        case "news":
        {
            $pg_root = "control.php?page=news&";
            $sel = "id";
            $fro = "ptr_news";
            $whe = ""; // $query =
        }
            break;
//--------------------------------- news page ---------------------------------------------------------

//--------------------------------- partner page ---------------------------------------------------------
        case "partner":
        {
            $pg_root = "control.php?page=partner&";
            $sel = "id";
            $fro = "ptr_partner";
            $whe = ""; // $query =
        }
            break;

//--------------------------------- partner page ---------------------------------------------------------
//--------------------------------- image page ---------------------------------------------------------
        case "image":
        {
            $pg_root = "control.php?page=image&";
            $sel = "id";
            $fro = "ptr_media";
            $whe = ""; // $query =
        }
            break;

//--------------------------------- partner page ---------------------------------------------------------
        //--------------------------------- partner page ---------------------------------------------------------
        case "partner":
        {
            $pg_root = "control.php?page=partner&";
            $sel = "id";
            $fro = "ptr_partner";
            $whe = ""; // $query =
        }
            break;

//--------------------------------- partner page ---------------------------------------------------------
    }
    $result = query_select($sel, $fro, $whe); // call function query_select($sel,$fro,$whe);

    $num_page = floor(mysql_num_rows($result) / $pr);
    if ((mysql_num_rows($result) % $pr) == 0) $num_page = $num_page;
    else $num_page = $num_page + 1;
    if ($num_page > 0) { // ur dun oldvol ajillana aa huu
        if ($p == 0) $pu = $p;
        else $pu = $p - 1;
        $pd = $p + 1;
        if ($num_page == $pd) $pd = $p;
        $obj_page_links = '';
        if ($p != 0) {
            $obj_page_links .= "<a href='" . $pg_root . "p=" . $pu . "' class='black10'>< Өмнөх</a>&nbsp;";
        }
        for ($i = 1; $i <= $num_page; $i++) {
            $j = $i - 1;
            if ($p == $i - 1) $obj_page_links .= "<font class='arrow_act' id='pointer'>" . $i . "</font>&nbsp;";
            else         $obj_page_links .= "<a href='" . $pg_root . "p=" . $j . "' class='arrow_nb'>" . $i . "</a>&nbsp;";
        }
        if ($p != $pd) {
            $obj_page_links .= "&nbsp;<a href='" . $pg_root . "p=" . $pd . "' class='black10'>Дараах ></a>";
        }
    } // ur dun oldvol ajillana aa huu
    // else $obj_page_links.="????? ???????v?";
    echo $obj_page_links;
}

function get_image_h_w($part, $imgheigth, $imgwidth, $h_w)
{

    $size = getimagesize("$part");
    $height = $size[1];
    $width = $size[0];
    if ($height > $imgheigth) {
        $height = $imgheigth;
        $percent = ($size[1] / $height);
        $width = ($size[0] / $percent);
    }
    if ($width > $imgwidth) {
        $width = $imgwidth;
        $percent = ($size[0] / $width);
        $height = ($size[1] / $percent);
    }
    if ($h_w == 'h') return $height;
    else return $width;

}


function check_user_login()
{
    if (isset($_SESSION['student_email']) && isset($_SESSION['student_id']) && isset($_SESSION['student_pass'])) {
        return true;
    } else {
        return false;
    }
}

?>