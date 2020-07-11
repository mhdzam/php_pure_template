<?php
if (@$run_if_included) { 
$wm_section = @$_GET['ws']; 
$sql_get_admin_site_settings = mysql_query("SELECT * FROM " . $prefix . "_webmaster_settings WHERE set_id ='1' "); 
$data_get_admin_site_settings = mysql_fetch_array($sql_get_admin_site_settings); 
$site_ar_box_status = stripcslashes($data_get_admin_site_settings['ar_box_status']); 
$site_en_box_status = stripcslashes($data_get_admin_site_settings['en_box_status']); 
$site_seo_status = stripcslashes($data_get_admin_site_settings['seo_status']); 
$site_analytics_status = stripcslashes($data_get_admin_site_settings['analytics_status']); 
$site_banars_status = stripcslashes($data_get_admin_site_settings['banars_status']); 
$site_inbox_status = stripcslashes($data_get_admin_site_settings['inbox_status']); 
$site_calendar_status = stripcslashes($data_get_admin_site_settings['calendar_status']); 
$site_settings_status = stripcslashes($data_get_admin_site_settings['settings_status']); 
$site_newsletter_status = stripcslashes($data_get_admin_site_settings['newsletter_status']); 
$site_members_status = stripcslashes($data_get_admin_site_settings['members_status']); 
$site_orders_status = stripcslashes($data_get_admin_site_settings['orders_status']); 
$site_shop_settings_status = stripcslashes($data_get_admin_site_settings['shop_settings_status']); 
$site_shop_status = stripcslashes($data_get_admin_site_settings['shop_status']); 
$site_defult_currency_id = stripcslashes($data_get_admin_site_settings['defult_currency_id']); 
$sql_get_site_currency = mysql_query("SELECT * FROM " . $prefix . "_shop_currencies WHERE currency_id ='$site_defult_currency_id' "); 
$data_get_site_currency = mysql_fetch_array($sql_get_site_currency); 
$defult_currency = stripcslashes($data_get_site_currency['currency_shorttitle']); 
$sql_get_site_settings = mysql_query("SELECT * FROM " . $prefix . "_settings WHERE settings_id ='1' "); 
$data_get_site_settings = mysql_fetch_array($sql_get_site_settings); 
$site_title = stripcslashes($data_get_site_settings['site_title_' . $lang]); 
$site_desc = stripcslashes($data_get_site_settings['site_desc_' . $lang]); 
$site_keywords = stripcslashes($data_get_site_settings['site_keywords_' . $lang]); 
$site_webmails = stripcslashes($data_get_site_settings['site_webmails']); 
$site_url = stripcslashes($data_get_site_settings['site_url']); 
$site_status = stripcslashes($data_get_site_settings['site_status']); 
$close_msg = nl2br(stripcslashes($data_get_site_settings['close_msg'])); 
$map = stripcslashes($data_get_site_settings['map']); 
$social_link1 = stripcslashes($data_get_site_settings['social_link1']); 
$social_link2 = stripcslashes($data_get_site_settings['social_link2']); 
$social_link3 = stripcslashes($data_get_site_settings['social_link3']); 
$social_link4 = stripcslashes($data_get_site_settings['social_link4']); 
$social_link5 = stripcslashes($data_get_site_settings['social_link5']); 
$social_link6 = stripcslashes($data_get_site_settings['social_link6']); 
$social_link7 = stripcslashes($data_get_site_settings['social_link7']); 
$social_link8 = stripcslashes($data_get_site_settings['social_link8']); 
$social_link9 = stripcslashes($data_get_site_settings['social_link9']); 
$social_link10 = stripcslashes($data_get_site_settings['social_link10']); 
$contact_t1 = stripcslashes($data_get_site_settings['contact_t1_' . $lang]); 
$contact_t3 = stripcslashes($data_get_site_settings['contact_t3']); 
$contact_t4 = stripcslashes($data_get_site_settings['contact_t4']); 
$contact_t5 = stripcslashes($data_get_site_settings['contact_t5']); 
$contact_t6 = stripcslashes($data_get_site_settings['contact_t6']); 
$affiliate_status = stripcslashes($data_get_site_settings['affiliate_status']); 
$affiliate_price1 = stripcslashes($data_get_site_settings['affiliate_price1']); 
$affiliate_price2 = stripcslashes($data_get_site_settings['affiliate_price2']); 
$home_option1 = stripcslashes($data_get_site_settings['home_option1']); 
$home_option2 = stripcslashes($data_get_site_settings['home_option2']); 
$home_option3 = stripcslashes($data_get_site_settings['home_option3']); 
$home_option4 = stripcslashes($data_get_site_settings['home_option4']); 
$home_option5 = stripcslashes($data_get_site_settings['home_option5']); 
$home_option6 = stripcslashes($data_get_site_settings['home_option6']); 
$home_option7 = stripcslashes($data_get_site_settings['home_option7']); 
$home_option8 = stripcslashes($data_get_site_settings['home_option8']); 
$home_option9 = stripcslashes($data_get_site_settings['home_option9']); 
$home_option10 = stripcslashes($data_get_site_settings['home_option10']); 
$site_logo = stripcslashes($data_get_site_settings['site_logo_'.$lang]); 
$site_icon = stripcslashes($data_get_site_settings['site_icon']); 
// check login 
$pd_admin_user_id = @base64_decode(base64_decode($_COOKIE["pd_admin_user_id"])); 
$pd_admin_user_name = @base64_decode(base64_decode($_COOKIE["pd_admin_user_name"])); 
$pd_admin_user_password = @base64_decode(base64_decode($_COOKIE["pd_admin_user_password"])); 
$sql_adminlog_check = mysql_query("SELECT * FROM " . $prefix . "_users where user_id='$pd_admin_user_id' and user_password='$pd_admin_user_password' and user_status=1"); 
$row_check_adminlog = mysql_num_rows($sql_adminlog_check); 
$sql_adminlog_check2 = mysql_query("SELECT * FROM " . $prefix . "_users where user_id='$pd_admin_user_id' and user_status=1"); 
$row_check_adminlog2 = mysql_num_rows($sql_adminlog_check2); $pd_if_admin_msg = "";
if ($row_check_adminlog != 0) {
	$data_adminlog_check = mysql_fetch_array($sql_adminlog_check); 
	$logged_admin_user_name = stripcslashes($data_adminlog_check['user_name']); 
	$logged_admin_control_type = stripcslashes($data_adminlog_check['control_type']);
	$logged_admin_user_photo = stripcslashes($data_adminlog_check['user_photo']); 
	$logged_admin_user_fullname = stripcslashes($data_adminlog_check['user_fullname']); 
	if ($logged_admin_user_fullname == "") { 
	$logged_admin_user_fullname = $logged_admin_user_name; 
	} 
	$logged_admin_user_email = stripcslashes($data_adminlog_check['user_email']); 
	// This Admin open site if status closed 
	if ($site_status == 0) { 
	// Notification Message for ADMIN 
	$pd_if_admin_msg = " $lang_var_public_1 ";
	}
	} else {
		if ($site_status == 0 && $pd_current_page_php != "closed.php") {
			header("Location: closed"); exit(); 
			} 
	} 
// End of check login 

// set Default currency 
$sql_default_curr = mysql_query("SELECT * FROM " . $prefix . "_shop_currencies where currency_id='$site_defult_currency_id' limit 1"); 
$data1_default_curr = @mysql_fetch_array($sql_default_curr); 
$currency_id = $data1_default_curr['currency_id']; 
$currency_code = $data1_default_curr['currency_code']; 
$currency_shorttitle = $data1_default_curr['currency_shorttitle']; 
$currency_title = $data1_default_curr['currency_title_' . $lang]; 
// change currency 
$currency = htmlspecialchars(@$_GET['currency'], ENT_QUOTES, 'utf-8'); 
if ($currency == "") { 
$currency = @$_COOKIE["pd_currency_code"]; 
} 
if ($currency != "") {
	$sql1_curr = mysql_query("SELECT * FROM " . $prefix . "_shop_currencies where currency_code='$currency' limit 1"); 
	$data1_curr = @mysql_fetch_array($sql1_curr); 
	$currency_id = $data1_curr['currency_id']; 
	if ($currency_id != "") { 
	$currency_code = $data1_curr['currency_code']; 
	$currency_shorttitle = $data1_curr['currency_shorttitle']; 
	$currency_title = $data1_curr['currency_title_' . $lang]; 
	// save 
	setcookie("pd_currency_code", "$currency_code", time() + 2592000); 
	} 
	} 
	// Sign IN 
	$username = mysql_real_escape_string(@$_POST['username']); 
	$remember = mysql_real_escape_string(@$_POST['remember']); 
	$username_email = mysql_real_escape_string(@$_POST['email']); 
	$password = @base64_encode(base64_encode(mysql_real_escape_string(@$_POST['password']))); 
	$ip = $_SERVER['REMOTE_ADDR']; 
	$error_msg = ""; 
	$error_msg2 = ""; 
	$do = @$_GET['do']; 
	// login check start 
	$pd_member_id = @base64_decode(base64_decode($_COOKIE["pd_member_id"])); 
	$pd_member_username = @base64_decode(base64_decode($_COOKIE["pd_member_username"])); 
	$pd_member_password = @base64_decode(base64_decode($_COOKIE["pd_member_password"])); 
	$sql_member_log_check = mysql_query("SELECT * FROM " . $prefix . "_members where member_id='$pd_member_id' and member_password='$pd_member_password' and member_status=1"); 
	$row_check_member_log = mysql_num_rows($sql_member_log_check); 
	if ($row_check_member_log == 0) { 
	if ($do == "login" && $username != "" && $password != "") { 
	$sql = mysql_query("SELECT * FROM " . $prefix . "_members WHERE (member_username='$username' OR member_email='$username') AND member_password='$password' and member_status=1"); 
	$login_check = mysql_num_rows($sql); 
	if ($login_check == 1) { 
	$row = mysql_fetch_array($sql); 
	$member_id = $row['member_id']; 
	$member_username = $row['member_username']; 
	$member_password = $row['member_password']; 
	if ($remember == 1) { 
	$koki_tim = time() + 864000;
	} else {
	$koki_tim = time() + 21600;
	} 
	setcookie("pd_member_id", base64_encode(base64_encode("$member_id")), $koki_tim, '/'); 
	setcookie("pd_member_username", base64_encode(base64_encode("$member_username")), $koki_tim, '/'); 
	setcookie("pd_member_password", base64_encode(base64_encode("$member_password")), $koki_tim, '/'); 
	mysql_query("UPDATE " . $prefix . "_members SET ipaddress='$ip', lastlogin=NOW() WHERE member_id='$member_id'") or die(mysql_error()); 
	$tURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 
	header("Location: " . $tURL); exit(); 
	} else { 
	$error_msg = "$lang_var_public_51";
	} 
	} 
	if ($do == "fpw" && $username_email != "") {
		$sql = mysql_query("SELECT * FROM " . $prefix . "_members WHERE member_email='$username_email' and member_status=1"); 
		$login_check = mysql_num_rows($sql); 
		if ($login_check == 1) { 
		$data00 = mysql_fetch_array($sql); 
		$c_username = $data00['member_username']; 
		$c_password = base64_decode(base64_decode($data00['member_password'])); 
		$message_title = "Your Login Information is:"; 
		$message_text = "Username: $c_username Password: $c_password";
		/* END OF MESSAGE */ 
		$website_webmail = $noreplayemail; 
		// THIS EMAIL IS THE SENDER EMAIL ADDRESS 
		$from = "$website_webmail"; 
		// SET A SUBJECT OF YOUR CHOICE 
		$subject = "Password Recover | $site_title "; 
		// SET UP THE EMAIL HEADERS 
		$headers = "From: $website_webmail\r\n"; 
		$headers .= "Reply-To: " . $site_title . "<" . $website_webmail . ">" . "\r\n"; 
		$headers .= "Content-type: text/html; charset=utf-8\r\n"; 
		$headers .= "Content-Transfer-Encoding: 8bit\r\n"; 
		/* IN-CASE SOMEONE HAS TWO EMAIL ACCOUNTS SETUP ON THE SAME COMPUTER 
		SOME EMAIL PROGRAMS LIKE OUTLOOK WILL ONLY SHOW ONE EMAIL AND 
		DISCARD THE OTHER(S) SO WE GIVE THE (Message-ID:) A RANDOM NUMBER*/ 
		$headers .= "Message-ID: <" . time() . rand(1, 1000) . "@" . $_SERVER['SERVER_NAME'] . ">" . "\r\n"; 
		// LETS SEND THE EMAIL 
		$sndst = mail($username_email, $subject, $message_text, $headers, "-f $from"); 
		$error_msg = "$lang_var_public_52"; 
		} else { 
		$error_msg = "$lang_var_public_53"; 
		} 
		} 
		$pd_affiliate_user = @base64_decode(base64_decode($_COOKIE["affiliate_user"])); 
		$member_username = mysql_real_escape_string(@$_POST['member_username']); 
		$member_password = @base64_encode(base64_encode(mysql_real_escape_string(@$_POST['member_password']))); 
		$member_firstname = mysql_real_escape_string(@$_POST['member_firstname']); 
		$member_lastname = mysql_real_escape_string(@$_POST['member_lastname']); 
		$member_photo = mysql_real_escape_string(@$_POST['member_photo']); 
		$member_phone = mysql_real_escape_string(@$_POST['member_phone']); 
		$member_city = mysql_real_escape_string(@$_POST['member_city']); 
		$country_code = mysql_real_escape_string(@$_POST['country_code']); 
		$member_email = mysql_real_escape_string(@$_POST['member_email']); 
		$sql_gc = mysql_query("SELECT cnt_id FROM " . $prefix . "_countries WHERE country_code ='$country_code' limit 1 "); 
		$data_gc = mysql_fetch_array($sql_gc); 
		$member_country_id = $data_gc['cnt_id']; 
		if ($do == "signup" && $member_username != "" && $member_email != "") { 
		$r = "select member_id from " . $prefix . "_members where member_username='$member_username'"; 
		$sqlr = mysql_query($r); 
		$rr_count = mysql_num_rows($sqlr); 
		if ($rr_count == 0) { 
		$r2 = "select member_id from " . $prefix . "_members where member_email='$member_email'"; 
		$sqlr2 = mysql_query($r2); 
		$rr_count2 = mysql_num_rows($sqlr2); 
		if ($rr_count2 == 0) { 
		$sql_slct_max = mysql_query("select max(member_id) from " . $prefix . "_members"); 
		$data_slct_max = mysql_fetch_array($sql_slct_max); 
		$next_member_id = $data_slct_max[0] + 1; 
		$sql_insert_new = mysql_query("INSERT INTO " . $prefix . "_members ( member_id, member_username, member_password, member_firstname, member_lastname, member_email, member_phone, regdate, member_status, member_city, member_country_id, ipaddress, lastlogin, affiliate) VALUES ('$next_member_id','$member_username','$member_password','$member_firstname','$member_lastname','$member_email','$member_phone',now(),'1','$member_city','$member_country_id','$pd_ip',now(),'$pd_affiliate_user')"); 
		if ($sql_insert_new) { 
		// Redirect 
		$koki_tim = time() + 21600; setcookie("pd_member_id", base64_encode(base64_encode("$next_member_id")), $koki_tim, '/'); 
		setcookie("pd_member_username", base64_encode(base64_encode("$member_username")), $koki_tim, '/');
		setcookie("pd_member_password", base64_encode(base64_encode("$member_password")), $koki_tim, '/'); 
		mysql_query("UPDATE " . $prefix . "_members SET ipaddress='$ip', lastlogin=NOW() WHERE member_id='$member_id'") or die(mysql_error()); 
		header("Location: " . GetHTAccess("profile.php")); 
		exit(); 
		} else { 
		$error_msg2 = "$lang_var_public_79";
		}
		} else { 
		$error_msg2 = "$lang_var_public_77";
		}
		} else { 
		$error_msg2 = "$lang_var_public_78";
		}
		}
		}
		//page end
}

?>