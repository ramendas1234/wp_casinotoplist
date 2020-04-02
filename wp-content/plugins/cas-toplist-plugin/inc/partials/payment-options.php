<?php global $global_settings; ?>
<?php 
if(!empty($payment_options)){ 
	$countPaymentOptions = count($payment_options);
?>
<h6><?php _e('Payment Methods','cjp');?> (<?php echo $countPaymentOptions; ?>):</h6>
<div class="casino-card-payments-list">
    <ul>
      <?php foreach($payment_options as $key=>$payment_option){ ?>
      <?php $paymentOptionName[] = $payment_option['name']; ?>
      <li>
      	<a href="<?php echo !empty($payment_option['link'])?$payment_option['link']:'';?>">
      		<figure>
      			<img src="<?php echo !empty($payment_option['url'])?$payment_option['url']:'';?>" alt="<?php echo !empty($payment_option['name'])?$payment_option['name']:'Payment Option';?>">
      		</figure>
      	</a>
      </li>
      <?php } ?>
    </ul>
</div>
<p class="paymentoption"><?php echo implode(', ',$paymentOptionName); ?></p>
<button class="cta cta-close"><img src="<?php echo TOPLIST_URL; ?>/images/icons/cross.svg" alt="" /></button>
<?php } ?>