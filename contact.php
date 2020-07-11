<?php
require_once("template/page_start.php");
?>
<?php
// General Vars
$current_page_title = $lang_var_public_13 . " - " . $site_title;
$current_page_description = $site_desc;
$current_page_keywords = $site_keywords;

$affiliate = @$_GET['affiliate'];
if($affiliate >0){
    $svd_affiliate = base64_encode( base64_encode("$affiliate"));
    setcookie("affiliate_user", "$svd_affiliate", time() + 259200);
}


// Define Vars
$page_id = @$_GET['page'];

$wm_section = 1;
if ($page_id != "" && $page_id != 0 && is_numeric($page_id)) {
    $sql_check_this_topic = mysql_query("SELECT topic_id FROM " . $prefix . "_topics where wm_section_id='$wm_section' and topic_id=$page_id and topic_status=1");
    $data_check_this_topic = mysql_fetch_array($sql_check_this_topic);
    $page_id = $data_check_this_topic['topic_id'];
}

$current_page_lang_url = GetHTAccess("contact.php") . "?lang=$lang_var_public_141";
$current_page_lang_url_ar = GetHTAccess("contact.php") . "?lang=ar";
$current_page_lang_url_en = GetHTAccess("contact.php") . "?lang=en";

if ($page_id == "") {
    //share vars
    $share_page_image = "uploads/default.png";
}
?>
<?php
require_once("template/header_include.php");
?>
<body>
    <!-- Preloader -->
    <div class="preloader">
        <div id="overlayer">
            <span class="loader">
                <span class="loader-inner"></span>
            </span>
        </div>
    </div>
	<div class="inner_box">

<?php
// Page Header
require_once("template/header.php");
?>

<div class="banner_section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="text-left"><?php echo $lang_var_public_13;?></h2>
							</br></br></br>
                            <p><a href="home"><?php echo $lang_var_public_31;?></a> <span>/</span><?php echo $lang_var_public_13;?></p>
                        </div>
                    </div>
                </div>
</div>
<div class="clearfix"></div>
<?php

$contact_name = htmlspecialchars(@$_POST['contact_name'], ENT_QUOTES, 'utf-8');
$contact_email = htmlspecialchars(@$_POST['contact_email'], ENT_QUOTES, 'utf-8');
$contact_phone = htmlspecialchars(@$_POST['contact_phone'], ENT_QUOTES, 'utf-8');
$message = htmlspecialchars(@$_POST['message'], ENT_QUOTES, 'utf-8');


if ($contact_email != "" && $message != "") {
	

		$sql_slct_max = mysql_query("select max(wm_id)  from " . $prefix . "_webmail");
		$data_slct_max = mysql_fetch_array($sql_slct_max);
		$next_wm_id = $data_slct_max[0] + 1;
		$sql_insert_new = mysql_query("INSERT INTO " . $prefix . "_webmail (
wm_id,
cat_id,
wm_details,
wm_date,
wm_from,
wm_from_name,
wm_to_email,
wm_to_name,
wm_ip,
wm_status,
wm_from_tel) VALUES ('$next_wm_id','0','$message',now(),
'$contact_email','$contact_name','$site_webmails','$site_title',
'$pd_ip','0','$contact_phone')");

		if ($sql_insert_new) {
			//echo '**************************';

//----- SENDING EMAIl-----------
/*
			$website_webmail = $noreplayemail;
			$wm_from = $noreplayemail;
			$headers = "From: $wm_from";
			$subject = $contact_title;
			$message_html = nl2br($message);

			$headers .= "Reply-To: " . $contact_name . "<" . $contact_email . ">" . "\r\n";
			$headers .= "Content-type: text/html; charset=utf-8\r\n";
			$headers .= "Content-Transfer-Encoding: 8bit\r\n";
			$headers .= "Message-ID: <" . time() . rand(1, 1000) . "@" . $_SERVER['SERVER_NAME'] . ">" . "\r\n";
			$sndst = mail($site_webmails, $subject, $message_html, $headers, "-f $wm_from");

//---- end of sending
*/
			$contact_name = "";
			$contact_email = "";
			$contact_phone = "";
			$contact_title = "";
			$message = "";
			$contact_captcha = "";
			$captcha_code = "";
			?>
			
					<?php echo $lang_var_public_14; ?>
				
			<?php

		}else{
			//echo '+++++++++++++++++++++';
		}
	
}
?>
<section class="contact_section">
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-sm-6">
				<h1><?php echo $site_title;?></h1>
				<p><?php echo $lang_var_public_13;?></p>
				<div class="address_location">
					<p data-aos="fade-right" data-aos-duration="2000"><?php echo $lang_var_public_221;?>: <?php echo $contact_t1;?></p>
					<p data-aos="fade-right" data-aos-duration="2000"><?php echo $lang_var_public_225;?>: <?php echo $contact_t3;?></p>
					<p data-aos="fade-right" data-aos-duration="2500"><?php echo $lang_var_public_322;?>: <?php echo $contact_t5;?></p>
					<p data-aos="fade-right" data-aos-duration="2000"><?php echo $lang_var_public_321;?>: <?php echo $site_webmails;?></p>
				</div>
				
			</div>
			<div class="col-md-6 col-md-offset-1">
				<p class="success" id="success" style="display:none;"></p>
				<p class="error" id="error" style="display:none;"></p>
				<form name="contact_form" id="contact_form" method="post" action="<?php echo GetHTAccess("contact.php"); ?>" class="row ">
					<div class="col-sm-12 col-md-12">
						<h6><?php echo $lang_var_public_5;?></h6>
						<input type="text" class="form-control" name="contact_name" id="contact_name" />
					</div>
					<div class="col-sm-12 col-md-12">
						<h6><?php echo $lang_var_public_321;?></h6>
						<input type="email" class="form-control" name="contact_email" id="contact_email" />
					</div>
					<div class="col-sm-12 col-md-12">
						<h6><?php echo $lang_var_public_325; ?></h6>
						<input type="text" class="form-control" name="contact_phone" id="contact_phone" />
					</div>
					<div class="col-sm-12 col-md-12">
						<h6><?php echo $lang_var_public_114;?></h6>
						<textarea class="form-control" name="message" id="message"></textarea>
					</div>
					<div class="col-sm-5 col-md-5" data-aos="fade-up" data-aos-duration="2000">
						<input type="submit" id="submit" class="button white" value="<?php echo $lang_var_public_11;?>" />
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

<div class="map_section">
                <div class="contactmap">
                    <div class="map1  wow fadeInUp">
                      <?php echo $map;?> 
                    </div>
                </div>
            </div>

<?php
require_once("template/partners_home.php");
?>
<?php
require_once("template/footer_home.php");
?>
<?php

        // Page Footer
        require_once("template/footer.php");

        ?>
	</div>
		<?php
    // JS included
    require_once("template/footer_include.php");
    ?>
</body>
</html>
<?php
require_once("template/page_end.php");
?>