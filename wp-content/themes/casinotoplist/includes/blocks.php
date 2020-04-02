<?php
/* Create blocks */

function ctl_enqueue_block_editor_assets() {

    // Enqueue the bundled block JS file
    wp_enqueue_script(
            'ctl-blocks-js', CTL_URL . '/assets/js/editor.blocks.js', ['wp-i18n', 'wp-element', 'wp-blocks', 'wp-components', 'wp-editor'], null
    );
    wp_enqueue_style(
            'ctl-blocks-css', CTL_URL . '/assets/css/blocks.editor.css', [], null
    );
}

add_action('enqueue_block_editor_assets', 'ctl_enqueue_block_editor_assets');
/* Create blocks */

/* Create new block category */

function ctl_block_category($categories, $post) {
    return array_merge(
            $categories, array(
        array(
            'slug' => 'casinotoplist',
            'title' => __('Casinotoplist Blocks', 'ctl'),
        ),
            )
    );
}

add_filter('block_categories', 'ctl_block_category', 10, 2);
/* Create new block category */


/* Register blocks */
add_action('init', 'ctl_register_blocks');

function ctl_register_blocks() {
    //Best online casino
    register_block_type(
            'casinotoplist/best-online-casino', array(
        /* 'style'         => 'users_table_block-cgb-style-css',
          'script'        => 'users_table_block-script-js',
          'editor_script' => 'users_table_block-cgb-block-js',
          'editor_style'  => 'users_table_block-cgb-block-editor-css',

          'attributes'      => array(
          'group_id' => array(
          'type'    => 'integer',
          'default' => 10,
          ),
          ), */
        'render_callback' => 'ctl_best_online_casino_list_cb',
            )
    );

    //Casino Promotion list
    register_block_type(
            'casinotoplist/casino-promotion-cards', array(
        'render_callback' => 'ctl_casino_promotion_cards_cb',
            )
    );
    //Game Filter
    register_block_type(
            'casinotoplist/game-filter', array(
        'render_callback' => 'ctl_game_filter_cb',
            )
    );
    //Vertical Casino Promotion
    register_block_type(
            'casinotoplist/casino-promotion-rows', array(
        'render_callback' => 'ctl_casino_promotion_rows_cb',
            )
    );
    //Casino Match
    register_block_type(
            'casinotoplist/casino-match', array(
        'render_callback' => 'ctl_casino_match_cb',
            )
    );

    //Game Guide block
    register_block_type(
            'casinotoplist/game-guide', array(
        'render_callback' => 'ctl_casino_game_guide_cb',
            )
    );
    //Special Bonus block
    register_block_type(
            'casinotoplist/single-advertisment-casino', array(
        'render_callback' => 'ctl_single_advertisment_casino_cb',
            )
    );

    //Payment OPtions List
    register_block_type(
            'casinotoplist/payment-options-list', array(
        'style' => 'editor',
        'attributes' => array(
            'title' => array(
                'type' => 'string',
                'default' => 'Online Casino Payment Guide',
            ),
        ),
        'render_callback' => 'ctl_payment_list_cb',
            )
    );

    //Testimonial
    register_block_type(
            'casinotoplist/testimonial', array(
        'style' => 'editor',
        'attributes' => array(
            'testimonial_title' => array(
                'type' => 'string',
                'default' => 'Testimonials',
            ),
        ),
        'render_callback' => 'ctl_testimonial_cb',
            )
    );


    //Casino Toplist
    register_block_type(
            'casinotoplist/casino-toplist', array(
        'style' => 'editor',
        'render_callback' => 'ctl_casino_toplist_cb',
            )
    );
    //Common Banner
    register_block_type(
            'casinotoplist/common-banner', array(
        'render_callback' => 'ctl_common_banner_cb',
            )
    );
    //Common Banner
    register_block_type(
            'casinotoplist/high-roller-casino-list', array(
        'attributes' => array(
            'group_id' => array(
                'type' => 'string',
                'default' => '2',
            ),
            'quantity' => array(
                'type' => 'string',
                'default' => '6',
            ),
            'welcom_bonus' => array(
                'type' => 'string',
                'default' => 'yes',
            ),
            'min_deposit' => array(
                'type' => 'string',
                'default' => 'yes',
            ),
            'min_wager' => array(
                'type' => 'string',
                'default' => 'yes',
            ),
        ),
        'render_callback' => 'ctl_high_roller_casino_cb',
            )
    );

    //Promotion List
    register_block_type(
            'casinotoplist/casino-promotion', array(
        'render_callback' => 'ctl_promotion_list_cb',
            )
    );
    //Article Top Content
    register_block_type(
            'casinotoplist/article-top-content', array(
        'render_callback' => 'ctl_article_top_content_cb',
            )
    );
    //Casino Software List
    register_block_type(
            'casinotoplist/casino-software-list', array(
        'render_callback' => 'ctl_software_list_cb',
            )
    );
    //News Top List
    register_block_type(
            'casinotoplist/news-toplist', array(
        'render_callback' => 'ctl_news_list_cb',
            )
    );
    //TEST BLOCK
    register_block_type(
            'casinotoplist/casino-toplist-classic', array(
        'render_callback' => 'ctl_test_cb',
            )
    );
}

/* Register blocks */

/* Casino list */

