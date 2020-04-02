<?php global $global_settings; ?>

<?php 
if(empty($table_partner)){
?>
    <div class="review-card review-card-big">
        <div class="review-cta__bonus">
            <div class="review-cta__secondary-title">
                <span>Our system detected that you are outside <?php echo get_field('state_targeted_by_page','option');?>.<br><br>This review is intended for <?php echo get_field('state_targeted_by_page','option');?> visitors only.</span>
                <div class="rating-holder">
                </div>
            </div>
        </div>
        <div class="review-cta__brand">
            <div class="review-cta__logo">
                <img src="<?php echo TOPLIST_URL;?>images/notallowed.png" alt="not allowed">
            </div>
        </div>
    </div>
<?php
}else{

 foreach ($table_partner as $p) {

    include('product-info.php');

    if ($p['bonus_currency'] == "EUR") {
        $sign = "€";
    }else if ($p['bonus_currency'] == "USD") {
        $sign = "$";
    }else if ($p['bonus_currency'] == "GBP") {
        $sign = "£";
    }
?>
    <div class="review-card">
        <h6><?php _e('Min Deposit','cjp');?>:</h6>
        <div class="deposit">
          <input type="text" value="<?php if($p['minimum_deposit']){ echo $sign.$p['minimum_deposit']; } ?>" />
          <a href="#" class="cta cta-tooltip"></a>
        </div>
    </div>

    <div class="review-card">
        <h6><?php _e('Min Withdrawal','cjp');?>:</h6>
        <div class="deposit">
          <input type="text" value="$100" />
          <a href="#" class="cta cta-tooltip"></a>
        </div>
    </div>
<?php 
    } 
}
?>



