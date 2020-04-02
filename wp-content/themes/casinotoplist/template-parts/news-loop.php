<section class="ct-news-holder">
        <div class="container">
            <div class="row">
                <?php
                $i = 1 ;
                while($results->have_posts()):$results->the_post();
                if($i == 1):
                ?>
                <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="casino-card casino-card-vertical casino-card-info casino-card-info-guide casino-card-news casino-card-news-big">
                    <div class="info-card-img"><img src="<?php echo (has_post_thumbnail(get_the_ID()))?get_the_post_thumbnail_url(get_the_ID()):CJP_URL . '/images/notallowed.png';?>" alt="<?php the_title(); ?>"></div>
                  <div class="info-card-content">
                      <h5><?php the_title(); ?></h5>
                    <p><?php echo substr(get_the_excerpt(), 0,300)."…";?></p>
                    <a href="#" class="cta cta-outline cta-inline"><?php echo $btn_lbl;?></a>
                  </div>
                </div>
              </div>
              <?php else : ?>
                <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="casino-card casino-card-vertical casino-card-info casino-card-info-guide casino-card-news">
                  <div class="info-card-img"><img src="<?php echo (has_post_thumbnail(get_the_ID()))?get_the_post_thumbnail_url(get_the_ID()):CJP_URL . '/images/notallowed.png';?>" alt="<?php the_title(); ?>"></div>
                  <div class="info-card-content">
                      <h5><?php the_title();?></h5>
                    <p><?php echo substr(get_the_excerpt(), 0,100)."…";?></p>
                    <a href="<?php the_permalink(); ?>" class="cta cta-outline cta-inline"><?php echo $btn_lbl;?></a>
                  </div>
                </div>
              </div>
                <?php
                endif;
                $i++ ;
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </section>