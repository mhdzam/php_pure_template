<?php
require_once("template/page_start.php");
?>
<?php
// General Vars
$current_page_title = $site_title;
$current_page_description = $site_desc;
$current_page_keywords = $site_keywords;




$current_page_lang_url = GetHTAccess("index.php") . "?lang=$lang_var_public_141";
$current_page_lang_url_ar = GetHTAccess("index.php") . "?lang=ar";
$current_page_lang_url_en = GetHTAccess("index.php") . "?lang=en";


?>
<?php
require_once("template/header_include.php");
?>
<body>
  <div id="tf-preloader">
    <div class="tf-preloader-wave"></div>
    <div class="tf-preloader-wave"></div>
    <div class="tf-preloader-wave"></div>
    <div class="tf-preloader-wave"></div>
    <div class="tf-preloader-wave"></div>
  </div>
<?php
// Page Header
require_once("template/header.php");
?>
<div class="tf-content">
<?php
require_once("template/banner.php");
?>

<?php
$sql_co1 = mysql_query("SELECT * FROM " . $prefix . "_topics 
where 	cat_id='1' and wm_section_id='1'and topic_status='1'
and topic_id='1' ");
$co1 = mysql_fetch_array($sql_co1);
$sql_co2 = mysql_query("SELECT * FROM " . $prefix . "_topics 
where 	cat_id='1' and wm_section_id='1'and topic_status='1'
and topic_id='2' ");
$co2 = mysql_fetch_array($sql_co2);
$sql_co3 = mysql_query("SELECT * FROM " . $prefix . "_topics 
where 	cat_id='1' and wm_section_id='1'and topic_status='1'
and topic_id='3' ");
$co3 = mysql_fetch_array($sql_co3);

$sql_about = mysql_query("SELECT * FROM " . $prefix . "_topics 
where 	cat_id='2' and wm_section_id='1'and topic_status='1'
and topic_id='4' ");
$hp_about = mysql_fetch_array($sql_about);
?>
<section class="tf-section-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="tf-iconbox tf-style1 text-center wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
              <div class="tf-iconbox-icon">
                <i class="flaticon-security"></i>
              </div>
              <h3 class="tf-iconbox-title"><?php echo $co1['topic_title_'.$lang];?></h3>
              <div class="tf-iconbox-text">
                <?php echo $co1['topic_details_'.$lang];?>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="tf-iconbox tf-style1 text-center wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">
              <div class="tf-iconbox-icon">
                <i class="flaticon-win"></i>
              </div>
              <h3 class="tf-iconbox-title"><?php echo $co2['topic_title_'.$lang];?></h3>
              <div class="tf-iconbox-text">
                <?php echo $co2['topic_details_'.$lang];?>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="tf-iconbox tf-style1 text-center wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s">
              <div class="tf-iconbox-icon">
                <i class="flaticon-career-1"></i>
              </div>
              <h3 class="tf-iconbox-title"><?php echo $co3['topic_title_'.$lang];?></h3>
              <div class="tf-iconbox-text">
                <?php echo $co3['topic_details_'.$lang];?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
	

<div class="tf-about-wrap tf-section-top" id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="tf-vertical-middle">
              <div class="tf-vertical-middle-in">
                <div class="tf-about-img wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.2s"><img src="assets/img/light-img/about-img1.png" alt=""></div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="tf-section-heading tf-style1">
              <h2><?php echo $hp_about['topic_title_'.$lang];?></h2>
            </div>
            <div class="tf-about-text">
              <?php echo $hp_about['topic_details_'.$lang];?>
            </div>
          </div>
        </div>
      </div>
    </div>



</div>
<?php

        require_once("template/footer.php");

        ?>

		<?php
    require_once("template/footer_include.php");
    ?>
</body>
</html>
<?php
require_once("template/page_end.php");
?>