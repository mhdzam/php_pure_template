<?php

if (@$run_if_included) {
    ?>
	<footer class="tf-site-footer tf-style1 tf-sticky-footer">
    <div class="tf-main-footer tf-section text-center">
      <div class="container">
        <div class="tf-footer-logo">
		<a href="<?php echo GetHTAccess("index.php"); ?>" class="tf-logo-link">
			<?php
				if($site_logo !="") {
					?>
					<img 
							src="uploads/<?php echo $site_logo; ?>" 
							alt="<?php echo $site_title; ?>">
					<?php
				}else{
					?>
					<img 
							src="assets/images/logo-<?php echo $site_lang_dir; ?>.png" 
							alt="<?php echo $site_title; ?>">
					<?php
				}
				?>
		</a>
        </div>
        <div class="tf-footer-social">
          <h3 class="tf-footer-social-title">Follow Us</h3>
          <ul class="tf-footer-social-btn tf-flex tf-mp0">
		   <?php if($social_link1 != ''){?>
			<li><a target="_blank" href="<?php echo $social_link1;?>">
			<i class="fab fa-facebook-f"></i></a></li>
			<?php } ?>
			<?php if($social_link2 != ''){?>
			<li><a target="_blank" href="<?php echo $social_link2;?>"><i class="fab fa-twitter"></i></a></li>
			<?php } ?>
			<?php /*if($social_link1 != ''){?>
			<li><a href="<?php echo $social_link1;?>"><i class="fab fa-google-plus"></i></a></li>
			<?php } */?>
			<?php if($social_link4 != ''){?>
			<li><a target="_blank" href="<?php echo $social_link4;?>"><i class="fab fa-linkedin-in"></i></a></li>
			<?php } ?>
			<?php if($social_link5 != ''){?>
			<li><a target="_blank" href="<?php echo $social_link5;?>"><i class="fab fa-youtube"></i></a></li>
			<?php } ?>
          </ul>
        </div>
      </div>
    </div>
    <div class="tf-copyright text-center">
      <div class="container">
        <div class="tf-copyright-text"><?php echo $lang_var_public_229; ?> &copy; <?php echo date("Y") ?> , <?php echo $site_title; ?> Developed by 
		<a href="http://uaepd.net" target="_blank"> <?php echo $lang_var_public_170; ?></a></div>
      </div>
    </div>
  </footer>
	
    <?php
}
?>