function ctl_best_online_casino_list_cb($args) {

    $output = '';
    ob_start();
    ?>
    <section class="casino-toplist-info">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="toplist-info">
                        <h4><?php echo $args['casino_list_title']; ?></h4>
                        <p><?php echo $args['casino_list_description']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="mb-30"></div>
    <div class="container">
        <div class="ct-section-title">
            <h6><i class="icon icon-casinos"></i> <?php echo $args['best_online_casino_section_heading']; ?></h6>
        </div>
        <div class="row row-flex row-flex-center">
            <?php echo do_shortcode("[cas-toplist-group id='" . $args['group_id'] . "' qty='" . $args['qty'] . "' style='rows']"); ?>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <p class="terms-condition text-right"><a href="#">Terms and conditions</a> might apply to these offers.</p>
            </div>
        </div>
    </div>
    <?php
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}

/* Casino list */

/* Casino Promotion list */

function ctl_casino_promotion_cards_cb($args) {

    $output = '';
    ob_start();
    ?>
    <section class="ct-card-toplist">
        <div class="container">
            <div class="row row-flex row-flex-nowrap">
                <?php
                $i = 1;
                $promotions_query = new WP_Query(array('post_type' => 'casino_promotion', 'post_status' => 'publish', 'posts_per_page' => (!empty($args['qty'])) ? $args['qty'] : 3, 'meta_query' => array(array('key' => 'event_date', 'value' => date('Ymd'), 'compare' => '>=', 'type' => 'NUMERIC'))));
                if ($promotions_query->have_posts()) {
                    while ($promotions_query->have_posts()) {
                        $promotions_query->the_post();
                        ?>
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
                                    <div class="disclaimer">
                                        <p>No Deposit Offer : New players only • £88 is granted in FreePlay (FP) • FP must be claimed within 48 hours of receiving the email and expires after 14 days • FP winnings are credited as bonus and capped at £15, unless a Jackpot win • Welcome Bonus Package: 1st deposit immediate 100% up to £100 bonus • 2nd -5th deposits must be completed within 7 days and must be wagered 3 times within 7 days to receive 30% up to £350 bonus • £20 min deposit • Bonus wins are capped at £500 • To withdraw bonus & related wins, wager 30 x (bonus amount) within 90 days • Wagering requirements vary by game • This offer may not be combined with any other offer • Withdrawal restrictions & full T&Cs apply: No Deposit Offer terms & Welcome Bonus Package terms. <a href="#">Click for full T&C's</a> </p>
                                    </div>
                                </div>
                            </div>

                        <?php else: ?>
                            <div class="col-sm-12 col-md-6 col-lg-3">
                                <?php get_template_part('template-parts/sidebar', 'promotion') ?>
                            </div>
                        <?php endif; ?>

                        <?php
                        $i++;
                    }
                    wp_reset_postdata();
                }
                ?>    
            </div>
        </div>
    </section>



    <?php
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}

/* Casino Promotion list */

/*   Game Filter Block Function */

function ctl_game_filter_cb($args) {
    $output = '';
    ob_start();
    ?>
    <section class="ct-top-leve-game gray-bg p-30">
        <div class="container">
            <div class="game-filter-menu">
                <ul>
                    <?php
                    $game_categories = get_terms(array(
                        'taxonomy' => 'game_category',
                        'hide_empty' => FALSE,
                        'parent' => 0
                    ));
                    foreach ($game_categories as $k => $single_category):
                        ?>
                        <li data-tab="tab-<?php echo $single_category->term_id; ?>" class="<?php echo ($k < 1) ? 'active' : '' ?>"><?php echo $single_category->name; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="game-filter-container">
                <?php
                foreach ($game_categories as $k => $single_category):
                    ?>

                    <div id="tab-<?php echo $single_category->term_id; ?>" class="tab-content <?php echo ($k < 1) ? 'active' : '' ?>">
                        <?php
                        $game_args = array(
                            'post_type' => 'free_game',
                            'posts_per_page' => 4,
                            'post_status' => 'publish',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'game_category',
                                    'field' => 'term_id',
                                    'terms' => array($single_category->term_id)
                                )
                            )
                        );
                        $the_query = new WP_Query($game_args);
                        if ($the_query->have_posts()) {
                            while ($the_query->have_posts()):$the_query->the_post();
                                $gameimages = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
                                ?>
                                <div class="casino-card casino-card-top-game">
                                    <div class="img-panel">
                                        <img src="<?php echo $gameimages[0]; ?>" alt="" />
                                        <div class="btn-overlay">
                                            <a href="<?php the_permalink(); ?>" class="cta cta-block cta-primary">Play Now</a>
                                            <a href="#" class="cta cta-block cta-outline">Tg</a>
                                        </div>
                                    </div>
                                    <div class="info-panel">
                                        <h6><?php the_title(); ?></h6>
                                    </div>
                                </div>
                                <?php
                            endwhile;
                        }else {
                            ?>
                            <div class="no-post-found">Sorry No Game Found.</div>
                        <?php } ?>
                    </div>
                    <?php
                endforeach;
                wp_reset_postdata();
                ?>
            </div>


        </div>
    </section>    
    <?php
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
}

/* Vertical Casino Promotion  */

