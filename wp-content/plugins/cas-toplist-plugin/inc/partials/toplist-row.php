<?php include('product-info.php'); ?>

<div class="col-sm-12">
    <div class="casino-card casino-card-vertical <?php echo (is_single())?'three-fourth':'';?>">
    <div class="img-panel"><img src="<?php echo !empty($image)?$image:TOPLIST_URL.'images/notallowed.png';?>" alt="<?php echo $partner;?>"></div>
    <div class="info-panel">
      <h6><?php echo ($exc_bonus_amount != "" && $exc_bonus_amount != 0)?__('Exclusive bonus','ctl'):__('Welcome bonus','ctl');?>: <br> upto <strong><?php echo $bonus;?></strong></h6>
      <div class="card-right-panel">
        <div class="card-ratings">
          <div class="rating-value">
            <span class="result"><?php echo $rating;?>/</span>5
          </div>
          <div class="rating-stars">
           <?php
            for($x=1;$x<=$rating;$x++) {
                ?>
                <figure><img src="<?php echo TOPLIST_URL?>images/icons/star.svg" alt=""></figure>
                <?php
            }
            if (strpos($rating,'.')) {
                ?>
                <figure><img src="<?php echo TOPLIST_URL?>images/icons/star_half.svg" alt=""></figure>
                <?php
                $x++;
            }
            while ($x<=5) {
                ?>
                <figure><img src="<?php echo TOPLIST_URL?>images/icons/star_empty.svg" alt=""></figure>
                <?php
                $x++;
            }
          ?>
          </div>
        </div>
        <a href="<?php echo $review_link;?>" class="cta cta-inline cta-outline"><?php _e('Read review','ctl');?></a>
        <a href="<?php echo $goto_link;?>" class="cta cta-inline cta-primary" target="_blank" rel="nofollow"><?php echo $button_text;?></a>
      </div> 
    </div>
  </div>
</div>

  
