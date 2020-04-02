<?php global $global_settings; ?>
<div class="claim-list">
    <?php
if(!empty($table_partner)){
  foreach ($table_partner as $p) {
    include('product-info.php');
    ?>
    
    <div class="claim-list-item">
                <div class="casino-card casino-card-vertical casino-card-cliam">
                    <div class="img-panel"><a href="<?php echo $goto_link;?>" target="_blank" rel="nofollow"><img src="<?php echo $image;?>" alt="<?php echo $partner;?>"></a></div>
                    <div class="claim-text"><h6>Bonus: <strong><?php echo $bonus_currency;?><?php echo $bonus_amount; ?></strong></h6></div>
                    <div class="claim-btn"><a href="<?php echo $goto_link;?>" target="_blank" rel="nofollow" class="cta cta-block cta-primary cta-small"><?php _e('Claim Now','ctl');?></a></div>
                  </div>
              </div>
   <?php
  }
}?>
</div>

