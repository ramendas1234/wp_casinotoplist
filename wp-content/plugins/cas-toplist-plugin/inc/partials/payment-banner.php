<?php global $global_settings; ?>
<?php 
  $overview=explode('||',$payment_option['overview']);
  $short_desc=isset($overview[0])?$overview[0]:'';
  $long_desc=isset($overview[1])?$overview[1]:'';
?>
<div class="col-lg-3 col-sm-12">
  <div class="icon-center">
    <img src="<?php echo !empty($payment_option['url'])?$payment_option['url']:TOPLIST_URL.'images/notallowed.png';?>" alt="<?php echo !empty($payment_option['name'])?$payment_option['name']:'Payment option';?>">
  </div>
</div>
<div class="col-lg-9 col-sm-12">
  <div class="text-content">
    <h4><?php echo !empty($payment_option['name'])?$payment_option['name']:'';?></h4>
    <p><?php echo $long_desc; ?></p>
  </div>
</div>