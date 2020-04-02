<?php
/* Shortcode for masking Promotions CAS shortcode */
add_shortcode('casino-promotions', 'ctl_promotion_shortcode');
if (!function_exists('ctl_promotion_shortcode')) {

    function ctl_promotion_shortcode($atts) {
        $atts = shortcode_atts(array(
            'qty' => 3,
            'show_term' => '',
            'time_left' => '',
            'style' => 'rows',
            'button_text' => 'Qualify Now',
                //'start_at'=>false
                ), $atts, 'casino-promotions');
        extract($atts);
        $style = $atts['style'];
        $btn_label = $atts['button_text'];
        if ($atts['show_term'] == 'true') {
            $tc_display = 'display:block';
        } else {
            $tc_display = 'display:none';
        }
        if ($atts['time_left'] == 'true') {
            $time_display = 'display:block';
        } else {
            $time_display = 'display:none';
        }
        ob_start();
        $qty = $atts['qty'];
        //$offset =!empty($start_at)?$start_at:0;
        $args = array('post_type' => 'casino_promotion', 'post_status' => 'publish', 'posts_per_page' => (!empty($qty)) ? $qty : 4);
        $args['meta_query'] = array(array('key' => 'event_date', 'value' => date('Ymd'), 'compare' => '>=', 'type' => 'NUMERIC'));
        $promotions_query = new WP_Query($args);


        if ($promotions_query->have_posts()) {
            $i = 1;
            while ($promotions_query->have_posts()):$promotions_query->the_post();
                $pid = get_field('pid');
                $p = (array) json_decode(do_shortcode("[cas-product-details pid='$pid' review='return']"));
                ?>
                <?php if ($style == 'home-cards') { ?>
                    <?php include CTL_PATH . '/template-parts/home-card-promotion.php'; ?>
                    <?php $i++;
                }
                if ($style == 'cards') {
                    ?>
                    <?php include CTL_PATH . '/template-parts/card-promotion.php'; ?>
                <?php }
                if ($style == 'rows') {
                    ?>
                    <?php include CTL_PATH . '/template-parts/rows-promotion.php'; ?>
                <?php } ?>
                <?php
            endwhile;
        }
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }

}

add_shortcode('casino-promotions', 'ctl_promotion_shortcode');
if (!function_exists('ctl_promotion_shortcode')) {

    function ctl_promotion_shortcode($atts) {
        $atts = shortcode_atts(array(
            'qty' => 3,
            'show_term' => '',
            'time_left' => '',
            'style' => 'rows',
            'button_text' => 'Qualify Now',
                //'start_at'=>false
                ), $atts, 'casino-promotions');
        extract($atts);
        $style = $atts['style'];
        $btn_label = $atts['button_text'];
        if ($atts['show_term'] == 'true') {
            $tc_display = 'display:block';
        } else {
            $tc_display = 'display:none';
        }
        if ($atts['time_left'] == 'true') {
            $time_display = 'display:block';
        } else {
            $time_display = 'display:none';
        }
        ob_start();
        $qty = $atts['qty'];
        //$offset =!empty($start_at)?$start_at:0;
        $args = array('post_type' => 'casino_promotion', 'post_status' => 'publish', 'posts_per_page' => (!empty($qty)) ? $qty : 4);
        $args['meta_query'] = array(array('key' => 'event_date', 'value' => date('Ymd'), 'compare' => '>=', 'type' => 'NUMERIC'));
        $promotions_query = new WP_Query($args);


        if ($promotions_query->have_posts()) {
            $i = 1;
            while ($promotions_query->have_posts()):$promotions_query->the_post();
                $pid = get_field('pid');
                $p = (array) json_decode(do_shortcode("[cas-product-details pid='$pid' review='return']"));
                ?>
                <?php if ($style == 'home-cards') { ?>
                    <?php include CTL_PATH . '/template-parts/home-card-promotion.php'; ?>
                    <?php $i++;
                }
                if ($style == 'cards') {
                    ?>
                    <?php include CTL_PATH . '/template-parts/card-promotion.php'; ?>
                <?php }
                if ($style == 'rows') {
                    ?>
                    <?php include CTL_PATH . '/template-parts/rows-promotion.php'; ?>
                <?php } ?>
                <?php
            endwhile;
        }
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }

}

