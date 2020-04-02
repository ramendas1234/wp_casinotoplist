<?php
                        if ($i == 1):
                            ?> 
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <div class="casino-card casino-card-feature">
                                    <div class="img-panel"><?php the_post_thumbnail('large'); ?></div>
                                    <div class="info-panel">
                                        <h5><?php the_title(); ?></h5>
                                        <p><?php the_content(); ?></p>
                                    </div>
                                    <div class="disclaimer" style="<?php echo $tc_display;?>">
                                        <?php echo get_field('t&c_promotion'); ?>
                                    </div>
                                </div>
                            </div>

                        <?php else: ?>
                            <div class="col-sm-12 col-md-6 col-lg-3">
                                <?php include CTL_PATH . '/template-parts/card-promotion.php';?>
                            </div>
                        <?php endif; ?>