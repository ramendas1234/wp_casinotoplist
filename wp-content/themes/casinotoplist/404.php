<?php get_header();?>
<!-- BODY CONTENT AREA START -->
    <main>
        <!--404 content-->
        <section class="page-not-found">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <?php $bg_image=get_field('404_background_image','option');?>
                <img src="<?php echo !empty($bg_image)?$bg_image:CTL_URL.'/images/404.png';?>" alt="" />
                <?php $description=get_field('404_description','option');?>
                <h3><?php echo !empty($description)?$description:'<span>Ooops!</span> Page not found';?></h3>
                <?php $button_text=get_field('404_button_text','option');?>
                <a class="cta cta-primary cta-white cta-center" href="<?php echo home_url('/');?>"><?php echo !empty($button_text)?$button_text:'Take me back to home';?></a>
              </div>
            </div>
          </div>
        </section>
        <!--End 404 content-->
    </main>
<!-- BODY CONTENT AREA END -->
<?php get_footer();?>
