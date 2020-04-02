<?php 
$related_pages=get_field('related_pages');
if(!empty($related_pages)){  
?>
<div class="ct-related-pages">
    <div class="ct-related-pages-header text-center"><h6><?php _e('Related Pages','ctl');?></h6></div>
    <div class="ct-related-pages-links">
        <ul>
            <?php foreach($related_pages as $page_id){
              ?>
              <li><a href="<?php echo get_permalink($page_id);?>"><?php echo get_the_title($page_id);?></a></li>
              <?php
            }?>
        </ul>
    </div>
</div>
<?php } ?>