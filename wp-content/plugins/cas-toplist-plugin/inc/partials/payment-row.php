<?php global $global_settings,$payment_method_id,$toplist_group_id; ?>
<?php
if(!empty($payment_option)){
    $overview=explode('||',!empty($payment_option['overview'])?$payment_option['overview']:'');
    $short_desc=isset($overview[0])?$overview[0]:'';
    $long_desc=isset($overview[1])?$overview[1]:'';
?>
<div class="row row-flex row-flex-center">
  <div class="col-sm-12">
    <div class="casino-card casino-card-vertical casino-card-payment-guide">
      <div class="left-panel-img"><img src="<?php echo !empty($payment_option['url'])?$payment_option['url']:TOPLIST_URL.'images/notallowed.png';?>" alt="<?php echo !empty($payment_option['name'])?$payment_option['name']:'Payment Option';?>"></div>
      <div class="mid-panel">
        <h5><?php echo !empty($payment_option['name'])?$payment_option['name']:'';?></h5>
        <p><?php echo $short_desc;?></p>
        <a href="<?php echo !empty($payment_option['link'])?$payment_option['link']:'';?>" class="cta cta-inline cta-outline"><?php _e('Read More','ctl');?></a>
      </div>
      <div class="right-panel">
        <span><?php _e('Supported casinos','ctl');?></span>
        <?php       
        $supported_casinos=trim(do_shortcode("[cas-toplist-group id='$toplist_group_id' style='grid-small' paymentmethod-id='$payment_method_id' asset-category-name='product_logo_136x136']"));
          if(!empty($supported_casinos))
          {
            echo $supported_casinos;
          }
        ?>
      </div>
    </div>
  </div>
</div>
<?php  
}?>