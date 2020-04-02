<?php global $global_settings; ?>
<?php
if(!empty($table_partner)){

  ?>
  <div class="paypal-support-table ramen">
    <div class="table-row">
      <div class="table-column img-col">&nbsp;</div>
      <div class="table-column bonus-col">
        <p><strong><?php _e('Max Bonus','ctl');?></strong></p>
      </div>
      <div class="table-column deposit-col">
          <p><strong><?php _e('Deposit','ctl');?></strong></p>
      </div>
      <div class="table-column withdrawl-col">
          <p><strong><?php _e('Withdrawal','ctl');?></strong></p>
      </div>
    </div>  
    <?php
    foreach ($table_partner as $p) {
      include('product-info.php');
      ?>
      <div class="table-row">
        <div class="table-column img-col"><a href="#"><img src="<?php echo !empty($image)?$image:TOPLIST_URL.'images/notallowed.png';?>" alt="<?php echo $partner;?>"></a></div>
        <div class="table-column bonus-col">
          <p><?php _e('up to','ctl');?> <span><?php echo $sign. $bonus_amount; ?></span></p>
        </div>
        <div class="table-column deposit-col">
          <img src="<?php echo CTL_URL;?>/images/icon/<?php echo !empty($p['deposit'])?'true':'cross'; ?>.png" alt="" />
        </div>
        <div class="table-column withdrawl-col">
          <img src="<?php echo CTL_URL;?>/images/icon/<?php echo !empty($p['withdrawal'])?'true':'cross'; ?>.png" alt="" />
        </div>
        <div class="table-column button-col">
          <a href="<?php echo $review_link;?>" class="cta cta-inline cta-outline"><?php _e('Read review','ctl');?></a>
          <a href="<?php echo $goto_link;?>" class="cta cta-inline cta-primary" target="_blank" rel="nofollow"><?php echo $button_text;?></a>
        </div>
      </div>
      <?php
    }
    ?>
  </div>
  <?php
}
?>

  
