<?php
//Define theme root url and path
if (!defined('CTL_URL'))
    define('CTL_URL', get_template_directory_uri());
if (!defined('CTL_PATH'))
    define('CTL_PATH', get_template_directory());


//Include necessary files
if(file_exists(CTL_PATH.'/includes/post_types.php'))
require_once(CTL_PATH.'/includes/post_types.php');
if(file_exists(CTL_PATH.'/includes/shortcode.php'))
require_once(CTL_PATH.'/includes/shortcode.php');
if(file_exists(CTL_PATH.'/includes/blocks.php'))
require_once(CTL_PATH.'/includes/blocks.php');
if(file_exists(CTL_PATH.'/includes/api.php'))
require_once(CTL_PATH.'/includes/api.php');

/*if(file_exists(CTL_PATH.'/includes/i18n.php'))
require_once(CTL_PATH.'/includes/i18n.php');*/

add_action('after_setup_theme', 'ctl_after_setup_theme');
if (!function_exists('ctl_after_setup_theme')) {

    function ctl_after_setup_theme() {
        load_theme_textdomain('ctl', CTL_PATH . '/languages');

        add_theme_support('automatic-feed-links');

        add_theme_support('title-tag');

        $GLOBALS['content_width'] = 640;

        add_theme_support('post-thumbnails');

        
        register_nav_menus(
                array(
                    'header' => __('Primary', 'ctl'),
                )
        );

        add_theme_support(
            'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            )
        );
    }

}

//Add script and css for front end
add_action('wp_enqueue_scripts', 'ctl_front_scripts');
if (!function_exists('ctl_front_scripts')) {

    function ctl_front_scripts() {
        wp_enqueue_style('ctl-fonts', 'https://fonts.googleapis.com/css?family=Quicksand:300,500,600,700&display=swap');
        wp_enqueue_style('ctl-style', CTL_URL . '/css/style.min.css',array(),filemtime(CTL_PATH.'/css/style.min.css'));

        wp_enqueue_script('jquery');
        wp_enqueue_script('ctl-slick', CTL_URL . '/js/slick.min.js', array('jquery'),false,true); 
        wp_enqueue_script('ctl-script', CTL_URL . '/js/custom.js', array('jquery'), filemtime(CTL_PATH.'/js/custom.js'), true);    

        wp_localize_script('ctl-script','ctlObj',array('ajax_url'=>admin_url('admin-ajax.php'),'home_url'=>home_url('/'),'theme_url'=>CTL_URL));   

        if (is_singular() && comments_open()) {
            wp_enqueue_script('comment-reply');
        }
    }

}
//Add script and css for front end
add_action('admin_enqueue_scripts', 'ctl_admin_scripts');
function ctl_admin_scripts(){
    wp_localize_script('jquery','ctlAdmin',array('ajax_url'=>admin_url('admin-ajax.php'),'home_url'=>get_site_url('/'),'theme_url'=>CTL_URL));
}

//Allow SVG files to upload
if (!function_exists('ctl_mime_types')) {

    function ctl_mime_types($file_types) {
        $new_filetypes = array();
        $new_filetypes['svg'] = 'image/svg';
        $file_types = array_merge($file_types, $new_filetypes);

        return $file_types;
    }

}
add_filter('upload_mimes', 'ctl_mime_types');

