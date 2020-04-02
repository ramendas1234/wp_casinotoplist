<?php global $global_settings,$has_decoration; ?>
<?php
if(!empty($table_partner)) {
    foreach ($table_partner as $key=>$p) {
    ?>
        	
	    <?php include('product-info.php'); ?>
        <div class="top-casino-card">
          <div class="casino-card casino-card-highlight">
            <!--<div class="casino-card-rank">#1</div>-->
            <div class="casino-card-img">
              <figure><img src="<?php echo !empty($image)?$image:TOPLIST_URL.'images/notallowed.png';?>" alt="<?php echo $partner;?>"></figure>
            </div>
            <?php if($has_decoration!==false){?>
            <div class="casino-card-decoration"></div>
            <?php } ?>
            <div class="casino-card-info">
              <div class="casino-card-name-rating">
                <h4><?php echo $partner;?></h4>
                <div class="card-rating">
                  <div class="rating-box rating-box-yellow <?php echo $key>0?'rating-box-small':'';?>"><?php echo $rating;?></div>
                  <?php
                  for($x=1;$x<=$rating;$x++) {
                      ?>
                      <figure><img src="<?php echo TOPLIST_URL?>images/icons/icons-thumbs/star_y.svg" alt=""></figure>
                      <?php
                  }
                  if (strpos($rating,'.')) {
                      ?>
                      <figure><img src="<?php echo TOPLIST_URL?>images/icons/icons-thumbs/star_y_half.svg" alt=""></figure>
                      <?php
                      $x++;
                  }
                  while ($x<=5) {
                      ?>
                      <figure><img src="<?php echo TOPLIST_URL?>images/icons/icons-thumbs/star_y_empty.svg" alt=""></figure>
                      <?php
                      $x++;
                  }
                  ?>
                </div>
              </div>
              <div class="casino-card-bonus">
                <h5><?php _e('Welcome Bonus','cjp')?></h5>
                <h2><?php echo $bonus;?></h2>
              </div>
              <div class="casino-card-disclaimer">
                <figure><figcaption class="tc-badge"><?php _e('T&Cs Apply','cjp');?></figcaption></figure>
                <figure><img src="<?php echo TOPLIST_URL?>images/icons/18+.svg" alt=""></figure>
                <figure><img src="<?php echo TOPLIST_URL?>images/icons/begambleaware.svg" alt=""></figure>
              </div>
              <div class="casino-card-buttons">
                <a href="<?php echo $goto_link;?>" target="_blank" rel="nofollow" class="cta cta-primary cta-block cas-link"><?php echo $button_text;?></a>
              </div>
            </div>
          </div>
        </div>  

      <?php
    }
}
?>
       
