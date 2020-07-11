
<?php

if (@$run_if_included) {
    ?>
<div class="tf-hero-slider1 owl-carousel tf-owl-controler2" id="home">
<?php
$sql_bannar = mysql_query("SELECT * FROM " . $prefix . "_banars 
where 	bs_id='1' and banar_status='1'
");
//$data_bannar = mysql_fetch_array($sql_bannar);
$count_b = mysql_num_rows($sql_bannar);
if($count_b>0){
while($bannar = mysql_fetch_array($sql_bannar)){
?>
      <div class="tf-hero-slide tf-style1 tf-flex">
        <div class="container">
          <div class="tf-hero-text tf-style1">
            <h1 class="tf-hero-title"><?php echo $bannar['banar_title_'.$lang];?></h1>
            <div class="tf-hero-subtitle">
              <?php echo $bannar['banar_details_'.$lang];?>
            </div>
            <div class="tf-btn-group tf-style1">
			 <?php if ($bannar['banar_url']!=''){?>
              <a href=" <?php echo $bannar['banar_url'];?>" target="_blank"
			  class="tf-btn tf-style1 tf-color1"><?php echo $lang_var_public_321; ?></a>
			<?php } ?>
              
            </div>
          </div>
        </div>
        <div class="tf-hero-img">
		<img src="<?php echo $banars_images_path.$bannar['banar_file_'.$lang];?>" 
		alt="<?php echo $bannar['banar_title_'.$lang];?>"></div>
      </div>
<?php }
}
?>
      
    </div>
    <?php
}
?>