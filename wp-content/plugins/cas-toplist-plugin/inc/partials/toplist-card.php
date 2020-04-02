<?php 
include('product-info.php');
global $is_gray_bg; 
?>



<div class="col col-3">
  <div class="casino-card casino-card-featured">
    <div class="casino-card-img">
      <figure><img src="<?php echo !empty($image)?$image:TOPLIST_URL.'images/notallowed.png';?>" alt="<?php echo $partner;?>"></figure>
    </div>
    <div class="casino-card-decoration casino-card-decoration-<?php echo !empty($is_gray_bg)?'gray':'white';?>"></div>
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
      <div class="casino-card-bonus card-bonus-info <?php echo $freespin==''?'casino-card-bonus-single':'';?>">
        <?php 
          if ($exc_bonus_amount != "" && $exc_bonus_amount != 0) {
              if(empty($p['exclusive_bonus_match']) )
                  $bonus = "<i class=\"icon icon-promotions\"></i><div>".$sign . "" . $exc_bonus_amount."&nbsp;<span>bonus</span></div>";
              else
                  $bonus = "<div>".$exc_bonus_match . " <span>up to " . $sign . "" . $exc_bonus_amount."</span></div>";
          } 
          else if ($bonus_amount != "" && $bonus_amount != 0) {
              if(empty($p['bonus_match']))
                  $bonus = "<i class=\"icon icon-promotions\"></i><div>".$sign . "" . $bonus_amount."&nbsp;<span>bonus</span></div>";
              else
                  $bonus = "<div>".$bonus_match . " <span>up to " . $sign . "" . $bonus_amount."</span></div>";
          }if($freespin!=''){
              //Append promotional icon
              $bonus='<i class="icon icon-promotions"></i>'.$bonus;
              $bonus.= " <div>+</div> <div>" .$sign. $freespin . " <span>" . $freebie_name."</span></div>";
          }
         
          echo $bonus;
      ?>
      </div>
      <div class="casino-card-disclaimer">
        <figure><figcaption class="tc-badge"><?php _e('T&Cs Apply','cjp');?></figcaption></figure>
        <figure><img src="<?php echo TOPLIST_URL;?>images/icons/18+.svg" alt=""></figure>
      </div>
      <div class="casino-card-buttons">
        <a href="<?php echo $goto_link;?>" target="_blank" rel="nofollow" class="cta cta-primary cta-block cas-link" tabindex="-1"><?php echo $button_text;?></a>
      </div>
    </div>
  </div>
</div>