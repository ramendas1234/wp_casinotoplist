<?php get_header();?>
    <!-- BODY CONTENT AREA START -->
    <main>
        <!--Search Result-->
        <section class="serach-results">
          <div class="serach-results-header">
            <div class="container">
              <div class="page-header">
                <p class="page-title"><?php _e('Search Results for','ctl');?>:&nbsp;</p>
                <div class="page-description"><?php echo get_search_query();?></div>
              </div>
            </div>
          </div>
          <div class="container">
            <?php if ( have_posts() ) { 
              global $wp_query;
              $paged = !empty($wp_query->query_vars['paged']) ? $wp_query->query_vars['paged'] : 1;
              $prev_posts = ( $paged - 1 ) * $wp_query->query_vars['posts_per_page'];
              $from = 1 + $prev_posts;
              $to = count( $wp_query->posts ) + $prev_posts;
              $of = $wp_query->found_posts;
    
              ?>
              <div class="result-count"><?php printf( 'Showing results %s to %s of %s results', $from, $to, $of );?></div>
              <?php
              while ( have_posts() ) {
                the_post(); 
                get_template_part('template-parts/content-loop');
              }           
            }else{
              get_template_part('template-parts/no-result');
            } ?>
          </div>
        </section>
        <!--End Search Result-->
        <?php if ( have_posts() ) { ?>
        <div class="container">
            <div class="pagination-bar">                
              <?php posts_nav_link('<span></span>','Previous','Next');?>
            </div>
        </div>
        <?php } ?>

    </main>
    <!-- BODY CONTENT AREA END -->

<?php get_footer();?>