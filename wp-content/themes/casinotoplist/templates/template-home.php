<?php
/*Template Name:Home*/
?>
<?php get_header();?>

    <!-- BODY CONTENT AREA START -->
    <main>

      <!--Casino Card top Lists-->
      <?php      
        $top_section_1=get_field('top_section_1');
      ?>
      <section class="ct-card-toplist">
        <div class="container">
          <div class="row row-flex row-flex-nowrap">
            <?php if(!empty($top_section_1)){?>
            <div class="col-sm-12 col-md-12 col-lg-6">
              <div class="casino-card casino-card-feature">
                <?php if(!empty($top_section_1['image'])){?>
                <div class="img-panel"><img src="<?php echo $top_section_1['image'];?>" alt="<?php echo !empty($top_section_1['title'])?$top_section_1['title']:'';?>"></div>
                <?php } ?>
                <div class="info-panel">
                  <h5><?php echo !empty($top_section_1['title'])?$top_section_1['title']:'';?></h5>
                  <p><?php echo !empty($top_section_1['description'])?$top_section_1['description']:'';?></p>
                </div>
              </div>
            </div>
            <?php } ?>            
            <?php $promotions_query=new WP_Query(array('post_type'=>'casino_promotion','post_status'=>'publish','posts_per_page'=>2,'meta_query'=>array(array('key'=>'event_date','value'=>date('Ymd'),'compare' => '>=','type' => 'NUMERIC' ))));
             if ( $promotions_query->have_posts() ) {              
              while ( $promotions_query->have_posts() ) {
              $promotions_query->the_post();
              ?>
              <div class="col-sm-12 col-md-6 col-lg-3">
                <div class="casino-card">
                  <?php if(has_post_thumbnail()){?>
                  <div class="img-panel">
                    <?php the_post_thumbnail('large');?>
                  </div>
                  <?php } ?>
                  <div class="info-panel">
                    <h5><?php the_title();?></h5>
                    <p><?php 
                    $days_remaining=ctl_days_left(get_field('event_date'));
                    echo $days_remaining;
                    echo _n( ' Day remaining', ' Day/s remaining',$days_remaining,'ctl' );
                    ?></p>
                    <div class="cta-panel">
                      <a href="<?php the_permalink();?>" class="cta cta-block cta-primary"><?php _e('Qualify now','ctl');?></a>
                    </div>
                  </div>
                </div>
              </div>
              <?php
              } 
              wp_reset_postdata();
            }?>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="toplist-info">
                <?php $info=get_field('info_section');?>
                <h3><?php echo $info['heading']?$info['heading']:'';?></h3>
                <p><?php echo $info['description']?$info['description']:'';?></p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--End Casino Card top Lists-->

      <!--Best Online Casinos-->
      <section class="ct-best-online-casinos">
        <div class="container">
          <div class="ct-section-title">
            <h6><i class="icon icon-casinos"></i> <?php _e('Best Online Casinos 2019','');?></h6>
          </div>
          <div class="row row-flex row-flex-center">
            <?php echo do_shortcode(get_field('best_casinos'));?>
            
          </div>
          <div class="row">
            <div class="col-sm-12">
                <p class="terms-condition text-right"><a href="#">Terms and conditions</a> might apply to these offers.</p>
            </div>
          </div>
        </div>
      </section>
      <!--End Best Online Casinos-->

      <!--Top lavel Game Types-->
      <section class="ct-top-leve-game gray-bg">
        <div class="container">
          <div class="game-filter-menu">
            <ul>
              <li data-tab="tab-1" class="active">Top Table Games</li>
              <li data-tab="tab-2">Top Mini Games</li>
              <li data-tab="tab-3">Top Slots Games</li>
              <li data-tab="tab-4">Top Card Games</li>
            </ul>
          </div>
          <div class="game-filter-container">
            <div id="tab-1" class="tab-content active">
              <div class="casino-card casino-card-top-game">
                <div class="img-panel">
                  <img src="<?php echo CTL_URL;?>/images/top-game-pic-1.png" alt="" />
                  <div class="btn-overlay">
                    <a href="#" class="cta cta-block cta-primary">Play Now</a>
                    <a href="#" class="cta cta-block cta-outline">Tg</a>
                  </div>
                </div>
                <div class="info-panel">
                  <h6>Free Pai Gow Poker</h6>
                </div>
              </div>
              <div class="casino-card casino-card-top-game">
                <div class="img-panel">
                  <img src="<?php echo CTL_URL;?>/images/top-game-pic-2.png" alt="" />
                  <div class="btn-overlay">
                      <a href="#" class="cta cta-block cta-primary">Play Now</a>
                      <a href="#" class="cta cta-block cta-outline">Tg</a>
                  </div>
                </div>
                <div class="info-panel">
                  <h6>Free Roulette</h6>
                </div>
              </div>
              <div class="casino-card casino-card-top-game">
                <div class="img-panel">
                  <img src="<?php echo CTL_URL;?>/images/top-game-pic-3.png" alt="" />
                  <div class="btn-overlay">
                    <a href="#" class="cta cta-block cta-primary">Play Now</a>
                    <a href="#" class="cta cta-block cta-outline">Tg</a>
                  </div>
                </div>
                <div class="info-panel">
                  <h6>Free Baccarat</h6>
                </div>
              </div>
              <div class="casino-card casino-card-top-game">
                  <div class="img-panel">
                      <img src="<?php echo CTL_URL;?>/images/top-game-pic-4.png" alt="" />
                      <div class="btn-overlay">
                          <a href="#" class="cta cta-block cta-primary">Play Now</a>
                          <a href="#" class="cta cta-block cta-outline">Tg</a>
                      </div>
                  </div>
                  <div class="info-panel">
                      <h6>Free Craps</h6>
                  </div>
              </div>
            </div>
            <div id="tab-2" class="tab-content">
              <div class="casino-card casino-card-top-game">
                <div class="img-panel">
                  <img src="<?php echo CTL_URL;?>/images/top-game-pic-2.png" alt="" />
                  <div class="btn-overlay">
                    <a href="#" class="cta cta-block cta-primary">Play Now</a>
                    <a href="#" class="cta cta-block cta-outline">Tg</a>
                  </div>
                </div>
                <div class="info-panel">
                  <h6>Free Roulette</h6>
                </div>
              </div>
              <div class="casino-card casino-card-top-game">
                <div class="img-panel">
                  <img src="<?php echo CTL_URL;?>/images/top-game-pic-3.png" alt="" />
                  <div class="btn-overlay">
                    <a href="#" class="cta cta-block cta-primary">Play Now</a>
                    <a href="#" class="cta cta-block cta-outline">Tg</a>
                  </div>
                </div>
                <div class="info-panel">
                  <h6>Free Baccarat</h6>
                </div>
              </div>
              <div class="casino-card casino-card-top-game">
                <div class="img-panel">
                  <img src="<?php echo CTL_URL;?>/images/top-game-pic-4.png" alt="" />
                  <div class="btn-overlay">
                    <a href="#" class="cta cta-block cta-primary">Play Now</a>
                    <a href="#" class="cta cta-block cta-outline">Tg</a>
                  </div>
                </div>
                <div class="info-panel">
                  <h6>Free Craps</h6>
                </div>
              </div>
            </div>
            <div id="tab-3" class="tab-content">
              <div class="casino-card casino-card-top-game">
                <div class="img-panel">
                  <img src="<?php echo CTL_URL;?>/images/top-game-pic-3.png" alt="" />
                  <div class="btn-overlay">
                    <a href="#" class="cta cta-block cta-primary">Play Now</a>
                    <a href="#" class="cta cta-block cta-outline">Tg</a>
                  </div>
                </div>
                <div class="info-panel">
                  <h6>Free Baccarat</h6>
                </div>
              </div>
              <div class="casino-card casino-card-top-game">
                  <div class="img-panel">
                      <img src="<?php echo CTL_URL;?>/images/top-game-pic-4.png" alt="" />
                      <div class="btn-overlay">
                          <a href="#" class="cta cta-block cta-primary">Play Now</a>
                          <a href="#" class="cta cta-block cta-outline">Tg</a>
                      </div>
                  </div>
                  <div class="info-panel">
                      <h6>Free Craps</h6>
                  </div>
              </div>
            </div>
            <div id="tab-4" class="tab-content">
              <div class="casino-card casino-card-top-game">
                <div class="img-panel">
                  <img src="<?php echo CTL_URL;?>/images/top-game-pic-4.png" alt="" />
                  <div class="btn-overlay">
                    <a href="#" class="cta cta-block cta-primary">Play Now</a>
                    <a href="#" class="cta cta-block cta-outline">Tg</a>
                  </div>
                </div>
                <div class="info-panel">
                  <h6>Free Craps</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--End Top lavel Game Types-->

      <!--Casino promotions-->
      <?php $promotions_query=new WP_Query(array('post_type'=>'casino_promotion','post_status'=>'publish','posts_per_page'=>-1,'meta_query'=>array(array('key'=>'event_date','value'=>date('Ymd'),'compare' => '>=','type' => 'NUMERIC' ))));
       if ( $promotions_query->have_posts() ) {
        ?>
      <section class="ct-casino-promotions">
        <div class="container">
            <div class="ct-section-title">
              <h6><i class="icon icon-promotion"></i><?php _e('Casino promotions','ctl');?></h6>
              <a href="#" class="ct-section-link"><?php _e('Check all promotion','ctl');?></a>
            </div>
            <div class="row row-flex row-flex-center">
              <?php
              while ( $promotions_query->have_posts() ) {
              $promotions_query->the_post();
              ?>
              <div class="col-sm-12">
                <div class="casino-card casino-card-vertical casino-card-payment-guide casino-card-promotions">
                  <div class="left-panel-img">
                      <?php if(has_post_thumbnail()){?>
                      <?php the_post_thumbnail();?>
                      <?php }else{ ?> 
                       <img src="<?php echo CTL_URL;?>/images/notallowed.png" alt=""> 
                      <?php } ?>
                  </div>
                  <div class="mid-panel">
                    <div class="read-review">
                        <a href="<?php the_permalink();?>" class="read-review-link">
                          <?php if(has_post_thumbnail()){?>
                          <?php the_post_thumbnail();?>
                          <?php }else{ ?> 
                           <img src="<?php echo CTL_URL;?>/images/notallowed.png" alt=""> 
                          <?php } ?>
                          <span><?php _e('Read full review','ctl');?></span></a>
                    </div>
                    <h5><?php the_title();?></h5>
                    <p>
                      <?php the_excerpt();?>
                    </p>
                  </div>
                  <div class="right-panel">
                    <div class="promotion-timer-block">
                        <p><?php _e('Promotion time left','ctl');?>:</p>
                        <div class="timer-block" data-date="<?php echo get_field('event_date');?>">
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
                        <a href="#" class="cta cta-block cta-primary"><?php _e('Qualify Now','');?></a>
                        <span><?php _e('Terms and conditions apply to this offer','');?></span>
                    </div>
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
      }
      ?>
      <!--End Casino promotions-->

      <!--Casino match-->
      <section class="ct-casino-match gray-bg">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <?php $games_query=new WP_Query(array('post_type'=>'casino_game','post_status'=>'publish','posts_per_page'=>-1));
              if ( $games_query->have_posts() ) {
              ?>
              <div class="casino-match-top-lists">
                <form method="post" action="#">
                  <div class="slider casino-match-options">
                    <!--step One-->
                    <div class="match-holder">
                      <div class="match-header text-center">
                        <h2><?php _e('Casino Match','ctl');?></h2>
                        <p><?php _e('Choose the game you like best','ctl');?></p>
                      </div>
                      <div class="holder-wrapper">
                        <?php
                        while ( $games_query->have_posts() ) {
                        $games_query->the_post();
                        ?>
                        <div class="casino-match-item">
                          <div class="match-card">
                            <?php if(has_post_thumbnail()){?>
                              <?php the_post_thumbnail();?>
                            <?php }else{ ?>
                            <img src="<?php echo CTL_URL;?>/images/notallowed.png" alt="<?php the_title();?>">
                            <?php } ?>
                            <label>
                            <input type="radio" name="choose-casino-game" id="casino-match-<?php the_ID();?>" value="<?php the_ID();?>">
                            <span class="checkmark"></span>
                            </label>
                          </div>
                          <p class="card-title"><?php the_title();?></p>
                        </div>
                        <?php } 
                        wp_reset_postdata();
                        ?>
                      </div>
                    </div>
                    <!--End step One-->
                    <!--step Two-->
                    <div class="match-holder">
                      <div class="match-header text-center">
                        <h2><?php _e('Casino Match','ctl');?></h2>
                        <div class="casino-match-steps">
                          <a href="javascript:void(0);" class="btn btn-prev"><?php _e('Previous','ctl');?></a>
                          <p class="step-count">Step <span>2</span> of 4</p>
                          <a href="javascript:void(0);" class="btn btn-next"><?php _e('Next','ctl');?></a>
                        </div>
                        <p><?php _e('Choose your Dealer Type','ctl');?></p>
                      </div>
                      <div class="holder-wrapper">
                        <div class="casino-match-item">
                          <div class="match-card">
                            <img src="<?php echo CTL_URL;?>/images/icon/interface-icon-kit/casino match_ico_11.png" alt="">
                            <label>
                            <input type="radio" name="choose-casino-dealer-type" id="choose-casino-dealer-type-1">
                            <span class="checkmark"></span>
                            </label>
                          </div>
                          <p class="card-title"><?php _e('Online Dealer','ctl');?></p>
                        </div>
                        <div class="casino-match-item">
                          <div class="match-card">
                            <img src="<?php echo CTL_URL;?>/images/icon/interface-icon-kit/casino match_ico_12.png" alt="">
                            <label>
                            <input type="radio" name="choose-casino-dealer-type" id="choose-casino-dealer-type-2">
                            <span class="checkmark"></span>
                            </label>
                          </div>
                          <p class="card-title"><?php _e('Live Dealer','ctl');?></p>
                        </div>
                        <div class="casino-match-item">
                          <div class="match-card">
                            <img src="<?php echo CTL_URL;?>/images/icon/interface-icon-kit/casino match_ico_13.png" alt="">
                            <label>
                            <input type="radio" name="choose-casino-dealer-type" id="choose-casino-dealer-type-3">
                            <span class="checkmark"></span>
                            </label>
                          </div>
                          <p class="card-title"><?php _e('No preference','ctl');?></p>
                        </div>
                      </div>
                    </div>
                    <!--End step Two-->
                    <!--step Three-->
                    <div class="match-holder">
                      <div class="match-header text-center">
                        <h2><?php _e('Casino Match','ctl');?></h2>
                        <div class="casino-match-steps">
                          <a href="javascript:void(0);" class="btn btn-prev"><?php _e('Previous','ctl');?></a>
                          <p class="step-count">Step <span>3</span> of 4</p>
                          <a href="javascript:void(0);" class="btn btn-next"><?php _e('Next','ctl');?></a>
                        </div>
                        <p><?php _e('Choose preferred payout speed','ctl');?></p>
                      </div>
                      <div class="holder-wrapper">
                        <div class="casino-match-item">
                          <div class="match-card">
                            <img src="<?php echo CTL_URL;?>/images/icon/interface-icon-kit/casino match_ico_14.png" alt="">
                            <label>
                            <input type="radio" name="choose-casino-payout-speed" id="choose-casino-payout-speed-1">
                            <span class="checkmark"></span>
                            </label>
                          </div>
                          <p class="card-title">1-3 Days</p>
                        </div>
                        <div class="casino-match-item">
                          <div class="match-card">
                            <img src="<?php echo CTL_URL;?>/images/icon/interface-icon-kit/casino match_ico_15.png" alt="">
                            <label>
                            <input type="radio" name="choose-casino-payout-speed" id="choose-casino-payout-speed-2">
                            <span class="checkmark"></span>
                            </label>
                          </div>
                          <p class="card-title">2-4 Days</p>
                        </div>
                        <div class="casino-match-item">
                          <div class="match-card">
                            <img src="<?php echo CTL_URL;?>/images/icon/interface-icon-kit/casino match_ico_16.png" alt="">
                            <label>
                            <input type="radio" name="choose-casino-payout-speed" id="choose-casino-payout-speed-3">
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
                        <h2><?php _e('Casino Match','ctl');?></h2>
                        <div class="casino-match-steps">
                          <a href="javascript:void(0);" class="btn btn-prev"><?php _e('Previous','ctl');?></a>
                          <p class="step-count">Step <span>4</span> of 4</p>
                        </div>
                        <p><?php _e('Choosed casinos based on your preferences','ctl');?></p>
                      </div>
                      <div class="holder-wrapper">
                        <div class="casino-match-item casino-match-item-full">
                          <div class="casino-card casino-card-vertical casino-card-payment-guide casino-card-review">
                            <div class="left-panel-img"><a href="#"><img src="<?php echo CTL_URL;?>/images/casino promotions-1.png" alt=""></a></div>
                            <div class="mid-panel">
                              <div class="card-review-content">
                                <div class="review-text">
                                  <div class="review-text-bonus">
                                    <span>Casino Las Vegas</span>
                                    <p><img class="icon" src="images/gift_icon.png" alt="">Welcome bonus: 100% up to $1000</p>
                                  </div>
                                  <div class="card-ratings">
                                    <div class="rating-value">
                                      <span class="result">5.0/</span>5
                                    </div>
                                    <div class="rating-stars">
                                      <figure><img src="<?php echo CTL_URL;?>/images/icon/star-orange.svg" alt=""></figure>
                                      <figure><img src="<?php echo CTL_URL;?>/images/icon/star-orange.svg" alt=""></figure>
                                      <figure><img src="<?php echo CTL_URL;?>/images/icon/star-orange.svg" alt=""></figure>
                                      <figure><img src="<?php echo CTL_URL;?>/images/icon/star-orange.svg" alt=""></figure>
                                      <figure><img src="<?php echo CTL_URL;?>/images/icon/star-half.svg" alt=""></figure>
                                    </div>
                                  </div>
                                </div>
                                <div class="review-info">
                                  <div class="info-box">
                                    <p>Game type</p>
                                    <div class="info-box-card">
                                      <div class="match-card">
                                        <img src="<?php echo CTL_URL;?>/images/icon/interface-icon-kit/casino match_ico_2.svg" alt="">
                                      </div>
                                      <p class="card-title">Roulette</p>
                                    </div>
                                  </div>
                                  <div class="info-box">
                                    <p>Dealer type</p>
                                    <div class="info-box-card">
                                      <div class="match-card">
                                        <img src="<?php echo CTL_URL;?>/images/icon/interface-icon-kit/casino match_ico_11.png" alt="">
                                      </div>
                                      <p class="card-title">Online Dealer</p>
                                    </div>
                                  </div>
                                  <div class="info-box">
                                    <p>Payout speed</p>
                                    <div class="info-box-card">
                                      <div class="match-card">
                                        <img src="<?php echo CTL_URL;?>/images/icon/interface-icon-kit/casino match_ico_14.png" alt="">
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
                            <div class="left-panel-img"><a href="#"><img src="<?php echo CTL_URL;?>/images/casino promotions-1.png" alt=""></a></div>
                            <div class="mid-panel">
                              <div class="card-review-content">
                                <div class="review-text">
                                  <div class="review-text-bonus">
                                    <span>Casino Las Vegas</span>
                                    <p><img class="icon" src="images/gift_icon.png" alt="">Welcome bonus: 100% up to $1000</p>
                                  </div>
                                  <div class="card-ratings">
                                    <div class="rating-value">
                                      <span class="result">5.0/</span>5
                                    </div>
                                    <div class="rating-stars">
                                      <figure><img src="<?php echo CTL_URL;?>/images/icon/star-orange.svg" alt=""></figure>
                                      <figure><img src="<?php echo CTL_URL;?>/images/icon/star-orange.svg" alt=""></figure>
                                      <figure><img src="<?php echo CTL_URL;?>/images/icon/star-orange.svg" alt=""></figure>
                                      <figure><img src="<?php echo CTL_URL;?>/images/icon/star-orange.svg" alt=""></figure>
                                      <figure><img src="<?php echo CTL_URL;?>/images/icon/star-half.svg" alt=""></figure>
                                    </div>
                                  </div>
                                </div>
                                <div class="review-info">
                                  <div class="info-box">
                                    <p>Game type</p>
                                    <div class="info-box-card">
                                      <div class="match-card">
                                        <img src="<?php echo CTL_URL;?>/images/icon/interface-icon-kit/casino match_ico_2.svg" alt="">
                                      </div>
                                      <p class="card-title">Roulette</p>
                                    </div>
                                  </div>
                                  <div class="info-box">
                                    <p>Dealer type</p>
                                    <div class="info-box-card">
                                      <div class="match-card">
                                        <img src="<?php echo CTL_URL;?>/images/icon/interface-icon-kit/casino match_ico_11.png" alt="">
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
              <?php } ?>
            </div>
          </div>
        </div>
      </section>
      <!--End Casino match-->

      <!--Game Guide-->
      <?php $games_query=new WP_Query(array('post_type'=>'casino_game','post_status'=>'publish','posts_per_page'=>9));
      if ( $games_query->have_posts() ) {
      ?>
      <section class="ct-game-guide">
        <div class="container">
            <div class="ct-section-title">
              <h6><i class="icon icon-casino-guide"></i> <?php _e('Game Guide','ctl');?></h6>
              <a href="javascript:void(0);" class="ct-section-link"><?php _e('Check all game guide','ctl');?></a>
            </div>
            <div class="row">
                <?php
                while ( $games_query->have_posts() ) {
                $games_query->the_post();
                $game_content = get_the_content();
                
                ?>
                <div class="col-lg-4 col-md-6 col-sm-12">
                  <div class="casino-card casino-card-vertical casino-card-info">
                    <div class="info-card-img">
                      <?php if(has_post_thumbnail()){?>
                      <?php the_post_thumbnail();?>
                      <?php }else{ ?>
                      <img src="<?php echo CTL_URL;?>/images/notallowed.png" alt="<?php the_title();?>" />
                      <?php } ?>
                    </div>
                    <div class="info-card-content">
                      <h6><?php the_title();?></h6>
                      <p><?php echo substr(get_the_excerpt(), 0,100)."…";?></p>
                      <a href="<?php the_permalink();?>" class="cta cta-outline cta-small"><?php _e('Read More','ctl');?></a>
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
      <?php } ?>
      <!--End Game Guide-->

      <!--Get Bonus Banner-->
      <section class="ct-bonus-banner">
        <div class="container">
          <div class="row">
            <?php echo do_shortcode(get_field('advertisement_banner_shortcode'));?>
          </div>
        </div>
      </section>
      <!--End Get Bonus Banner-->

      <!--Online Casino Payment Guide-->
      <?php 
      $payment_options_query = new WP_Query(array('post_type'=>'payment_option','post_status'=>'publish','posts_per_page'=>-1));
      if ( $payment_options_query->have_posts() ) {    
      ?>
      <section class="ct-payment-guide">
          <div class="container">
            <div class="ct-section-title">
              <h6><?php _e('Online Casino Payment Guide','ctl');?></h6>
              <a href="<?php echo get_post_type_archive_link('payment_option');?>" class="ct-section-link"><?php _e('Check all payment guide','ctl');?></a>
            </div>
            <?php 
            while ( $payment_options_query->have_posts() ) {
              $payment_options_query->the_post();
              $payment_method_id=get_field('payment_method_id',get_the_ID());
              $toplist_group_id=get_field('toplist_group_id',get_the_ID());
                            
              do_shortcode("[cas-payment-options-meta poid='".$payment_method_id."' toplistgroup='".$toplist_group_id."' style='payment-row' showcount=true toplist='display']");
            ?>            
            <?php 
            }
            wp_reset_postdata();

            ?>            
          </div>
      </section>
    <?php } ?>
      <!--End Online Casino Payment Guide-->

      <!--Testimonials-->
      <?php $testimonial_query=new WP_Query(array('post_type'=>'casino_testimonial','post_status'=>'publish','posts_per_page'=>-1,'meta_key'=>'is_featured','meta_value'=>'Yes'));
      if ( $testimonial_query->have_posts() ) {
      ?>
      <section class="ct-testimonial gray-bg">
        <div class="container">
          <h6><?php _e('Testimonials','ctl');?></h6>
          <div class="slider testimonial-slider">
            <?php
            while ( $testimonial_query->have_posts() ) {
            $testimonial_query->the_post();
            ?>
            <div class="testimonial-item">
              <div class="casino-card casino-card-testimonial">
                <?php 
                $author_pic=get_field('author_image');
                if(!empty($author_pic)){
                ?>
                <div class="author-pic">
                  <img src="<?php echo $author_pic;?>" alt="">
                </div>
                <?php } ?>
                <h4 class="author-title"><?php echo get_field('author_name');?></h4>
                <div class="testimonial-content">
                  <p>
                   <?php echo get_field('about_author');?>
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
      <?php } ?>
      <!--End Testimonials-->


      <!--Editor Content-->
      <section class="ct-content-scetion">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="editor-content toggle-text-content">
                <?php echo get_field('footer_content');?>
              </div>
              <div class="show-more"><a class="text-toggle"><?php _e('Read more','ctl');?></a></div>
            </div>
          </div>
        </div>
      </section>
      <!--End Editor Content-->

    </main>
    <!-- BODY CONTENT AREA END -->

   <?php get_footer();?>