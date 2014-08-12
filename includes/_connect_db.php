<?php
$host = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "bubuma_db";
$currency = '$';
$SITE_DOMAIN = "http://mrpizza.mn";
//   $SITE_DOMAIN = "http://192.168.1.19/mxpizza";
$link = mysql_connect($host, $dbuser, $dbpassword) or die ("Sorry could not connect to MySQL ..." . mysql_error());
mysql_select_db($dbname) or die ("Sorry could not select database ..." . mysql_error());
mysql_set_charset('utf8', $link);
$CLIENT_IP = (!empty($HTTP_SERVER_VARS['REMOTE_ADDR'])) ? $HTTP_SERVER_VARS['REMOTE_ADDR'] : ((!empty($HTTP_ENV_VARS['REMOTE_ADDR'])) ? $HTTP_ENV_VARS['REMOTE_ADDR'] : getenv('REMOTE_ADDR'));
$host = $_SERVER['HTTP_HOST'];
$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
date_default_timezone_set("Asia/Ulan_Bator");

?>