//Create widgets
add_action('widgets_init', 'ctl_widgets_init');
if (!function_exists('ctl_widgets_init')) {

    function ctl_widgets_init() {
        
        register_sidebar(
            array(
                'name' => __('Blog', 'ctl'),
                'id' => 'blog',
                'description' => __('Add widgets here to appear in your blog side.', 'ctl'),
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '<h4 class="widget-title">',
                'after_title' => '</h4>',
            )
        );
        register_sidebar(
            array(
                'name' => __('Footer 1', 'ctl'),
                'id' => 'footer-1',
                'description' => __('Add widgets here to appear in your footer.', 'ctl'),
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '<h4 class="widget-title">',
                'after_title' => '</h4>',
            )
        );
        register_sidebar(
            array(
                'name' => __('Footer 2', 'ctl'),
                'id' => 'footer-2',
                'description' => __('Add widgets here to appear in your footer.', 'ctl'),
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '<h4 class="widget-title">',
                'after_title' => '</h4>',
            )
        );
        register_sidebar(
            array(
                'name' => __('Footer 3', 'ctl'),
                'id' => 'footer-3',
                'description' => __('Add widgets here to appear in your footer.', 'ctl'),
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '<h4 class="widget-title">',
                'after_title' => '</h4>',
            )
        );
        register_sidebar(
            array(
                'name' => __('Footer 4', 'ctl'),
                'id' => 'footer-4',
                'description' => __('Add widgets here to appear in your footer.', 'ctl'),
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '<span class="widget-title">',
                'after_title' => '</span>',
            )
        );  
        register_sidebar(
            array(
                'name' => __('Footer 5', 'ctl'),
                'id' => 'footer-5',
                'description' => __('Add widgets here to appear in your footer.', 'ctl'),
                'before_widget' => '<div class="footer-legal">',
                'after_widget' => '</div>',
                'before_title' => '<span class="widget-title">',
                'after_title' => '</span>',
            )
        ); 
    }

}

//Add theme settings
if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title' => __('Theme General Settings', 'ctl'),
        'menu_title' => __('Theme Settings', 'ctl'),
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
            
}

//Get number of days left
if(!function_exists('ctl_days_left')){
    function ctl_days_left($date)
    {
        if(empty($date))    
            return 0;

        $future = strtotime($date); //Future date.
        $timefromdb = time();
        $timeleft = $future-$timefromdb;
        $daysleft = round((($timeleft/24)/60)/60); 
        return $daysleft;
    }
}

//Change excerpt length for games post type
add_filter( 'excerpt_length', function($length) {
    if(is_front_page() && get_post_type()=='casino_game')
    return 22;

    return $length;
} );

//Next & previous link
if(!class_exists('ctl_posts_link_class')){
    function ctl_posts_link_class($format){
        
         return 'class="cta cta-primary cta-next"';
    }
}
add_filter('previous_posts_link_attributes', 'ctl_posts_link_class');
add_filter('next_posts_link_attributes', 'ctl_posts_link_class');

function posts_link_prev_class($format) {
     $format = str_replace('href=', 'class="prev clean-gray" href=', $format);
     return $format;
}
add_filter('previous_post_link', 'posts_link_prev_class');


