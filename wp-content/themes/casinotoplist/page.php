<?php get_header();?>
    <?php while ( have_posts() ) { the_post();?>
    <!-- Sticky Menu -->
    <?php get_template_part('template-parts/sticky-menu');?>
    <!-- End Sticky Menu -->

    <!-- BODY CONTENT AREA START -->
    <main>
        <!--Paypal Casinos Content-->
        <section class="ct-paypal-casinos">
          <div class="container">
            <div class="row">              
              <div class="col-lg-12 col-sm-12">
                <div class="text-content">
                  <h4><?php the_title();?></h4>                  
                </div>
              </div>
            </div>
          </div>
        </section>
        <!--End Paypal Casinos Content-->

        <!--Editor Content-->
        <?php the_content();?>
        <!--End Editor Content-->

        <!--Related pages links-->
        <div class="container">
          <?php get_template_part('template-parts/related-pages');?>      
        </div>
        <!--End Related pages links-->
        
    </main>
    <!-- BODY CONTENT AREA END -->
    <?php } ?>

<?php get_footer();?>