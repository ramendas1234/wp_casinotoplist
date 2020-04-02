<?php
/*Template Name:Page with banner*/
?>
<?php get_header();?>
<?php while ( have_posts() ) { the_post();?>
<!--Inner Banner Section-->
<?php
$banner_image=get_field('banner_image');
$banner_heading=get_field('banner_heading');
$banner_description=get_field('banner_description');
?>
<div class="ct-inner-banner">
  <div class="banner-wrapper">
    <div class="image-holder" style="background: url(<?php echo !empty($banner_image)?$banner_image:CTL_URL.'/images/banner-reviews.png';?>) no-repeat center;background-size: cover;"></div>
    <div class="container">
        <div class="row">
            <div class="col-12">
              <div class="banner-content">
                  <h1><?php echo !empty($banner_heading)?do_shortcode($banner_heading):get_the_title();?></h1>
                  <p><?php echo !empty($banner_description)?do_shortcode($banner_description):'';?></p>
              </div>
            </div>
        </div>
    </div>
  </div>
</div>
<!--End Inner Banner Section-->

<!-- Sticky Menu -->
<?php get_template_part('template-parts/sticky-menu');?>
<!-- End Sticky Menu -->


<!-- BODY CONTENT AREA START -->
<main>
    
    <!--Editor Content-->
    <section class="ct-content-scetion">    	
      <div class="editor-content">
        <div class="container">
          <div class="row">
            <div class="col-12">
            	<!--Display content-->
            	<?php the_content(); ?>
            	<!--Display content-->

              <!-- Sticky Menu content-->
              <?php get_template_part('template-parts/sticky-menu-content');?>
              <!-- End Sticky Menu content-->	 
            </div>
          </div>
        </div>
      </div>
    </section>
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