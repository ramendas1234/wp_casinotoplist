<?php global $global_settings; ?>
<?php
if(!empty($table_partner)){
?>
<div class="claim-list">
	<div class="row">
	<?php
	  foreach ($table_partner as $p) {
	      include('product-info.php');
	  	?>
	  	<div class="col-lg-6 col-sm-12">
	        <div class="casino-card casino-card-vertical casino-card-cliam">
	            <div class="img-panel"><a href="<?php echo $goto_link;?>" target="_blank" rel="nofollow"><img src="<?php echo !empty($image)?$image:TOPLIST_URL.'images/notallowed.png';?>" alt="<?php echo $partner;?>" /></a></div>
	            <div class="claim-text"><h6><?php echo ($exc_bonus_amount != "" && $exc_bonus_amount != 0?__('Exclusive Bonus: ','ctl'):'');printf(__('%s Bonus','ctl'),$bonus);?></h6></div>
	            <div class="claim-btn"><a href="<?php echo $review_link;?>" class="cta cta-block cta-primary cta-small"><?php _e('Claim','ctl');?></a></div>
	          </div>
	      </div>
	  	<?php

	  }
	  ?>
	</div>
</div>

  <?php
}