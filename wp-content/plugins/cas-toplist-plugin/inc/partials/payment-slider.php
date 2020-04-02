<?php global $global_settings; ?>
<?php 
	$overview=explode('||',isset($payment_option['overview'])?$payment_option['overview']:'');
	$short_desc=isset($overview[0])?$overview[0]:'';
	$long_desc=isset($overview[1])?$overview[1]:'';
?>
<li>
  <a href="<?php echo !empty($payment_option['url'])?$payment_option['url']:'';?>"><img src="<?php echo !empty($payment_option['url'])?$payment_option['url']:TOPLIST_URL.'images/notallowed.png';?>" alt="<?php echo !empty($payment_option['name'])?$payment_option['name']:'Payment Option';?>">
  </a>
  <h6><?php echo !empty($payment_option['name'])?$payment_option['name']:'';?> <?php  printf( _n( '(%s)', '(%s)', (int)$payment_option['toplist_count'], 'cjp' ), number_format_i18n( (int)$payment_option['toplist_count'] ) );?>
  </h6>
</li>      
