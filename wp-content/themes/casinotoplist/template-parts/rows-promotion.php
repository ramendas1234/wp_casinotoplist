
<div class="col-sm-12">
    <div class="casino-card casino-card-vertical casino-card-payment-guide casino-card-promotions">
        <div class="left-panel-img">
            <?php if (has_post_thumbnail()) { ?>
                <?php the_post_thumbnail(); ?>
            <?php } else { ?> 
                <img src="<?php echo CTL_URL; ?>/images/notallowed.png" alt=""> 
            <?php } ?>
        </div>
        <div class="mid-panel">
            <div class="read-review">
                <a href="<?php the_permalink(); ?>" class="read-review-link">
                    <?php if (has_post_thumbnail()) { ?>
                        <?php the_post_thumbnail(); ?>
                    <?php } else { ?> 
                        <img src="<?php echo CTL_URL; ?>/images/notallowed.png" alt=""> 
                    <?php } ?>
                    <span><?php _e('Read full review', 'ctl'); ?></span></a>
            </div>
            <h5><?php the_title(); ?></h5>
            <p>
                <?php the_excerpt(); ?>
            </p>
        </div>
        <div class="right-panel">
            <div class="promotion-timer-block">
                <p><?php _e('Promotion time left', 'ctl'); ?>:</p>
                <div class="timer-block" data-date="<?php echo get_field('event_date'); ?>" style="<?php echo $time_display;?>">
                    <ul>
                        <li>
                            <div class="timer-box timer-box-days">26</div>
                            <span>day(s)</span>
                        </li>
                        <li><i>:</i></li>
                        <li>
                            <div class="timer-box timer-box-hours">21</div>
                            <span>hours(s)</span>
                        </li>
                        <li><i>:</i></li>
                        <li>
                            <div class="timer-box timer-box-mins">18</div>
                            <span>min(s)</span>
                        </li>
                        <li><i>:</i></li>
                        <li>
                            <div class="timer-box timer-box-secs">18</div>
                            <span>sec(s)</span>
                        </li>
                    </ul>
                </div>
                <a href="<?php echo (!empty($p))?$p['go_link']:'javascript:void(0)'; ?>" target="_blank" rel="nofollow" class="cta cta-block cta-primary"><?php echo $btn_label; ?></a>
                <span><?php _e('Terms and conditions apply to this offer', ''); ?></span>
            </div>
        </div>
        <div class="disclaimer" style="<?php echo $tc_display;?>">
            <?php echo get_field('t&c_promotion'); ?>
        </div>
    </div>
</div>