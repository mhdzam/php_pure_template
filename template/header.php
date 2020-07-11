
<?php

if (@$run_if_included) {
    ?>
	
	<header class="tf-header tf-style1 tf-sticky-menu">
    <div class="tf-main-header">
      <div class="container">
        <div class="tf-main-header-in">
          <div class="tf-site-branding">
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
          
          <div class="tf-nav-wrap tf-fade-down">
            <div class="tf-nav-toggle tf-style1">
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              <span></span>
            </div>
            <nav class="tf-nav tf-desktop-nav">
              <ul class="tf-nav-list onepage-nav">
                <li><a href="#home"><?php echo $lang_var_public_31;?></a></li>
                <li><a href="#about"><?php echo $lang_var_public_318; ?></a></li>
                <li><a href="#service"><?php echo $lang_var_public_232;?></a></li>
                <li><a href="#portfolio"><?php echo $lang_var_public_319; ?></a></li>
                <li><a href="#team"><?php echo $lang_var_public_320; ?></a></li>
                <li><a href="#blog"><?php echo $lang_var_public_32;?></a></li>
                <li><a href="#contact"><?php echo $lang_var_public_13;?></a></li>
              </ul>
            </nav><!-- .tf-nav -->
          </div><!-- .tf-nav-wrap -->
        </div>
      </div>
    </div>
  </header>


    <?php
}
?>