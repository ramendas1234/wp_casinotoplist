<div class="col-sm-12">
    <?php global $global_settings; ?>
    <?php
    if (!empty($table_partner)) {
        foreach ($table_partner as $p) {
            include('product-info.php');
            ?>
            <div class="casino-card casino-card-vertical casino-card-payment-guide casino-card-online">
                <div class="left-panel-img"><img src="<?php echo!empty($image) ? $image : TOPLIST_URL . 'images/notallowed.png'; ?>" alt="<?php echo $partner; ?>"></div>
                <div class="mid-panel">
                    <div class="review-text">
                        <h4><?php echo $partner; ?></h4>
                        <?php if (!empty($bonus)): ?>
                            <div class="review-text-bonus">
                                <p><img class="icon" src="<?php echo TOPLIST_URL; ?>images/icons/gift_icon.png" alt=""><?php echo $bonus; ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="pros-cons-list">
                        <?php if (!empty($pros)): ?>
                            <ul class="card-lists card-lists-pros">
                                <?php foreach ($pros as $pro): ?>
                                    <li><?php echo $pro; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                        <?php if (!empty($cons)): ?>
                            <ul class="card-lists card-lists-cons">
                                <?php foreach ($cons as $con): ?>
                                    <li><?php echo $con; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="right-panel">
                    <div class="right-panel-inner">
                        <div class="card-ratings">
                            <div class="rating-value">
                                <span class="result"><?php echo $rating; ?>/</span>5
                            </div>
                            <div class="rating-stars">
                                <?php
                                for ($x = 1; $x <= $rating; $x++) {
                                    ?>
                                    <figure><img src="<?php echo TOPLIST_URL ?>images/icons/star.svg" alt=""></figure>
                                    <?php
                                }
                                if (strpos($rating, '.')) {
                                    ?>
                                    <figure><img src="<?php echo TOPLIST_URL ?>images/icons/star_half.svg" alt=""></figure>
                                    <?php
                                    $x++;
                                }
                                while ($x <= 5) {
                                    ?>
                                    <figure><img src="<?php echo TOPLIST_URL ?>images/icons/star_empty.svg" alt=""></figure>
                                    <?php
                                    $x++;
                                }
                                ?>
                            </div>
                        </div>
                        <a href="<?php echo $review_link; ?>" class="cta cta-block cta-outline cta-primary"><?php _e('Review', 'ctl'); ?></a>
                        <a href="<?php echo $goto_link; ?>" class="cta cta-block cta-primary" target="_blank" rel="nofollow"><?php echo $button_text; ?></a>
                    </div>
                </div>
                <!-- <div class="disclaimer">
                  New customers only | Min. deposit: €20 | Max. bonus: €1000 | Wagering req. of 100% bonus: 25x (Bonus + Deposit) | Free Spin wagering req.: 20x Win Amount | 30 days to meet wagering req for free spins and bonus | T&amp;Cs Apply
                </div> -->
            </div>
            <?php
        }
    } else {
        ?>
        <div class="best-casinos-row" style="width:100%;">
            <div class="row u-align-items-center">
                <div class="col col-12">
                    <p class="nocasinos">
    <?php echo get_field('not_available_msg', 'option'); ?>
                    </p>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>