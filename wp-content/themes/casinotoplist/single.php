<?php get_header(); ?>
<?php while (have_posts()) {
    the_post();
    ?>
    <!-- BODY CONTENT AREA START -->
    <main>
        <section class="ct-article-page ct-article-page-payment-option">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-sm-12">
                        <!--Editor Content-->
                        <div class="editor-content">
                            <!--Editor Content-->
                            <?php the_content(); ?>
                            
                            <?php get_template_part('template-parts/related-pages');?>
                        </div>
                        <!--Editor Content-->
                    </div>
                    <div class="col-lg-3 col-sm-12">
        <?php echo do_shortcode("[casino-promotions qty='3'  show_term='false'  style='cards' button_text='play now' ]") ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- BODY CONTENT AREA END -->
<?php } ?>
<?php get_footer(); ?>