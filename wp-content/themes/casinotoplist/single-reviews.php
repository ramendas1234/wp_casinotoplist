<?php get_header(); ?>
<?php while (have_posts()) {
    the_post(); ?>

    <?php
    $partner_id = get_field('casino_id');
    $best_online = get_field('best_casino_for_this_year')[0];
    $p = (array) json_decode(do_shortcode("[cas-product-details pid='$partner_id' review='return']"));
    $pros_cons_data = (array) json_decode(do_shortcode("[cas-pro-cons pid='$partner_id' is-featured='2' review='return']"));
    $supported_softwares = json_decode(do_shortcode('[cas-software-provider pid='.$partner_id.' software-provider="review" style="json"]'));
    include CTL_PATH . '/template-parts/product-info.php';
    include CTL_PATH . '/template-parts/pros-cons.php';
    $casino_games = get_field('casino_games');
    ?>
    <!-- Sticky Menu -->
    <?php //get_template_part('template-parts/sticky-menu'); ?>
    <!-- End Sticky Menu -->

    <!--Casino Disabled-->
    <div class="casino-disabled">
        Casino is disabled
    </div>
    <!--End Casino Disabled-->

    <!--Inner Banner Section-->
    <div class="ct-inner-banner review-banner">
        <div class="banner-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="review-banner-content">
                            <div class="casino-brand"><a href="<?php echo $goto_link; ?>"  target="_blank" rel="nofollow"><img src="<?php echo $image_big; ?>" alt="<?php echo $partner;?>"></a></div>
                            <div class="review-cont"> 
                                <div class="card-ratings">
                                    <div class="rating-value">
                                        <span class="result"><?php echo $rating; ?></span>/5
                                    </div>
                                    <div class="rating-stars">
                                                    <?php
                                                    for ($x = 1; $x <= $rating; $x++) {
                                                        ?>
                                          <figure><!-- <a href="<?php //echo $review_link    ?>" > --><img src="<?php echo CTL_URL ?>/images/icon/star-orange.svg" alt=""><!-- </a> --></figure>
                                                        <?php
                                                    }
                                                    if (strpos($rating, '.')) {
                                                        ?>
                                          <figure><!-- <a href="<?php //echo $review_link   ?>" > --><img src="<?php echo CTL_URL ?>/images/icon/star-half.svg" alt=""><!-- </a> --></figure>
                                                        <?php
                                                        $x++;
                                                    }
                                                    while ($x <= 5) {
                                                        ?>
                                          <figure><!-- <a href="<?php //echo $review_link    ?>" > --><img src="<?php echo CTL_URL ?>/images/icon/star-orange.svg" alt=""><!-- </a> --></figure>
                                                        <?php
                                                        $x++;
                                                    }
                                                    ?> 
                                                </div>
                                </div> 
                                <h1><?php echo $partner; ?></h1>
                                <div class="reward-box orange" style="<?php echo ($best_online=='yes')?'display:inline-block':'display:none'?>"><?php _e('Best Casino in '.date("Y").'','ctl');?></div>
                                <p><?php echo get_field('short_description'); ?></p>
                                <a href="#" class="cta cta-inline cta-primary">Visit Casino</a>
                                <p class="terms">No Deposit Offer : New players only • £88 is granted in FreePlay (FP) • FP must be claimed within 48 hours of receiving the email and expires after 14 days • FP winnings are credited as bonus and capped at £15, unless a Jackpot win • Welcome Bonus Package: 1st deposit immediate 100% up to £100 bonus • 2nd -5th deposits must be completed within 7 days and must be wagered 3 times within 7 days to receive 30% up to £350 bonus • £20 min deposit • Bonus wins are capped at £500 • To withdraw bonus & related wins, wager 30 x (bonus amount) within 90 days • Wagering requirements vary by game • This offer may not be combined with any other offer • Withdrawal restrictions & full T&Cs apply: No Deposit Offer terms & Welcome Bonus Package terms. <a href="#">Click for full T&C's</a></p>
                            </div>
                            <div class="welcome-bonus-ban">
                                <p><img class="icon" src="<?php echo CTL_URL; ?>/images/gift_icon-blue.svg" alt=""><?php _e('Welcome bonus: ','ctl'); ?> </p>
                                <h4><?php echo $bonus; ?></h4>
                                <p class="bonus-text"><span><?php _e('Regular Bonus: ','ctl'); ?>$<?php echo $bonus_amount; ?></span><span><?php _e('Match Bonus: ','ctl'); ?> <?php echo $bonus_match;?></span></p>
                                <div class="bonus-code">
                                    <p>Bonus Code: <strong>No Code Needed</strong></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Inner Banner Section-->

    <!--Welcome Bonus Bar-->
    <div class="welcome-bonus-bar">
        <div class="container">
            <div class="welcome-bonus-bar-inner">
                <div class="bonus-left">
                    <div class="casino-logo"><a href="<?php echo $goto_link; ?>"  target="_blank" rel="nofollow"><img src="<?php echo $image_big; ?>" alt="<?php echo $partner;?>"></a></div>
                    <p><img class="icon" src="<?php echo CTL_URL; ?>/images/gift_icon-blue.svg" alt=""><?php _e('Welcome bonus: ','ctl'); ?><strong> <?php echo $bonus; ?></strong></p>
                </div>
                <div class="bonus-right">
                    <a href="<?php echo $goto_link; ?>" class="cta cta-inline cta-primary" target="_blank" rel="nofollow"><?php _e('Visit Casino','ctl'); ?></a>
                </div>
            </div>
        </div>
    </div>
    <!--End Welcome Bonus Bar-->
    <!-- Sticky Menu -->
    <div class="sticky-menu">
      <div class="container">
        <nav class="sticky-menu-links">
          <ul>
            <li class="active"><a href="#"><img src="<?php echo CTL_URL; ?>/images/icon/menu-icons/menu-icon-blue-1.svg" alt="" /><span><?php _e('General information','ctl');?></span></a></li>
            <li><a href="#"><img src="<?php echo CTL_URL; ?>/images/icon/menu-icons/menu-icon-blue-3.svg" alt="" /><span><?php _e('Casino description','ctl');?></span></a></li>
            <li><a href="#"><img src="<?php echo CTL_URL; ?>/images/icon/menu-icons/menu-icon-blue-3.svg" alt="" /><span><?php _e('Rating','ctl');?></span></a></li>
            <li><a href="#"><img src="<?php echo CTL_URL; ?>/images/icon/menu-icons/menu-icon-blue-3.svg" alt="" /><span><?php _e('Payment method','ctl');?></span></a></li>
          </ul>
        </nav>
      </div>
    </div>
    <!-- End Sticky Menu -->
    <!-- BODY CONTENT AREA START -->
    <main>
        <section class="casino-reviews">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-sm-12">
                  <!--Editor Content-->
                  <div class="editor-content">
                    <!--General Info-->
                    <h6><?php _e('General information','ctl'); ?></h6>
                    <p>
                      <span>Name:</span> <strong><?php echo $partner; ?></strong><br />
                      <span>Website:</span> <strong><?php echo $partner_url;?></strong><br />
                      <span>Online since:</span> <strong><?php echo $online_since; ?></strong><br />
                      <span>Jurisdiction:</span> <strong>Gibraltar</strong><br />
                      <?php if(!empty($supported_softwares)):?><span><?php _e('Software: ','ctl'); ?></span> <strong><?php echo $supported_softwares[0]->name; ?></strong><br /><?php endif;?>
                      <span>Payout speed:</span> <strong>< 24 hours</strong>
                    </p>
                    <div class="gen-info-cont toggle-text-content">
                      <?php the_content(); ?>
                    </div>
                    <?php if ( !empty( get_the_content() ) ){  ?>
                    <div class="show-more text-center"><a class="text-toggle single"><?php _e('Read More','ctl'); ?></a></div>
                    <?php } ?>
                    <!--End General Info-->

                    <!--Casino games-->
                    <?php if(!empty($casino_games)):?>
                    <h6>Casino games</h6>
                    <div class="suppored-devices">
                        <?php foreach ($casino_games as $id): ?>
                        <div class="suppored-devices-item">
                          <div class="item-card">
                              <span><img src="<?php echo get_the_post_thumbnail_url($id); ?>" alt="<?php echo get_the_title($id);?>"></span>
                          </div>
                            <p class="item-title"><?php echo get_the_title($id);?></p>
                        </div>
                        <?php endforeach; ?>
                      </div>
                    <?php endif; ?>
                    <!--End Casino games-->

                    <!--Positive/Negetives-->
                    <div class="positive-negative">
                      <?php if(!empty($pros)):?>  
                      <ul class="positive">
                          <?php foreach ($pros as $pr):?>
                        <li><?php echo $pr; ?></li>
                        <?php endforeach;?>
                      </ul>
                        <?php endif;?>
                        <?php if(!empty($cons)):?> 
                      <ul class="negative">
                          <?php foreach ($cons as $cns):?>
                        <li><?php echo $cns;?></li>
                        <?php endforeach;?>
                      </ul>
                        <?php endif;?>
                    </div>
                    <!--End Positive/Negetives-->

                    <!--Rating display box-->
                    <h6>Rating</h6>
                    <?php echo do_shortcode('[cas-ratings pid="'.$partner_id.'" review="display"]');?>
                    <!--End Rating display box-->

                    <!--Supported Devices and operation system-->
                    <h6>Supported Devices and operation system</h6>
                    <div class="suppored-devices">
                      <div class="suppored-devices-item">
                        <div class="item-card">
                          <span><img src="<?php echo CTL_URL?>/images/desktop.svg" alt=""></span>
                        </div>
                        <p class="item-title">Desktop</p>
                      </div>
                      <div class="suppored-devices-item">
                        <div class="item-card">
                          <span><img src="<?php echo CTL_URL?>/images/tablet.svg" alt=""></span>
                        </div>
                        <p class="item-title">Tablet</p>
                      </div>
                      <div class="suppored-devices-item">
                        <div class="item-card">
                          <span><img src="<?php echo CTL_URL?>/images/mobile.svg" alt=""></span>
                        </div>
                        <p class="item-title">Mobile</p>
                      </div>
                      <div class="suppored-devices-item">
                        <div class="item-card orange">
                          <span><img src="<?php echo CTL_URL?>/images/mac-os.svg" alt=""></span>
                        </div>
                        <p class="item-title">Linux</p>
                      </div>
                      <div class="suppored-devices-item">
                        <div class="item-card orange">
                          <span><img src="<?php echo CTL_URL?>/images/linux.svg" alt=""></span>
                        </div>
                        <p class="item-title">Windows</p>
                      </div>
                      <div class="suppored-devices-item">
                        <div class="item-card orange">
                          <span><img src="<?php echo CTL_URL?>/images/apple.svg" alt=""></span>
                        </div>
                        <p class="item-title">Mac OS</p>
                      </div>
                    </div>
                    <!--End Supported Devices and operation system-->

                    <!--Payment method-->
                    <h6>Payment method</h6>
                    <?php 
                    echo do_shortcode("[cas-payment-options pid='$partner_id' payment-options='review' style='payment-list']")
                    ?>
                    <!--Paypal Payment method-->
                    <div class="mb-20"></div>
                    <div class="visit-btn text-center">
                        <a href="<?php echo $goto_link;?>" class="cta cta-inline cta-primary"><?php _e('Visit Casino','ctl');?></a>
                    </div>
                  </div>
                  <!--End Editor Content-->
                </div>

                <div class="col-lg-3 col-sm-12">
                  <?php //get_template_part('template-parts/sidebar','promotions')?>
                  <?php echo do_shortcode("[casino-promotions qty='3'  show_term='false'  style='cards' button_text='play now' ]")?>
                </div>
                </div>
            </div>
            <div class="mb-50"></div>
        </section>
    </main>
    <!-- BODY CONTENT AREA END -->
<?php } ?>
<?php get_footer(); ?>