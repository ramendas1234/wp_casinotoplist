<?php global $global_settings; ?>
<div class="ct-best-online-casinos no-deposit-casinos">
     <?php
if(!empty($table_partner)){
  foreach ($table_partner as $p) {
    include('product-info.php');
    ?>
    
    <div class="casino-card casino-card-vertical casino-card-no-deposit">
                            <div class="img-panel"><img src="<?php echo $image;?>" alt="<?php echo $partner;?>"></div>
                            <div class="info-panel">
                              <h6><span><?php _e('Welcome bonus:','ctl'); ?></span> up to <strong><?php echo ($bonus_currency)?$bonus_currency:'$'; ?><?php echo $bonus_amount; ?></strong></h6>
                              <div class="card-right-panel">
                                  <a href="<?php echo $goto_link;?>" target="_blank" rel="nofollow" class="cta cta-inline cta-primary"><?php _e('Get Bonus','ctl');?></a>
                              </div>
                            </div>
                          </div>
   <?php
  }
}?>


</div>
   
