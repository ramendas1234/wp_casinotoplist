<?php include('product-info.php');?>
<div class="col-sm-12">
    <div class="casino-card casino-card-vertical casino-card-high-roller">
        <div class="img-panel">
            <a href="<?php echo $goto_link; ?>"  target="_blank" rel="nofollow">
                <img src="<?php echo!empty($image) ? $image : TOPLIST_URL . 'images/notallowed.png'; ?>" alt="<?php echo $partner; ?>">
            </a>
        </div>
        <div class="info-panel">
            <h6 style="<?php echo ($meta[0]=='no')?'display:none':'display:block;';?>"><span><?php echo ($exc_bonus_amount != "" && $exc_bonus_amount != 0) ? __('Exclusive bonus : ', 'ctl') : __('Welcome bonus : ', 'ctl'); ?></span> up to <strong><?php echo $bonus_match; ?></strong></h6>
            <div class="card-mid-panel">
                <h6>High Roller Requirements:</h6>
                <p>500% bonus on the first 5 deposits of 1000 USD. (Deposit 1000 $ get 5000 $.)</p>
                <ul>
                    <li style="<?php echo ($meta[1]=='no')?'display:none':'display:block;';?>">
                        <?php _e('Min desposit','ctl');?>
                        <strong><?php echo ($min_deposit)?'$'. $min_deposit:'n.a';?></strong>
                    </li>
                    
                    <li style="<?php echo ($meta[2]=='no')?'display:none':'display:block;';?>">
                        <?php _e('Min wager','ctl');?>
                        <strong>$150000</strong>
                    </li>
                    <li>
                        <?php _e('Min Wager Explantation','ctl');?>
                        <strong>25 x Deposit &amp; Bonus</strong>
                    </li>
                </ul>
            </div>
            <div class="card-right-panel">
                <?php include 'ratings.php';?>
                <a href="<?php echo $goto_link; ?>" class="cta cta-inline cta-primary" target="_blank" rel="nofollow"><?php echo $button_text; ?></a>
            </div>
        </div>
    </div>
</div>