//Breadcrumb functionality
if(!function_exists('ctl_breadcrumb')){
    function ctl_breadcrumb($classes=array()) {
        if (is_home() || is_front_page())
            return;
        ?>
        <div class="container">
            <div class="breadcrumbs <?php echo implode(' ',$classes);?>">
                <ul>            
                    <li>
                        <a href="<?php echo home_url(); ?>">
                            <?php _e('Home','ctl');?>
                        </a>
                    </li>
                    <?php
                    global $post, $wp_query;
                    if (is_archive() && !is_tax() && !is_category() && !is_tag()) {

                        echo '<li>' . post_type_archive_title($prefix, false) . '</li>';
                    } else if (is_archive() && is_tax() && !is_category() && !is_tag()) {

                        // If post is a custom post type
                        $post_type = get_post_type();

                        // If it is a custom post type display name and link
                        if ($post_type != 'post') {

                        $post_type_object = get_post_type_object($post_type);
                        $post_type_archive = get_post_type_archive_link($post_type);

                        echo '<li><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                    }


                        $custom_tax_name = get_queried_object()->name;
                        echo '<li>' . $custom_tax_name . '</li>';
                    } else if (is_single()) {

                        echo '<li>' . get_the_title() . '</li>';
                    } else if (is_category()) {

                        // Category page
                        echo '<li>' . single_cat_title('', false) . '</li>';
                    } else if (is_page()) {

                        // Standard page
                        if ($post->post_parent) {

                            // If child page, get parents 
                            $anc = get_post_ancestors($post->ID);

                            // Get parents in the right order
                            $anc = array_reverse($anc);

                            // Parent page loop
                            if (!isset($parents))
                                $parents = null;
                            foreach ($anc as $ancestor) {
                                $parents .= '<li><a  href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';                           
                            }

                            // Display parent pages
                            echo '<li>' . $parents.'</li>';

                            // Current page
                            echo '<li>' . get_the_title() . '</li>';
                        } else {

                            // Just display current page if not parents
                            echo '<li>' . get_the_title() . '</li>';
                        }
                    } else if (is_tag()) {

                        // Tag page
                        // Get tag information
                        $term_id = get_query_var('tag_id');
                        $taxonomy = 'post_tag';
                        $args = 'include=' . $term_id;
                        $terms = get_terms($taxonomy, $args);
                        $get_term_id = $terms[0]->term_id;
                        $get_term_slug = $terms[0]->slug;
                        $get_term_name = $terms[0]->name;

                        // Display the tag name
                        echo '<li>' . $get_term_name . '</li>';
                    } elseif (is_day()) {

                        // Day archive
                        // Year link
                        echo '<li><a href="' . get_year_link(get_the_time('Y')) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';                   

                        // Month link
                        echo '<li><a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';

                        // Day display
                        echo '<li>' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</li>';
                    } else if (is_month()) {

                        // Month Archive
                        // Year link
                        echo '<li><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link(get_the_time('Y')) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';

                        // Month display
                        echo '<li>' . get_the_time('M') . ' Archives</li>';
                    } else if (is_year()) {

                        // Display year archive
                        echo '<li>' . get_the_time('Y') . ' Archives</li>';
                    } else if (is_author()) {

                        // Auhor archive
                        // Get the author information
                        global $author;
                        $userdata = get_userdata($author);

                        // Display author name
                        echo '<li>' . 'Author: ' . $userdata->display_name . '</li>';
                    } elseif (is_404()) {

                        // 404 page
                        echo '<li>' . 'Page not found' . '</li>';
                    }elseif (is_search()) {

                        // 404 page
                        echo '<li>' . 'Search' . '</li>';
                    }
                    ?>
                </ul>        
            </div>
        </div>
        <?php
    }
}

//Add body class conditionally
add_filter( 'body_class','ctl_body_classes' );
if(!function_exists('ctl_body_classes')){
    function ctl_body_classes( $classes ) {

    if ( is_404() || is_search()) {
        $classes[] = 'serach-results';
    }

    return $classes;

    }
}
add_filter('show_admin_bar', '__return_false');


/*
Remove base slug for review post type
*/
if(!function_exists('ctl_post_type_permalinks')){
    function ctl_post_type_permalinks( $post_link, $post, $leavename ){
        if ( isset( $post->post_type ) && ('free_game' == $post->post_type || 'reviews' == $post->post_type) ) {
            $post_type_data = get_post_type_object( $post->post_type );

            $slug=!empty($post_type_data->rewrite['slug'])
    ?$post_type_data->rewrite['slug']:$post->post_type;
            $post_link = str_replace( '/' . $slug . '/', '/', $post_link );

        }

        return $post_link;
    }

}
//add_filter('post_type_link', 'ctl_post_type_permalinks', 10, 3);

if (!function_exists('ctl_add_post_type_names_to_main_query')) {

    function ctl_add_post_type_names_to_main_query($query) {
        if (!$query->is_main_query()) {
            return;
        }
        if (!isset($query->query['page']) || 2 !== count($query->query)) {
            return;
        }
        if (empty($query->query['name'])) {
            return;
        }

       $query->set( 'post_type', array( 'post', 'page', 'reviews','free_game') );

    }

}
add_action('pre_get_posts', 'ctl_add_post_type_names_to_main_query');


?>
