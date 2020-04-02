<?php 
$promotions_query = new WP_Query(array('post_type' => 'casino_promotion', 'post_status' => 'publish', 'posts_per_page' => 2, 'meta_query' => array(array('key' => 'event_date', 'value' => date('Ymd'), 'compare' => '>=', 'type' => 'NUMERIC'))));

?>

<aside class="sidebar-panel">
                    <h6>Casino promotions</h6>
                    <?php  if($promotions_query->have_posts()):?>
                    <?php 
                        while ($promotions_query->have_posts()):$promotions_query->the_post();
                        get_template_part('template-parts/card','promotion')
                    ?>
                    
                    <div class="mb-10"></div>
                    <?php endwhile;?>
                    <a href="#" class="ct-section-link">Check all promotion</a>
                    <?php endif;?>
                  </aside>