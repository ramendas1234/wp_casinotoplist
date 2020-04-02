<?php global $global_settings; ?>
<?php
if(!empty($table_partner)){
  foreach ($table_partner as $p) {
      include('product-info.php');
      ?>

      <!-- Desktop -->

      <div class="play-card play-card__lg">
        <div class="play-card-info">
          <h6><?php echo $bonus;?></h6>
          <div class="play-card-disclaimer">
            <figure><figcaption class="tc-badge"><?php _e('T&Cs Apply','cjp');?></figcaption></figure>
            <figure><img src="<?php echo TOPLIST_URL;?>/images/icons/18+.svg" alt=""></figure>
            <figure><img src="<?php echo TOPLIST_URL;?>/images/icons/begambleaware.svg" alt=""></figure>
          </div>
        </div>
        <div class="play-card-claim">
            <div class="play-card-name-rating">
              <h4><?php echo $partner;?></h4>
              <div class="card-rating">
                <div class="rating-box"><?php echo $rating;?></div>
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
              <a href="<?php echo $goto_link;?>" class="cta cta-primary cta-block cta-medium cas-link"><?php echo $button_text;?></a>
            </div>
        </div>
      </div>


      <!-- Mobile -->

       <div class="play-card play-card__xs">
        
        <div class="play-card-claim">

          <figure><img src="<?php echo !empty($image)?$image:TOPLIST_URL.'images/notallowed.png';?>" alt="<?php echo $partner;?>" class="play-card-img"></figure>
            <div class="play-card-name-rating">
              <h4><?php echo $partner;?></h4>
              <div class="card-rating">
                <div class="rating-box"><?php echo $rating;?></div>
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
              <figure><figcaption class="tc-badge"><?php _e('T&Cs Apply','cjp');?></figcaption></figure>
              </div>
              
            </div>
        </div>

        <div class="play-card-info">
          <h6><?php echo $bonus;?></h6>
          <div class="play-card-disclaimer">
            <figure><img src="<?php echo TOPLIST_URL;?>/images/icons/18+.svg" alt=""></figure>
            <figure><img src="<?php echo TOPLIST_URL;?>/images/icons/begambleaware.svg" alt=""></figure>
          </div>
        </div>

        <div class="play-card-cta">
         <a href="<?php echo $goto_link;?>" class="cta cta-primary cta-block cta-medium cas-link"><?php echo $button_text;?></a>
        </div>
      </div>

      <?php
  }
}else{ ?>
    <div class="best-casinos-row" style="width:100%;">
      <div class="row u-align-items-center">
          <div class="col col-12">
              <p class="nocasinos">
                    <?php echo get_field('not_available_msg','option');?>
              </p>
          </div>
      </div>
    </div>
<?php
}
?>
        