<!-- FOOTER START -->
<?php //echo do_shortcode('[payment-methods qty="6"]')?>
    <footer class="ct-footer">
      <!-- trust icons bar-->
      <?php get_template_part('template-parts/header-footer-icon');?>         
      <!-- end trust icons bar-->

      <div class="ct-footer-top">
        <div class="container">
          <div class="row">
              <div class="col-lg-2 col-md-12 col-sm-12">
                <?php if ( is_active_sidebar( 'footer-1' ) ){?>
                  <?php dynamic_sidebar( 'footer-1' ); ?> 
                <?php } ?>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="menu-col">
                  <nav class="footer-menu two-columns">
                    <?php if ( is_active_sidebar( 'footer-2' ) ){?>
                    <?php dynamic_sidebar( 'footer-2' ); ?> 
                  <?php } ?>  
                  </nav>
                </div>               
              </div>
              <div class="col-lg-2 col-md-3 col-sm-12">
                <div class="menu-col">                 
                  <nav class="footer-menu">
                    <?php if ( is_active_sidebar( 'footer-3' ) ){?>
                      <?php dynamic_sidebar( 'footer-3' ); ?> 
                    <?php } ?>
                  </nav>
                </div>
              </div>
              <div class="col-lg-2 col-md-3 col-sm-12">
                  <div class="menu-col">
                    <nav class="footer-menu disclaimer">
                      <?php if ( is_active_sidebar( 'footer-4' ) ){?>
                        <?php dynamic_sidebar( 'footer-4' ); ?> 
                      <?php } ?>
                    </nav>
                  </div>
              </div>
              <div class="col-lg-2 col-md-12 col-sm-12">
                  <?php if ( is_active_sidebar( 'footer-5' ) ){?>
                    <?php dynamic_sidebar( 'footer-5' ); ?> 
                  <?php } ?>
              </div>
              <div class="col-lg-12 info text-center">
                  <hr>
                  <p>
                    <?php 
                      echo do_shortcode(get_field('footer_decleration_text','option'));
                    ?>
                  </p>
              </div>
          </div>
        </div>
      </div>
      <div class="ct-footer-bottom text-center">
        <div class="container">
          <p class="copy-right">
            <?php 
              echo do_shortcode(get_field('footer_copyright_text','option'));
            ?>
          </p>
        </div>
      </div>
    </footer>
    <!-- FOOTER END -->

    <?php wp_footer();?>
  </body>
</html>