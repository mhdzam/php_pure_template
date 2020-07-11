<?php

if (@$run_if_included) { 
$pd_ip = $_SERVER['REMOTE_ADDR']; 
$currentFile = $_SERVER["PHP_SELF"]; 
$parts = Explode('/', $currentFile); 
$pd_current_page_php = $parts[count($parts) - 1]; 
$pd_current_date = date('Y-m-d', $_SERVER['REQUEST_TIME']); 
$pd_current_date_long = date('Y-m-d h:i A', $_SERVER['REQUEST_TIME']); 
$allowed_imgs_type = array(".gif", ".jpeg", ".png", ".jpg"); 
$allowed_attachfile_type = array(".gif", ".jpeg", ".png", ".jpg", ".rar", ".zip", ".txt", ".psd", ".doc", ".docx", ".pdf"); 
$item_per_page = 10; 
$products_per_page = 15; 
$topics_images_path = "./uploads/topics/"; 
$sections_images_path = "./uploads/sections/"; 
$items_images_path = "./uploads/items/"; 
$banars_images_path = "./uploads/baners/"; 
$default_image_path = "./uploads/default.png"; 
// to get the YouTube video ID from page link 
Function getYouTubeID($URL) { 
	$VideoID = ""; 
	$YouTubeCheck = preg_match('![?&]{1}v=([^&]+)!', $URL . '&', $Data); 
	If ($YouTubeCheck) { 
	$VideoID = $Data[1]; 
	}
	Return $VideoID;
 }
// to get any file size 
Function GetFileSize($path) { 
	$bytes = sprintf('%u', filesize($path)); 
	if ($bytes > 0) { 
	$unit = intval(log($bytes, 1024)); 
	$units = array('B', 'KB', 'MB', 'GB'); 
	if (array_key_exists($unit, $units) === true) { 
		return sprintf('%d %s', $bytes / pow(1024, $unit), $units[$unit]); 
	}
	}
	return $bytes; 
} 
// Format DateTime 
Function FormatDateTime($datetime) { 
	global $pd_current_date; 
	$dtformated = ""; 
	if ($datetime != "") { 
	$day_mm = date('Y-m-d', strtotime($datetime)); 
	if ($day_mm == $pd_current_date) { 
		$dtformated = date('h:i A', strtotime($datetime));
	 } else { 
		$dtformated = date('d-m-Y', strtotime($datetime));
	 }
	 }
	 return $dtformated;
 }
Function FormatDateForView($datetime) { 
	global $pd_current_date; 
	$dtformated = ""; 
	if ($datetime != "") { 
	$day_mm = date('Y-m-d', strtotime($datetime)); 
	$dtformated = date('d M Y', strtotime($datetime));
	 }
	 return $dtformated;
 }
// Format DateTime Long 
Function FormatDateTimeLong($datetime) { 
	global $pd_current_date; 
	$dtformated = ""; 
	if ($datetime != "") { 
	$day_mm = date('Y-m-d', strtotime($datetime)); 
	if ($day_mm == $pd_current_date) { 
	$dtformated = 'Today ' . date('h:i A', strtotime($datetime));
	 } else { 
	 $dtformated = date('d-m-Y h:i A', strtotime($datetime));
	 }
	 }
	 return $dtformated;
	 }
 }
// Share links 
Function shareForSocial($social, $title) { 
	$shareLink = ""; $URL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 
	switch ($social) { 
	case "facebook": $shareLink = "https://www.facebook.com/sharer/sharer.php?u=" . urlencode($URL); 
	break; case "twitter": $shareLink = "https://twitter.com/intent/tweet?text=$title&url=" . urlencode($URL); 
	break;
	case "linkedin": $shareLink = "http://www.linkedin.com/shareArticle?mini=true&url=" . urlencode($URL) . "&title=$title"; 
	break; 
	case "tumblr": $shareLink = "http://www.tumblr.com/share/link?url=". urlencode($URL); 
	break; 
	} 
	Return $shareLink;
} 
function currency_convert($amount, $tocurrency) { 
	global $prefix, $curr; 
	if ($amount != "" && $amount > 0) { 
	$sql1_curr2 = mysql_query("SELECT currency_price FROM " . $prefix . "_shop_currencies where currency_id='$tocurrency' limit 1"); 
	$data_curr2 = @mysql_fetch_array($sql1_curr2); 
	$vvvlle = $data_curr2['currency_price']; 
	if ($vvvlle != "" && $vvvlle > 0) { 
	$tot_vall = round($amount / $vvvlle, 2);
	 } else { 
	 $tot_vall = $amount; 
	 } 
	 } else { 
	 $tot_vall = $amount;
	 } 
	 return $tot_vall; 
 } 
 require_once("htaccess.php");

?>