function ctl_casino_promotion_rows_cb($args) {
    $promotions_query = new WP_Query(array('post_type' => 'casino_promotion', 'post_status' => 'publish', 'posts_per_page' => (!empty($args['qty'])) ? $args['qty'] : 5, 'meta_query' => array(array('key' => 'event_date', 'value' => date('Ymd'), 'compare' => '>=', 'type' => 'NUMERIC'))));
    $output = '';
    ob_start();
    if ($promotions_query->have_posts()):
        ?>
        <section class="ct-casino-promotions">
            <div class="container">
                <div class="ct-section-title">
                    <h6><i class="icon icon-promotion"></i><?php echo $args['promotion_title']; ?></h6>
                    <a href="javascript:void(0);" class="ct-section-link"><?php _e('Check all promotion', 'ctl'); ?></a>
                </div>
                <div class="row row-flex row-flex-center">
                    <?php
                    while ($promotions_query->have_posts()) {
                        $promotions_query->the_post();
                        ?>
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
                                        <div class="timer-block" data-date="<?php echo get_field('event_date'); ?>">
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
                                        <a href="#" class="cta cta-block cta-primary"><?php _e('Qualify Now', ''); ?></a>
                                        <span><?php _e('Terms and conditions apply to this offer', ''); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }wp_reset_postdata(); ?>    
                </div>    

            </div>
        </section>
        <?php
    else:
        ?>
        <div class="container"><?php _e('Sorry No Upcoming Promotion found', 'ctl'); ?></div>    
    <?php
    endif;
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
}

/*   Casino Match Function */

