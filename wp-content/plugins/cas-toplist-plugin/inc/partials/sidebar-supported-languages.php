<?php global $global_settings; ?>

<div class="review-card">
  <h6><?php _e('Supported Languages','cjp');?> (<?php echo count($table_languages); ?>)</h6>
  
  <div class="casino-card-payments-list">
    <ul>
      <?php foreach ($table_languages as $p) { ?>
      <li><a href="#"><figure><img src="<?php echo TOPLIST_URL;?>/images/flag/<?php echo $p;?>.png" alt=""></figure></a></li>
      <?php } ?> 
      <?php if(count($table_languages) > 4 ){ ?>
      <li><a href="javascript:void(0);" class="cta cta-more cta-more-small">...</a></li>
  	  <?php } ?>
    </ul>
  </div>
</div>