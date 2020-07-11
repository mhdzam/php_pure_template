<?php
require_once("template/page_start.php");
?>
<?php
// General Vars
$current_page_title = $lang_var_public_320 . " - " . $site_title;
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

$current_page_lang_url = GetHTAccess("about.php") . "?lang=$lang_var_public_141";
$current_page_lang_url_ar = GetHTAccess("about.php") . "?lang=ar";
$current_page_lang_url_en = GetHTAccess("about.php") . "?lang=en";

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
                            <h2 class="text-left"><?php echo $lang_var_public_320;?></h2>
							</br></br></br>
                            <p><a href="home"><?php echo $lang_var_public_31;?></a> <span>/</span><?php echo $lang_var_public_320;?></p>
                        </div>
                    </div>
                </div>
</div>
<?php
$wm_section_id = 1; // About
$cat_id = 9;	//about page 
    $sql_page_details = mysql_query("SELECT * FROM " . $prefix . "_topics  WHERE 	wm_section_id ='$wm_section_id' and cat_id='$cat_id' ");
    $data_page_details = mysql_fetch_array($sql_page_details);
    $topic_id = $data_page_details['topic_id'];
    $topic_status = $data_page_details['topic_status'];
	if ($topic_status=='1'){
	$sql_update_visits = mysql_query("UPDATE " . $prefix . "_topics SET visits= visits+1 WHERE topic_id='$topic_id'") or die (mysql_error());
    $topic_image_file = stripcslashes($data_page_details['topic_image_file']);
    $topic_title = stripcslashes($data_page_details['topic_title_' . $lang]);
    $topic_details = stripcslashes($data_page_details['topic_details_' . $lang]);
    $topic_details = str_replace("../", "", $topic_details);
?>
<section class="services_section section_padding">
	<div class="container">
		<div class="row">
			<div class="col-md-12 section_margin zero_padding">
				<!--Content left-->
				<div class="content_left">
					<div class="about_section about_sec_2">
						<!--About left-->
						<div class="col-md-6 col-sm-12 zero_padding">
							<div class="accrodion-grp about_left" data-grp-name="faq-accrodion">
								<h1><?php echo $topic_title; ?></h1>
								<p class="para"><?php echo $topic_details; ?></p>
								
							</div>
						</div>
						<!--About Right-->
						<div class="col-md-6 col-sm-12 zero_padding">
							<div class="about_right">
							</div>
						</div>
					</div>
				</div>
				<!--Content left end-->
				<!--Content right beautiful day-->
				<div class="col-md-6 col-sm-12 content_2">
					<div class="content-right">
						<div class="content_img text-right" data-aos="fade-up" data-aos-duration="2000">
							<img src="<?php echo $topics_images_path.$topic_image_file;?>" alt="<?php echo $topic_title; ?>">
						</div>
					</div>
				</div>
					<!--Content right End-->
			</div>
				
		</div>
	</div>
</section>
	<?php } ?>

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