add_shortcode('payment-methods', 'ctl_payment_methods_shortcode');
if (!function_exists('ctl_payment_methods_shortcode')) {

    function ctl_payment_methods_shortcode($atts) {
        $atts = shortcode_atts(array(
            'qty' => 3,
            'style' => 'rows',
            'offset' => 0,
            'button_text' => 'Qualify Now',
            'group_id' => '',
                //'start_at'=>false
                ), $atts, 'payment-methods');
        $style = $atts['style'];
        $group_id = $atts['group_id'];
        if(empty($group_id)) return;
        $qty = $atts['qty'];
        $offset = $atts['offset'];
        ob_start();
        $args = array('post_type' => 'payment_option', 'post_status' => 'publish', 'posts_per_page' => (!empty($qty)) ? $qty : 4);
        $args['offset'] = $offset;
        $payment_query = new WP_Query($args);
        if ($payment_query->have_posts()) {
            while ($payment_query->have_posts()):$payment_query->the_post();
                $poid = get_field('payment_method_id');
                if (!$poid)
                    continue;
                $payment_assets = (array) json_decode(do_shortcode("[cas-payment-options-meta poid='$poid' toplistgroup='$group_id' toplist='return']"));
                $image_url = (!empty($payment_assets))?$payment_assets['url']: get_the_post_thumbnail_url(get_the_ID());
                $payment_name = (!empty($payment_assets))?$payment_assets['name']: get_the_title(get_the_ID());
                ?>
                <?php
                if ($style == 'rows'):
                    ?>
                    <!--THIS HTML SECTION WILL BE REPLACE cas-payment-options-meta SHORTCODE LATER-->
                    <div class="col-sm-12">
                        <div class="casino-card casino-card-vertical casino-card-payment-guide">
                            <div class="left-panel-img"><img src="<?php echo (!empty($image_url))?$image_url:CTL_URL.'/images/notallowed.png'; ?>" alt="<?php echo $payment_name;?>"></div>
                            <div class="mid-panel">
                                <a href="<?php the_permalink(); ?>"><h4><?php echo $payment_name; ?></h4></a>
                                <p>
                    <?php
                    $excerpt = get_the_excerpt(get_the_ID());
                    if (!empty($excerpt) && strlen($excerpt) > 50)
                        echo mb_substr($excerpt, 0, 50, "utf-8");
                    else
                        echo $excerpt;
                    ?>
                                </p>
                                <a href="<?php the_permalink(); ?>" class="cta cta-inline cta-outline">Read More</a>
                            </div>
                            <?php echo do_shortcode("[cas-toplist-group id='$group_id' paymentmethod-id='$poid' style='supported-casinos' ]");?>
                        </div>
                    </div>
                     <!--THIS HTML SECTION WILL BE REPLACE cas-payment-options-meta SHORTCODE LATER-->
                <?php endif; ?>
                <?php
            endwhile;
        }
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }

}



//test---------------
//add_action('init','my_test');

function my_test() {
    echo '<pre>';
    //do_shortcode("[cas-payment-options-meta poid='10' toplistgroup='2' toplist='return']");
    //$ab = (array) json_decode(do_shortcode("[cas-product-details pid='156' review='return']"));
    //print_r($ab);
    //echo do_shortcode('[cas-toplist-group id="2" qty="12" style="mini-rows"]');
    //print_r((array) json_decode(do_shortcode('[cas-pro-cons pid="156" is-featured="2" review="return"]'))) ;
    //echo(do_shortcode('[cas-term id="156" review="return"]')) ;
    //echo(do_shortcode('[cas-toplist-group id="2" bonus-type="high_roller" style="rows" ]')) ;
    //echo(do_shortcode('[cas-software-platform pid="156" toplist="return"]')) ;
    //print_r(json_decode(do_shortcode('[cas-software-provider pid="156" software-provider="review" style="json"]'))) ;
    //var_dump(do_shortcode('[cas-ratings pid="156" review="return"]')) ;
    //print_r((array) json_decode(do_shortcode('[cas-ratings pid="156" review="display"]')));
    //echo do_shortcode("[cas-payment-options pid='156' payment-options='review' style='payment-list']");
    //echo do_shortcode("[casino-promotions qty='3' show_term=true time_left='false' style='home-cards' ]");
    //$ab = (array) json_decode(do_shortcode("[cas-payment-options-meta poid='1' toplistgroup='2' toplist='return']"));
    //print_r($ab); //do_shortcode("[cas-payment-options-meta poid='10' toplistgroup='2']");
    //echo $paymentimg = do_shortcode("[cas-toplist-group id='2' paymentmethod-id='5' style='supported-casinos' ]"); 
    //echo $paymentimg = do_shortcode("[cas-payment-options-meta poid='5' toplistgroup='2' style='payment-row' ]"); 
    echo $paymentimg = do_shortcode("[cas-toplist-group id='2' softwareprovider-id='13' style='table' qty='3']"); 
    
    exit();
}
?>