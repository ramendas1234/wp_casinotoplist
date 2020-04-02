<section class="ct-software-guide">
        <div class="container">
            <div class="row">
                <?php if (!empty($title)) { ?>
                <div class="ct-section-title">
                    <h6><i class="icon icon-casinos"></i> <?php echo $title; ?></h6>
                </div>
    <?php } ?>
                <?php
        while ($software_query->have_posts()):$software_query->the_post();
            $software_id = get_field('software_id');
            $single_software = json_decode(do_shortcode("[cas-software-provider-by-group-id id='$group_id' swid='$software_id' pqty='1']"));
            if (!empty($single_software)):
                $single_software = (array) $single_software[0];
                $image = (!empty($single_software['swa_url']))?$single_software['swa_url']:get_the_post_thumbnail_url(get_the_ID(),'full');
            
            ?>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="casino-card casino-card-vertical casino-card-info casino-card-info-guide">
                    <div class="info-card-img"><img src="<?php echo (!empty($image)) ? $image : CJP_URL . '/images/notallowed.png'; ?>" alt="<?php echo get_the_title();?>"></div>
                    <div class="info-card-content">
                        <h5><?php echo (!empty($single_software['sw_name']))?$single_software['sw_name']: get_the_title(); ?></h5>
                        <p><?php echo (!empty($single_software['sw_overview']))?$single_software['sw_overview']: get_the_content(); ?></p>
                        <a href="<?php the_permalink();?>" class="cta cta-outline cta-inline"><?php _e('Read More','ctl');?></a>
                    </div>
                </div>
            </div>
            <?php
        endif;
        endwhile;
        wp_reset_postdata();
        ?>
                
            </div>
        </div>
    </section>