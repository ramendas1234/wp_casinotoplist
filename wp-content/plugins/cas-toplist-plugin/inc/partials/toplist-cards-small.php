<?php global $global_settings; ?>

<div class="col-md-5">
    <h4 class="payment-tabs__title payment-tabs__title--small">recommended rooms</h4>
    <div class="payment-tabs__slick slick">
        <?php
        foreach ($table_partner as $p){
            include('toplist-card-small.php');
        }
        ?>
    </div>
    <a href="<?php echo $term_link ?>" target="_blank" rel="nofollow" class="cas-term">
        <?php _e('T&Cs Apply','cjp');?>
        <span><?php echo $term; ?></span>
    </a>
</div>