
<div class="casino-card">
    <?php if (has_post_thumbnail()) { ?>
        <div class="img-panel">
            <?php the_post_thumbnail('large'); ?>
        </div>
    <?php } ?>
    <div class="info-panel">
        <h5><?php the_title(); ?></h5>
        <span class="rem-days">
            <i><img src="<?php echo CTL_URL; ?>/images/icon/top_ico_1-2.svg" alt="Clock Image"></i>
            <?php
            $days_remaining = ctl_days_left(get_field('event_date'));
            echo $days_remaining;
            echo _n(' Day remaining', ' Day/s remaining', $days_remaining, 'ctl');
            ?>
        </span>
        <div class="cta-panel">
            <a href="<?php echo (!empty($p))?$p['go_link']:'javascript:void(0)'; ?>" target="_blank" rel="nofollow" class="cta cta-block cta-primary"><?php echo $btn_label; ?></a>
        </div>
    </div>
    <div class="disclaimer" style="<?php echo $tc_display;?>">
    <?php echo get_field('t&c_promotion'); ?>
    </div>
</div>
<div class="mb-10"></div>