  <!-- HEADER START -->
    <header class="ct-header">
      <div class="ct-header-top">
        <div class="container">
          <figure class="ct-logo">
            <a href="<?php echo home_url();?>">
              <img src="<?php echo get_field('logo','option');?>" alt="<?php echo get_option('blogname');?>">
            </a>
          </figure>
          <div class="ct-siteinfo">
            <ul>
              <?php 
              $header_site_info_1=get_field('header_site_info_1','option');
              $header_site_info_2=get_field('header_site_info_2','option');
              $header_site_info_3=get_field('header_site_info_3','option');
              ?>
              <?php if(!empty($header_site_info_1)){?>              
              <li>
                <?php if(!empty($header_site_info_1['image_1'])){?>
                  <img src="<?php echo $header_site_info_1['image_1'];?>" alt="">
                <?php } ?>
                <?php if(!empty($header_site_info_1['image_2'])){?>
                  <img src="<?php echo $header_site_info_1['image_2'];?>" alt="">
                <?php } ?><span><?php echo !empty($header_site_info_1['description'])?$header_site_info_1['description']:'';?></span>
              </li>
              <?php } ?>
              <?php if(!empty($header_site_info_2)){?>
              <li>
                <?php if(!empty($header_site_info_2['image_1'])){?>
                <img src="<?php echo $header_site_info_2['image_1'];?>" alt="">
                <?php } ?>
                <span><?php echo !empty($header_site_info_2['description'])?$header_site_info_2['description']:'';?>
                </span>
              </li>
              <?php } ?>  
              <?php if(!empty($header_site_info_3)){?>
              <li>
                <?php if(!empty($header_site_info_3['image_1'])){?>
                <img src="<?php echo $header_site_info_3['image_1'];?>" alt="">
                <?php } ?>
                <span><?php echo !empty($header_site_info_3['description'])?$header_site_info_3['description']:'';?>
                </span>
              </li>
              <?php } ?> 
            </ul>
          </div>
        </div>
      </div>
      <div class="ct-header-bottom">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <nav class="ct-navigation">                
                <?php wp_nav_menu(array('theme_location'=>'header','menu_class'=>''))?>
                <div class="mobile-menu">
                  <span class="bar-1"></span>
                  <span class="bar-2"></span>
                  <span class="bar-3"></span>
                </div>
              </nav>
              <div class="ct-site-search">
                <div class="desktop-view">
                  <form action="<?php echo home_url('/');?>" method="get">
                    <input class="site-search-field" type="search" name="s" placeholder="<?php _e('Search','ctl');?>">
                  </form>
                </div>
                <div class="tab-view">
                  <i><img src="<?php echo CTL_URL; ?>/images/icon/search.svg" alt=""></i>
                  <form action="<?php echo home_url('/');?>" method="get">
                    <input class="site-search-field" type="search" name="s" placeholder="<?php _e('Search','ctl');?>">
                  </form>
                </div>
              </div>
              <div class="mobile-menu">
                <span class="bar-1"></span>
                <span class="bar-2"></span>
                <span class="bar-3"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- HEADER END -->

    <!--Breadcrumps-->
    <?php ctl_breadcrumb();?>  
    <!--End Breadcrumps-->