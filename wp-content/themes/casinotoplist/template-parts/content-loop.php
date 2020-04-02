<div class="col-sm-12">
  <div class="result-item">
    <div class="info">
      <h5><?php the_title();?></h5>
      <p><?php the_excerpt();?></p>
      <a href="<?php the_permalink();?>"><?php the_permalink();?></a>
    </div>
    <a class="cta cta-inline cta-outline cta-primary" href="<?php the_permalink();?>">
      <?php _e('Read More','ctl');?>
        
      </a>
  </div>
</div>  