function ctl_casino_match_cb($args) {
    $output = '';
    $title = $args['title'];
    $sub_title = $args['sub_title'];
    ob_start();
    ?>
    <section class="ct-casino-match gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="casino-match-top-lists">
                        <form method="post" action="#">
                            <div class="slider casino-match-options">
                                <!--step One-->
                                <div class="match-holder">
                                    <div class="match-header text-center">
                                        <h2><?php echo $title; ?></h2>
                                        <p><?php echo $sub_title; ?></p>
                                    </div>
                                    <div class="holder-wrapper">
                                        <div class="casino-match-item">
                                            <div class="match-card">
                                                <img src="<?php echo CTL_URL; ?>/images/icon/interface-icon-kit/casino match_ico_1.svg" alt="">
                                                <label>
                                                    <input type="radio" name="choose-step" id="option-1">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <p class="card-title">Slots</p>
                                        </div>
                                        <div class="casino-match-item">
                                            <div class="match-card">
                                                <img src="<?php echo CTL_URL; ?>/images/icon/interface-icon-kit/casino match_ico_2.svg" alt="">
                                                <label>
                                                    <input type="radio" name="choose-step" id="option-1">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <p class="card-title">Roulette</p>
                                        </div>
                                        <div class="casino-match-item">
                                            <div class="match-card">
                                                <img src="<?php echo CTL_URL; ?>/images/icon/interface-icon-kit/casino match_ico_3.svg" alt="">
                                                <label>
                                                    <input type="radio" name="choose-step" id="option-1">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <p class="card-title">Blackjack</p>
                                        </div>
                                        <div class="casino-match-item">
                                            <div class="match-card">
                                                <img src="<?php echo CTL_URL; ?>/images/icon/interface-icon-kit/casino match_ico_4.svg" alt="">
                                                <label>
                                                    <input type="radio" name="choose-step" id="option-1">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <p class="card-title">Video Poker</p>
                                        </div>
                                        <div class="casino-match-item">
                                            <div class="match-card">
                                                <img src="<?php echo CTL_URL; ?>/images/icon/interface-icon-kit/casino match_ico_5.svg" alt="">
                                                <label>
                                                    <input type="radio" name="choose-step" id="option-1">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <p class="card-title">Craps</p>
                                        </div>
                                        <div class="casino-match-item">
                                            <div class="match-card">
                                                <img src="<?php echo CTL_URL; ?>/images/icon/interface-icon-kit/casino match_ico_6.svg" alt="">
                                                <label>
                                                    <input type="radio" name="choose-step" id="option-1">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <p class="card-title">Baccarat</p>
                                        </div>
                                        <div class="casino-match-item">
                                            <div class="match-card">
                                                <img src="<?php echo CTL_URL; ?>/images/icon/interface-icon-kit/casino match_ico_7.svg" alt="">
                                                <label>
                                                    <input type="radio" name="choose-step" id="option-1">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <p class="card-title">Pai Pow</p>
                                        </div>
                                        <div class="casino-match-item">
                                            <div class="match-card">
                                                <img src="<?php echo CTL_URL; ?>/images/icon/interface-icon-kit/casino match_ico_8.svg" alt="">
                                                <label>
                                                    <input type="radio" name="choose-step" id="option-1">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <p class="card-title">Keno</p>
                                        </div>
                                        <div class="casino-match-item">
                                            <div class="match-card">
                                                <img src="<?php echo CTL_URL; ?>/images/icon/interface-icon-kit/casino match_ico_9.svg" alt="">
                                                <label>
                                                    <input type="radio" name="choose-step" id="option-1">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <p class="card-title">Caribbean</p>
                                        </div>
                                        <div class="casino-match-item">
                                            <div class="match-card">
                                                <img src="<?php echo CTL_URL; ?>/images/icon/interface-icon-kit/casino match_ico_10.svg" alt="">
                                                <label>
                                                    <input type="radio" name="choose-step" id="option-1">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <p class="card-title">Bingo</p>
                                        </div>
                                    </div>
                                </div>
                                <!--End step One-->

                                <!--step Two-->

                                <div class="match-holder">
                                    <div class="match-header text-center">
                                        <h2>Casino Match</h2>
                                        <div class="casino-match-steps">
                                            <a href="#" class="btn btn-prev">Previous</a>
                                            <div class="step-mover">
                                                <ul>
                                                    <li class="visited">
                                                        <a href="">
                                                            <span>1</span>
                                                            Game type
                                                        </a>
                                                    </li>
                                                    <li class="current">
                                                        <a href="">
                                                            <span>2</span>
                                                            Dealer type
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <span>3</span>
                                                            Payout speed
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <span>4</span>
                                                            Results
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- <p class="step-count">Step <span>2</span> of 4</p> -->
                                            <a href="#" class="btn btn-next">Next</a>
                                        </div>
                                        <p>Choose your Dealer Type</p>
                                    </div>
                                    <div class="holder-wrapper">
                                        <div class="casino-match-item selected">
                                            <div class="match-card">
                                                <img src="<?php echo CTL_URL; ?>/images/icon/interface-icon-kit/casino match_ico_11.png" alt="">
                                                <label>
                                                    <input type="radio" name="choose-step" id="option-1">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <p class="card-title">Online Dealer</p>
                                        </div>
                                        <div class="casino-match-item">
                                            <div class="match-card">
                                                <img src="<?php echo CTL_URL; ?>/images/icon/interface-icon-kit/casino match_ico_12.png" alt="">
                                                <label>
                                                    <input type="radio" name="choose-step" id="option-1">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <p class="card-title">Live Dealer</p>
                                        </div>
                                        <div class="casino-match-item">
                                            <div class="match-card">
                                                <img src="<?php echo CTL_URL; ?>/images/icon/interface-icon-kit/casino match_ico_13.png" alt="">
                                                <label>
                                                    <input type="radio" name="choose-step" id="option-1">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <p class="card-title">No preference</p>
                                        </div>
                                    </div>
                                </div>
                                <!--End step Two-->

                                <!--step Three-->


                                <div class="match-holder">
                                    <div class="match-header text-center">
                                        <h2>Casino Match</h2>
                                        <div class="casino-match-steps">
                                            <a href="#" class="btn btn-prev">Previous</a>
                                            <div class="step-mover">
                                                <ul>
                                                    <li>
                                                        <a href="">
                                                            <span>1</span>
                                                            Game type
                                                        </a>
                                                    </li>
                                                    <li class="visited">
                                                        <a href="">
                                                            <span>2</span>
                                                            Dealer type
                                                        </a>
                                                    </li>
                                                    <li class="current">
                                                        <a href="">
                                                            <span>3</span>
                                                            Payout speed
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <span>4</span>
                                                            Results
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <a href="#" class="btn btn-next">Next</a>
                                        </div>
                                        <p>Choose preferred payout speed</p>
                                    </div>
                                    <div class="holder-wrapper">
                                        <div class="casino-match-item">
                                            <div class="match-card">
                                                <img src="<?php echo CTL_URL; ?>/images/icon/interface-icon-kit/casino match_ico_14.png" alt="">
                                                <label>
                                                    <input type="radio" name="choose-step" id="option-1">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <p class="card-title">1-3 Days</p>
                                        </div>
                                        <div class="casino-match-item">
                                            <div class="match-card">
                                                <img src="<?php echo CTL_URL; ?>/images/icon/interface-icon-kit/casino match_ico_15.png" alt="">
                                                <label>
                                                    <input type="radio" name="choose-step" id="option-1">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <p class="card-title">2-4 Days</p>
                                        </div>
                                        <div class="casino-match-item">
                                            <div class="match-card">
                                                <img src="<?php echo CTL_URL; ?>/images/icon/interface-icon-kit/casino match_ico_16.png" alt="">
                                                <label>
                                                    <input type="radio" name="choose-step" id="option-1">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <p class="card-title">1 Week</p>
                                        </div>
                                    </div>
                                </div>
                                <!--End step Three-->

                                <!--step Four-->

                                <div class="match-holder">
                                    <div class="match-header text-center">
                                        <h2>Casino Match</h2>
                                        <div class="casino-match-steps">
                                            <a href="#" class="btn btn-prev">Previous</a>
                                            <div class="step-mover">
                                                <ul>
                                                    <li>
                                                        <a href="">
                                                            <span>1</span>
                                                            Game type
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <span>2</span>
                                                            Dealer type
                                                        </a>
                                                    </li>
                                                    <li class="visited">
                                                        <a href="">
                                                            <span>3</span>
                                                            Payout speed
                                                        </a>
                                                    </li>
                                                    <li class="current">
                                                        <a href="">
                                                            <span>4</span>
                                                            Results
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <p>Choosed casinos based on your preferences</p>
                                    </div>
                                    <div class="holder-wrapper">
                                        <div class="casino-match-item casino-match-item-full">
                                            <div class="casino-card casino-card-vertical casino-card-payment-guide casino-card-review">
                                                <div class="left-panel-img"><a href="#"><img src="<?php echo CTL_URL; ?>/images/casino promotions-1.png" alt=""></a></div>
                                                <div class="mid-panel">
                                                    <div class="card-review-content">
                                                        <div class="review-text">
                                                            <div class="review-text-bonus">
                                                                <span>Casino Las Vegas</span>
                                                                <p><img class="icon" src="<?php echo CTL_URL; ?>/images/gift_icon.png" alt="">Welcome bonus: 100% up to $1000</p>
                                                            </div>
                                                            <div class="card-ratings">
                                                                <div class="rating-value">
                                                                    <span class="result">5.0</span>/5
                                                                </div>
                                                                <div class="rating-stars">
                                                                    <figure><img src="<?php echo CTL_URL; ?>/images/icon/star-orange.svg" alt=""></figure>
                                                                    <figure><img src="<?php echo CTL_URL; ?>/images/icon/star-orange.svg" alt=""></figure>
                                                                    <figure><img src="<?php echo CTL_URL; ?>/images/icon/star-orange.svg" alt=""></figure>
                                                                    <figure><img src="<?php echo CTL_URL; ?>/images/icon/star-orange.svg" alt=""></figure>
                                                                    <figure><img src="<?php echo CTL_URL; ?>/images/icon/star-half.svg" alt=""></figure>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="review-info">
                                                            <div class="info-box">
                                                                <p>Game type</p>
                                                                <div class="info-box-card">
                                                                    <div class="match-card">
                                                                        <img src="<?php echo CTL_URL; ?>/images/icon/interface-icon-kit/casino match_ico_2.svg" alt="">
                                                                    </div>
                                                                    <p class="card-title">Roulette</p>
                                                                </div>
                                                            </div>
                                                            <div class="info-box">
                                                                <p>Dealer type</p>
                                                                <div class="info-box-card">
                                                                    <div class="match-card">
                                                                        <img src="<?php echo CTL_URL; ?>/images/icon/interface-icon-kit/casino match_ico_11.png" alt="">
                                                                    </div>
                                                                    <p class="card-title">Online Dealer</p>
                                                                </div>
                                                            </div>
                                                            <div class="info-box">
                                                                <p>Payout speed</p>
                                                                <div class="info-box-card">
                                                                    <div class="match-card">
                                                                        <img src="<?php echo CTL_URL; ?>/images/icon/interface-icon-kit/casino match_ico_14.png" alt="">
                                                                    </div>
                                                                    <p class="card-title">1-3 Days</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="right-panel">
                                                    <div class="right-panel-inner">
                                                        <a href="#" class="cta cta-block cta-outline">Review</a>
                                                        <a href="#" class="cta cta-block cta-primary">Play</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="casino-match-item casino-match-item-full">
                                            <div class="casino-card casino-card-vertical casino-card-payment-guide casino-card-review">
                                                <div class="left-panel-img"><a href="#"><img src="<?php echo CTL_URL; ?>/images/casino promotions-1.png" alt=""></a></div>
                                                <div class="mid-panel">
                                                    <div class="card-review-content">
                                                        <div class="review-text">
                                                            <div class="review-text-bonus">
                                                                <span>Casino Las Vegas</span>
                                                                <p><img class="icon" src="<?php echo CTL_URL; ?>/images/gift_icon.png" alt="">Welcome bonus: 100% up to $1000</p>
                                                            </div>
                                                            <div class="card-ratings">
                                                                <div class="rating-value">
                                                                    <span class="result">5.0</span>/5
                                                                </div>
                                                                <div class="rating-stars">
                                                                    <figure><img src="<?php echo CTL_URL; ?>/images/icon/star-orange.svg" alt=""></figure>
                                                                    <figure><img src="<?php echo CTL_URL; ?>/images/icon/star-orange.svg" alt=""></figure>
                                                                    <figure><img src="<?php echo CTL_URL; ?>/images/icon/star-orange.svg" alt=""></figure>
                                                                    <figure><img src="<?php echo CTL_URL; ?>/images/icon/star-orange.svg" alt=""></figure>
                                                                    <figure><img src="<?php echo CTL_URL; ?>/images/icon/star-half.svg" alt=""></figure>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="review-info">
                                                            <div class="info-box">
                                                                <p>Game type</p>
                                                                <div class="info-box-card">
                                                                    <div class="match-card">
                                                                        <img src="<?php echo CTL_URL; ?>/images/icon/interface-icon-kit/casino match_ico_2.svg" alt="">
                                                                    </div>
                                                                    <p class="card-title">Roulette</p>
                                                                </div>
                                                            </div>
                                                            <div class="info-box">
                                                                <p>Dealer type</p>
                                                                <div class="info-box-card">
                                                                    <div class="match-card">
                                                                        <img src="<?php echo CTL_URL; ?>/images/icon/interface-icon-kit/casino match_ico_11.png" alt="">
                                                                    </div>
                                                                    <p class="card-title">Online Dealer</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="right-panel">
                                                    <div class="right-panel-inner">
                                                        <a href="#" class="cta cta-block cta-outline">Review</a>
                                                        <a href="#" class="cta cta-block cta-primary">Play</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--End step Four-->

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Casino match-->    
    <?php
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
}

