
<?php

if (@$run_if_included) {
?>
<!doctype html>
<!--[if IE 9 ]><html class="ie9" lang="en"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en"><!--<![endif]-->
<head>
    <meta charset="<?php echo $site_lang_charset; ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!--meta info-->
    <meta charset="<?php echo $site_lang_charset; ?>"/>
    <title><?php echo $current_page_title; ?></title>
    <meta name="description" content="<?php echo $current_page_description; ?>"/>
    <meta name="keywords" content="<?php echo $current_page_keywords; ?>"/>
    <meta name="author" content=" Professional Designer,uaepd.net"/>
    <meta name="revisit-after" content="1 days"/>
	<?php $site_url= ''; ?>
    <base href="<?php echo $site_url; ?>">
    <?php
    if($site_icon !="") {
        ?>
        <link rel="icon" type="image/png" href="uploads/<?php echo $site_icon; ?>">
        <?php
    }else {
        ?>
        <link rel="icon" type="image/png" href="assets/img/favicon.png">
        <?php
    }
    ?>

<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/owlCarousel.min.css" />
  <link rel="stylesheet" href="assets/css/fontawesome.min.css" />
  <link rel="stylesheet" href="assets/css/flaticon.css" />
  <link rel="stylesheet" href="assets/css/animate.css" />
  <link rel="stylesheet" href="assets/css/style.css" />
  
    <?php
    if (@$share_page_image != "") {
        ?>
<meta property='og:image' content='<?php echo $site_url; ?>uploads/<?php echo @$share_page_image; ?>'/>
        <?php
    }
    ?>
    <?php
    if (@$share_page_title != "") {
        ?>
<meta property='og:title' content='<?php echo @$share_page_title; ?>'/>
        <?php
    }
    ?>


</head>
<?php
}
?>

