<?php
/*
* Plugin Name: CAS TopList Plugin
* Description: Customized Plugin Partner / Casino TopList
* Version: 1.0
* Author: CAS
*/

if(!defined('TOPLIST_URL'))define('TOPLIST_URL',plugin_dir_url(__FILE__));

// register js on initialization

add_action('init', 'register_script');
function register_script()
{
    wp_enqueue_script('new_script', plugins_url('/js/custom.js', __FILE__), false, '1.0.0', 'all');
}

$plugin_url = plugin_dir_url(__FILE__);




// *********************************************************************************************************            Display TOPlist
function toplist_shortcode($atts, $content = null)
{
    $html='';
    if (!is_admin()) {
        // Attributes
        extract(shortcode_atts(array(
            'style' => '',
            'data' => ''
        ), $atts));
        
        $table_partner = json_decode(urldecode($atts['data']), true);
        
        ob_start();
        if ($atts['style'] == "rows") {
            include('inc/partials/toplist-rows.php');
        }
        if ($atts['style'] == "flex") {
            include('inc/partials/toplist-flex-rows.php');
        }
        if ($atts['style'] == "mini-rows") {
            include('inc/partials/toplist-mini-rows.php');
        }
        if ($atts['style'] == "casino-roller") {
            $meta = explode(',', $atts['other']);
           include('inc/partials/roller-casinos.php');
        }
        if ($atts['style'] == "grid-small") {
            include('inc/partials/toplist-grid-small.php');
        }
        if ($atts['style'] == "table") {
            include('inc/partials/toplist-table.php');
        }
        if ($atts['style'] == "filter") {
            include('inc/partials/toplist-filter.php');
        }
        if ($atts['style'] == "rows-pros-cons") {
            include('inc/partials/toplist-with-pros-cons.php');
        }
        if ($atts['style'] == "supported-casinos") {
            include('inc/partials/supported-casinos.php');
        }
        $html=ob_get_contents();
        ob_end_clean();
    }

    return $html;
}

add_shortcode("toplist", "toplist_shortcode");

function display_payment_options($atts, $content = null)
{
    $payment_options = json_decode(urldecode($atts['data']), true);
    $qo = get_queried_object();
   if ($atts['style'] == "payment-grid") {
        include('inc/partials/payment-options.php');
    }

    if($atts['style'] == "payment-list") {
            include('inc/partials/payment-list.php');
    }

    return "";
}

add_shortcode("display-payment-options", "display_payment_options");

function display_payment_options_meta($atts)
{
    $html='';
    if (!is_admin()) {
        // Attributes
        extract(shortcode_atts(array(
            'style' => '',
            'data' => ''
        ), $atts));
        
        $payment_option = json_decode(urldecode($atts['data']), true);
        $meta_data=!empty($atts['meta-data'])?json_decode(urldecode($atts['meta-data'])):'';
       // ob_start();
       if ($style == "payment-row") {
            include('inc/partials/payment-row.php');
        }elseif ($style == "payment-banner") {
            include('inc/partials/payment-banner.php');
        }
        //$html=ob_get_contents();
        //ob_end_clean();
    }

    return $html;
}
add_shortcode('display-payment-options-meta','display_payment_options_meta');

function display_software_provider($atts, $content = null)
{
    $table_software_provider = json_decode(urldecode($atts['data']), true);
    if($atts['style']=='json'):
        return json_encode($table_software_provider);
    endif;
    $qo = get_queried_object();

    if ($qo->post_type == 'reviews') {
        if (strpos(get_page_template_slug($qo->ID), "review-page.php" !== false)) {
            include('inc/partials/review-stack.php');
        } else {
            include('inc/partials/sidebar-software-providers.php');
        }
    } else {//if bookmaker review
        include('inc/partials/review-stack.php');
    }

    return "";

}

add_shortcode("display-software-provider", "display_software_provider");

// Shortcode to display the ratings
function display_ratings($atts, $content = null)
{
    $table_ratings = json_decode(urldecode($atts['data']), true);
    include('inc/partials/sidebar-ratings.php');

    return "";
}

add_shortcode('display-ratings', 'display_ratings');


// Shortcode to display the Basic Product Details
function display_product_details($atts, $content = null)
{

    $product_detail = json_decode(urldecode($atts['data']), true);
    /*print '<pre>';
    print_r($product_detail);
    print '</pre>';*/
    //include('inc/partials/sidebar-info.php');
    //return "";

}

add_shortcode('display-product-details', 'display_product_details');


// Shortcode to display Procons
function display_procons($atts, $content = null)
{


    $table_procons = json_decode(urldecode($atts['data']), true);
    $qo = get_queried_object();
    if ($qo->post_type == 'reviews') {
        $is_featured = true;

        foreach ($table_procons as $pc) {
            if ($pc['is_featured'] != 1) {
                $is_featured = false;
                break;
            }
        }

        /*if ($is_featured) {
            include('inc/partials/sidebar-featured.php');
        } else {
            include('inc/partials/sidebar-pros-cons.php');
        }*/
        include('inc/partials/sidebar-pros-cons.php');

    } /*else {//if bookmaker review
        include('inc/partials/review-accordion.php');
    }*/

    return "";

}

add_shortcode('display-procons', 'display_procons');

// Shortcode to display the languages
function display_supported_languages($atts, $content = null)
{
    $table_languages = json_decode(urldecode($atts['data']), true);

    include('inc/partials/sidebar-supported-languages.php');

    return "";
}

add_shortcode('display-supported-language', 'display_supported_languages');


?>