function ctl_casino_game_guide_cb($args) {
    $games_query = new WP_Query(array('post_type' => 'casino_game', 'post_status' => 'publish', 'posts_per_page' => (!empty($args['qty'])) ? $args['qty'] : 9));
    $output = '';
    ob_start();
    ?>
    <section class="ct-game-guide pt-30">
        <div class="container">
            <?php if($args['title'] || $args['check_all_guides']):?>
            <div class="ct-section-title">
                <h6><i class="icon icon-casino-guide"></i> <?php echo $args['title']; ?></h6>
                <?php if($args['check_all_guides'] && !empty($args['all_guides_url'])):?>
                <a href="<?php echo esc_url($args['all_guides_url']); ?>" class="ct-section-link">Check all game guide</a>
                <?php endif;?>
            </div>
            <?php endif;?>
            <?php if (!empty($args['sub_title'])): ?>
                <p> <?php echo $args['sub_title']; ?></p>
            <?php endif; ?>
            <div class="row">
                <?php
                if ($games_query->have_posts()):
                    while ($games_query->have_posts()) {
                        $games_query->the_post();
                        $game_content = get_the_content();
                        ?>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="casino-card casino-card-vertical casino-card-info">
                                <div class="info-card-img">
                                    <?php if (has_post_thumbnail()) { ?>
                                        <?php the_post_thumbnail(); ?>
                                    <?php } else { ?>
                                        <img src="<?php echo CTL_URL; ?>/images/notallowed.png" alt="<?php the_title(); ?>" />
                                    <?php } ?>
                                </div>
                                <div class="info-card-content">
                                    <h6><?php the_title(); ?></h6>
                                    <p><?php echo substr(get_the_excerpt(), 0, 100) . "…"; ?></p>
                                    <a href="<?php the_permalink(); ?>" class="cta cta-outline cta-small"><?php _e('Read More', 'ctl'); ?></a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    wp_reset_postdata();
                else:
                    ?>
                    <div class="no-post-found"><?php _e("Sorry no game guides found", 'ctl'); ?></div>
                <?php endif; ?>
            </div> 
        </div>
    </section>
    <?php
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
}

function ctl_single_advertisment_casino_cb($args) {
    $output = '';
    $pid = $args['product_id'];
    $p = (array) json_decode(do_shortcode("[cas-product-details pid='$pid' review='return']"));

    if (!empty($p)) {
        include_once CTL_PATH . '/template-parts/product-info.php';
        ob_start();
        ?>
        <section class="ct-bonus-banner">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="ct-bonus-banner-content" style="background: url('<?php echo CTL_URL; ?>/images/background-banner-promotions.png');">
                            <div class="bonus-banner-title"><a href="<?php echo $goto_link; ?>"><?php echo $partner; ?></a></div>
                            <div class="bonus-banner-info">
                                <div class="bonus-banner-img"><a href="<?php echo $goto_link; ?>"><img src="<?php echo $image_mid; ?>" alt=""></a></div>
                                <div class="bonus-banner-spacer"></div>
                                <div class="bonus-banner-info-content">
                                    <span><?php echo strtoupper($args['short_text']); ?>:</span>
                                    <h3><?php echo $bonus; ?></h3>
                                </div>
                            </div>
                            <div class="bonus-banner-button"><a href="<?php echo $goto_link; ?>" class="cta cta-inline cta-primary"><?php echo $button_text; ?></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
        $output = ob_get_contents();
        ob_end_clean();
    }
    return $output;
}

function ctl_payment_list_cb($args) {
    $output = '';
    $qty = $args['qty'];
    $group_id = $args['group_id'];
    $shortcode = '[payment-methods qty="' . $qty . '"  group_id="'.$group_id.'"]';
    ob_start();
    ?>
    <section class="ct-payment-guide">
        <div class="container">
            <?php if (array_key_exists('title', $args) && !empty($args['title'])): ?>
                <div class="ct-section-title">
                    <h6><?php echo $args['title']; ?></h6>
                    <a href="#" class="ct-section-link">Check all payment guide</a>
                </div>
            <?php endif; ?>

            <!-- -------EACH PAYMENT ITEM------  -->

            <div class="row row-flex row-flex-center">
                <?php echo $shortcode; ?>
            </div>

            <!-- -------EACH PAYMENT ITEM------  -->
        </div>
    </section>   
    <?php
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
}

function ctl_testimonial_cb($args) {
    $output = '';
    $testimonial_query = new WP_Query(array('post_type' => 'casino_testimonial', 'post_status' => 'publish', 'posts_per_page' => -1, 'meta_key' => 'is_featured', 'meta_value' => 'Yes'));
    if ($testimonial_query->have_posts()) {
        ob_start();
        ?>
        <section class="ct-testimonial gray-bg">
            <div class="container">
                <h6><?php echo $args['testimonial_title']; ?></h6>
                <div class="slider testimonial-slider">
                    <?php
                    while ($testimonial_query->have_posts()) {
                        $testimonial_query->the_post();
                        ?>
                        <div class="testimonial-item">
                            <div class="casino-card casino-card-testimonial">
                                <?php
                                $author_pic = get_field('author_image');
                                if (!empty($author_pic)) {
                                    ?>
                                    <div class="author-pic">
                                        <img src="<?php echo $author_pic; ?>" alt="">
                                    </div>
                                <?php } ?>
                                <h4 class="author-title"><?php echo get_field('author_name'); ?></h4>
                                <div class="testimonial-content">
                                    <p>
                                        <?php echo get_field('about_author'); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </section>
        <?php
        $output = ob_get_contents();
        ob_end_clean();
    }
    return $output;
}

function ctl_casino_toplist_cb($args) {
    $output = '';
    
    $atts = shortcode_atts(array(
        'heading' => '',
        'group_id' => '',
        'type' => '',
        'bonus_type' => '',
        'style' => 'rows',
        'start_at_desktop' => '',
        'qty_desktop' => '6',
        'start_at_mobile' => '',
        'qty_mobile' => '3',
        'load_more_qty' => '',
        'show_load_more' => 'no',
        'show_supported_casino' => 'no',
        'supported_casino' => '',
        'supported_id' => '',
        'show_term_link' => 'no',
        'term_text' => '',
        'term_link' => '',
        'check_all_casino' => false,
        'all_casino_url' => ''
            ), $args);
//    if($atts['check_all_casino'] && !empty($atts['all_casino_url'])){
//        echo '<pre>';
//    print_r('IF');
//    }else{
//        echo '<pre>';
//    print_r('ELSE');
//    }
//    
//    exit();
    
    if (empty($atts['group_id']))
        return;
    /*   Check mobile device or not   */
    if(wp_is_mobile()){
        $qty = $atts['qty_mobile'];
        $start_at = $atts['start_at_mobile'];
    }else{
        $qty = $atts['qty_desktop'];
        $start_at = $atts['start_at_desktop'];
    }
    /*   Supported Attributes pass   */
    if($atts['show_supported_casino']=='yes' && $atts['supported_casino']=='software_provider'){
        $support_atts = 'softwareprovider-id="'.$atts['supported_id'].'"' ;
    }elseif ($atts['show_supported_casino']=='yes' && $atts['supported_casino']=='payment_method') {
        $support_atts = 'paymentmethod-id="'.$atts['supported_id'].'"' ;
    }else{
        $support_atts = '';
    }
    /*   Supported Attributes pass   */
    /* Add bonus type */
    if(!empty($atts['bonus_type'])){
        $bonus_atts = 'bonus-type="'.$atts['bonus_type'].'"' ;
    }else{
        $bonus_atts = '';
    }
    /* check container class */
    if(!is_single()){
        $container = 'container';
    }elseif(is_single() && 'page' == get_post_type()){
        $container = 'container';
    }else{
        $container = '';
    }
    if(($atts['style'] == 'filter') || ($atts['style'] == 'rows-pros-cons') || ($atts['style'] == 'table')){
        $row_flex = '';
    }else{
        $row_flex = 'row-flex row-flex-center';
    }
    $generated_shortcode = "[cas-toplist-group id='" . $atts['group_id'] . "' qty='" . $qty . "' start_at='".$start_at."'  style='" . $atts['style'] . "' $bonus_atts  $support_atts]";
    ob_start();
    
    ?>
    <section class=" <?php echo ($atts['style'] != 'mini-rows') && ($atts['style'] != 'flex') ? 'ct-best-online-casinos' : (($atts['style'] == 'mini-rows') ? 'ct-article-page' : ''); ?> <?php echo ($atts['style'] == 'casino-roller') ? 'high-roller-casinos' : ''; ?>">
        <div class="<?php echo $container;?>">
    <?php if (!empty($atts['heading']) || $atts['check_all_casino']) { ?>
                <div class="ct-section-title">
                    <h6><i class="icon icon-casinos"></i> <?php echo $atts['heading']; ?></h6>
                    <?php if($atts['check_all_casino'] && !empty($atts['all_casino_url'])){?>
                    <a href="<?php echo esc_url($atts['all_casino_url']);?>" class="ct-section-link">Check all casino</a>
                    <?php } ?>
                </div>
    <?php } ?>
            <div class="row <?php echo $row_flex; ?>">
            <?php echo $generated_shortcode; ?>
                <?php if ($atts['show_load_more'] != 'no') { ?>
                    <div class="col-12">
                        <a href="#" class="cta cta-outline-blue cta-see-more"><?php _e('See more casinos', 'ctl'); ?> <i><img src="<?php echo CTL_URL; ?>/images/icon/arrow-blue.svg" alt=""></i></a>
                    </div>
    <?php } ?>
            </div>
                <?php if ($atts['show_term_link'] != 'no') { ?>
                <div class="row">
                    <div class="col-sm-12">
                        <p class="terms-condition text-right"><a href="<?php echo esc_url($atts['term_link']); ?>"><?php echo $atts['term_text']; ?></p>
                    </div>
                </div>
    <?php } ?>
        </div>
    </section>


    <?php
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
}

function ctl_common_banner_cb($args) {
    $output = '';
    ob_start();
    ?>
    <div class="ct-inner-banner">
        <div class="banner-wrapper">
            <div class="image-holder" style="background: url(<?php echo CTL_URL; ?>/images/banner-reviews.png) no-repeat center;background-size: cover;"></div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="banner-content">
                            <h1><?php echo (!empty($args['title'])) ? $args['title'] : 'Casino Reviews 2020'; ?></h1>
                            <p><?php echo $args['description']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    $output = ob_get_contents();
    ob_clean();
    return $output;
}

function ctl_high_roller_casino_cb($args) {
    $output = '';
    $group_id = $args['group_id'];
    $quantity = $args['quantity'];
    $welcom_bonus = $args['welcom_bonus'];
    $min_deposit = $args['min_deposit'];
    $min_wager = $args['min_wager'];
    ob_start();
    ?>
    <section class="ct-best-online-casinos high-roller-casinos">
        <div class="container">
            <div class="mb-30"></div>
            <div class="row row-flex row-flex-center">
    <?php
    echo do_shortcode("[cas-toplist-group id='$group_id' qty='$quantity' bonus-type='high_roller' style='casino-roller' other='$welcom_bonus,$min_deposit,$min_wager']");
    ?>
            </div>
        </div>

    </section>
    <?php
    $output = ob_get_contents();
    ob_clean();
    return $output;
}

/*  ------------Promotion List--------- */

function ctl_promotion_list_cb($args) {
    $output = '';
    $atts = shortcode_atts(array(
        'quantity' => 3,
        'title' => '',
        'style' => 'rows',
        'show_term' => 'false',
        'show_time' => 'true',
        'button_text' => 'Qualify Now',
        'check_all_promotion' => FALSE,
        'all_promotion_url' => '',
            ), $args);

    $generated_shortcode = "[casino-promotions qty='" . $atts['quantity'] . "'  show_term='" . $atts['show_term'] . "' time_left='" . $atts['show_time'] . "' style='" . $atts['style'] . "' button_text='" . $atts['button_text'] . "' ]";
    ob_start();
    ?>
    <section class="<?php echo ($atts['style'] == 'rows') ? 'ct-casino-promotions' : 'ct-card-toplist'; ?>">
        <div class="container">
    <?php if (!empty($atts['title']) || $atts['check_all_promotion']) { ?>
                <div class="ct-section-title">
                    <h6><i class="icon icon-promotion"></i> <?php echo $atts['title']; ?></h6>
                    <?php if($atts['check_all_promotion'] && !empty($atts['all_promotion_url'])):?>
                    <a href="<?php echo esc_url($atts['all_promotion_url']);?>" class="ct-section-link">Check all Promotions</a>
                    <?php endif; ?>
                </div>
    <?php } ?>
            <div class="row row-flex <?php echo ($atts['style'] == 'rows') ? 'row-flex-center' : 'row-flex-nowrap'; ?>">
            <?php echo $generated_shortcode; ?>               
            </div>
        </div>
    </section>
    <?php
    $output = ob_get_contents();
    ob_clean();
    return $output;
}

/*  ------------End Promotion List--------- */

/* ------------Article Top Content------------ */

function ctl_article_top_content_cb($args) {

    $output = '';
    $atts = shortcode_atts(array(
        'title' => get_the_title(),
        'description' => '',
        'group_id' => '',
            ), $args);
    if(empty($atts['group_id']) && (get_post_type(get_the_ID()) != 'casino_game' && get_post_type(get_the_ID()) != 'post')) return;
    $group_id = $atts['group_id'] ;
    $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
    if (get_post_type(get_the_ID()) == 'payment_option') {
        /*  Retrive image from CAS  */
        $poid = get_field('payment_method_id');
        $payment_assets = (array) json_decode(do_shortcode("[cas-payment-options-meta poid='$poid' toplistgroup='$group_id' toplist='return']"));
        if(array_key_exists('url', $payment_assets) && !empty($payment_assets['url'])){ $image_url = $payment_assets['url'];}
        /*  Retrive image from CAS  */
    }else if (get_post_type(get_the_ID()) == 'casino_software') {
        /*  Retrive image from CAS  */
        $software_id = get_field('software_id');
        $single_software = json_decode(do_shortcode("[cas-software-provider-by-group-id id='$group_id' swid='$software_id' pqty='1']"));
        if (!empty($single_software)){
            $single_software = (array) $single_software[0];
            if(array_key_exists('swa_url', $single_software) && !empty($single_software['swa_url'])){ $image_url = $single_software['swa_url'];}
        }
        /*  Retrive image from CAS  */
    }
    ob_start();
    ?>
    <!--Article Top Content-->
    <div class="article-top-content">
        <div class="icon-center <?php echo (get_post_type(get_the_ID()) == 'casino_game')?'game-pic':''; ?>">
            <img src="<?php echo (!empty($image_url)) ? $image_url : CTL_URL . '/images/notallowed.png'; ?>" alt="<?php echo $atts['title']; ?>">
        </div>
        <div class="text-content">
            <h4><?php echo $atts['title']; ?></h4>
            <p><?php echo $atts['description']; ?></p>
        </div>
    </div>
    <!--End Article Top Content-->
    <?php
    $output = ob_get_contents();
    ob_clean();
    return $output;
}

function ctl_software_list_cb($args) {
    $output = '';
    $group_id = $args['group_id'];
    if (!$group_id)
        return;
    $title = $args['title'];
    $qty = $args['qty'];
    $show_load_more = $args['show_load_more'];
    $args = array('post_type' => 'casino_software', 'post_status' => 'publish', 'posts_per_page' => (!empty($qty)) ? $qty : 4);
    $software_query = new WP_Query($args);
    if ($software_query->have_posts()) {
        include CTL_PATH . '/template-parts/software-loop.php';
    }

    $output = ob_get_contents();
    ob_end_clean();
    return $output;
}

function ctl_news_list_cb($args){
    $output = '';
    ob_start();
    $qty = (array_key_exists('qty', $args) && !empty($args['qty']))?$args['qty']:6 ;
    $btn_lbl = (!empty(trim($args['button_text'])))?$args['button_text']:'Read More';
    $catg_id = $args['category'] ;
    $args = array('post_type' => 'post', 'post_status' => 'publish', 'posts_per_page' => $qty,'cat'=>$catg_id);
    $results = new WP_Query($args);
    if($results->have_posts()){
        include CTL_PATH . '/template-parts/news-loop.php';
        }
    $output = ob_get_contents();
    ob_end_clean();
    return $output; 
}

function ctl_test_cb($args){
//    echo '<pre>';
//    print_r($args);
//    exit();
}

?>