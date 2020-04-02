 <?php 
  $header_footer_icons_1=get_field('header_footer_icons_1','option');
  $header_footer_icons_2=get_field('header_footer_icons_2','option');
  $header_footer_icons_3=get_field('header_footer_icons_3','option');
  ?>

<div class="trust-icons-bar">
      <div class="container">
        <div class="row row-flex row-flex-nowrap row-flex-justify">
          <?php if(!empty($header_footer_icons_1)){?>  
          <div class="col col-sm-4">
            <div class="trust-icon">
                <img src="<?php echo $header_footer_icons_1['image'];?>" alt="">
              <p><?php echo $header_footer_icons_1['text'];?></p>
            </div>
          </div>
          <?php } ?>  
          <?php if(!empty($header_footer_icons_2)){?>  
          <div class="col col-sm-4">
            <div class="trust-icon">
                <img src="<?php echo $header_footer_icons_2['image'];?>" alt="">
              <p><?php echo $header_footer_icons_2['text'];?></p>
            </div>
          </div>
           <?php } ?>
          <?php if(!empty($header_footer_icons_3)){?>  
          <div class="col col-sm-4">
            <div class="trust-icon">
                <img src="<?php echo $header_footer_icons_3['image'];?>" alt="">
              <p><?php echo $header_footer_icons_3['text'];?></p>
            </div>
          </div>
          <?php } ?>  
        </div>
      </div>
    </div>
  