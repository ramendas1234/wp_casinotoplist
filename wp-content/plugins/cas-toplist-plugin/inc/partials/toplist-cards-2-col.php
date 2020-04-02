<?php global $global_settings; ?>
<?php
if(!empty($table_partner)) {
    foreach ($table_partner as $p) {
        include('product-info.php');
        ?>
    	 <div class="col col-6">
          <div class="casino-card casino-card-highlight">
            <div class="casino-card-img">
              <figure><img src="<?php echo !empty($image)?$image:TOPLIST_URL.'images/notallowed.png';?>" alt="<?php echo $partner;?>"></figure>
            </div>
            <div class="casino-card-decoration"></div>
            <div class="casino-card-info">
              <div class="casino-card-name-rating">
                <h4><?php echo $partner;?></h4>
                <div class="card-rating">
                  <div class="rating-box rating-box-yellow"><?php echo $rating;?></div>
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
                <h5>ウェルカムボーナス</h5>
                <h2><?php echo $bonus;?></h2>
              </div>
              <div class="casino-card-disclaimer">
                <figure><figcaption class="tc-badge"><?php _e('T&Cs Apply','cjp');?></figcaption></figure>
                <figure><img src="<?php echo TOPLIST_URL; ?>/images/icons/icons-thumbs/18+.svg" alt=""></figure>
                <figure><img src="<?php echo TOPLIST_URL; ?>/images/icons/icons-thumbs/begambleaware.svg" alt=""></figure>
              </div>
              <div class="casino-card-buttons">
                <a href="<?php echo $goto_link;?>" target="_blank" rel="nofollow" class="cta cta-primary cta-block cas-link" tabindex="-1"><?php echo $button_text;?></a>
              </div>
            </div>
          </div>
        </div>
        <?php
    }
}
?>
       
