<?php
add_action('init', 'ctl_post_types');
if(!function_exists('ctl_post_types'))
{
	function ctl_post_types() {	
	//Reviews post types

	    $labels = array(
	        'name' => _x('Casino Reviews', 'Casino Reviews', 'ctl'),
	        'singular_name' => _x('Review', 'Reviews', 'ctl'),
	        'menu_name' => __('Reviews', 'ctl'),
	        'parent_item_colon' => __('Reviews', 'ctl'),
	        'all_items' => __('All Reviews', 'ctl'),
	        'view_item' => __('View Reviews', 'ctl'),
	        'add_new_item' => __('Add New Review', 'ctl'),
	        'add_new' => __('Add New', 'ctl'),
	        'edit_item' => __('Edit Review', 'ctl'),
	        'update_item' => __('Update Review', 'ctl'),
	        'search_items' => __('Search Review', 'ctl'),
	        'not_found' => __('Not Found', 'ctl'),
	        'not_found_in_trash' => __('Not found in Trash', 'ctl'),
	    );

	    $args = array(
	        'labels' => $labels,
	        'description' => __('Description.', 'ctl'),
	        'public' => true,
	        'publicly_queryable' => true,
	        'show_ui' => true,
	        'show_in_menu' => true,
	        'query_var' => true,
	        'rewrite' => array('slug' => 'casino-review'),
	        'capability_type' => 'post',
	        'has_archive' => true,
	        'hierarchical' => false,
	        'menu_position' => null,
	        'show_in_rest'=>true,
	        'menu_icon' => 'dashicons-edit',
	        'supports' => array('title', 'editor','thumbnail')
	    );

	    // Registering Games Post Type
	    register_post_type('reviews', $args);

	    unset($labels);
	    unset($args);	
	    //Games post types
	    $labels = array(
	        'name' => _x('Casino Games Guide', 'Casino Games Guide', 'ctl'),
	        'singular_name' => _x('Casino Games Guide', 'Casino Games Guide', 'ctl'),
	        'menu_name' => __('Casino Games Guide', 'ctl'),
	        'parent_item_colon' => __('Casino Games Guide', 'ctl'),
	        'all_items' => __('All Games Guides', 'ctl'),
	        'view_item' => __('View Games Guides', 'ctl'),
	        'add_new_item' => __('Add New Games Guide', 'ctl'),
	        'add_new' => __('Add New', 'ctl'),
	        'edit_item' => __('Edit Games Guide', 'ctl'),
	        'update_item' => __('Update Games Guide', 'ctl'),
	        'search_items' => __('Search Games Guide', 'ctl'),
	        'not_found' => __('Not Found', 'ctl'),
	        'not_found_in_trash' => __('Not found in Trash', 'ctl'),
	    );

	    $args = array(
	        'labels' => $labels,
	        'description' => __('Description.', 'ctl'),
	        'public' => true,
	        'publicly_queryable' => true,
	        'show_ui' => true,
	        'show_in_menu' => true,
	        'query_var' => true,
	        'rewrite' => array('slug' => 'casino-games'),
	        'capability_type' => 'post',
	        'has_archive' => true,
	        'hierarchical' => false,
	        'menu_position' => null,
	        'menu_icon' => 'dashicons-shield',
                'show_in_rest' => true,
	        'supports' => array('title', 'editor','thumbnail','excerpt')
	    );

	    // Registering Games Post Type
	    register_post_type('casino_game', $args);
	    
	    unset($labels);
	    unset($args);
            
             //Free games post types

	    $labels = array(
	        'name' => _x('Free Games', 'Free Games', 'cjp'),
	        'singular_name' => _x('Free Game', 'Free Game', 'cjp'),
	        'menu_name' => __('Free Games', 'cjp'),
	        'parent_item_colon' => __('Free Game', 'cjp'),
	        'all_items' => __('All Free Games', 'cjp'),
	        'view_item' => __('View Free Games', 'cjp'),
	        'add_new_item' => __('Add New Free Game', 'cjp'),
	        'add_new' => __('Add New', 'cjp'),
	        'edit_item' => __('Edit Free Game', 'cjp'),
	        'update_item' => __('Update Free Game', 'cjp'),
	        'search_items' => __('Search Free Game', 'cjp'),
	        'not_found' => __('Not Found', 'cjp'),
	        'not_found_in_trash' => __('Not found in Trash', 'cjp'),
	    );

	    $args = array(
	        'labels' => $labels,
	        'description' => __('Description.', 'cjp'),
	        'public' => true,
	        'publicly_queryable' => true,
	        'show_ui' => true,
	        'show_in_menu' => true,
	        'query_var' => true,
	        'rewrite' => array('slug' => 'free-game'),
	        'capability_type' => 'post',
	        'has_archive' => true,
	        'hierarchical' => false,
	        'menu_position' => null,
	        'menu_icon' => 'dashicons-shield-alt',
                'show_in_rest' => true,
	        'supports' => array('title', 'editor','thumbnail')
	    );

	    // Registering Games Post Type
	    register_post_type('free_game', $args);

	    unset($labels);
	    unset($args);
            
            // Games category
		$labels = array(
	        'name'              => _x( 'Game Category', 'Games', 'cjp' ),
	        'singular_name'     => _x( 'Game', 'Game', 'cjp' ),
	        'search_items'      => __( 'Search Games', 'cjp' ),
	        'all_items'         => __( 'All Games', 'cjp' ),
	        'parent_item'       => __( 'Parent Game', 'cjp' ),
	        'parent_item_colon' => __( 'Parent Game:', 'cjp' ),
	        'edit_item'         => __( 'Edit Game', 'cjp' ),
	        'update_item'       => __( 'Update Game', 'cjp' ),
	        'add_new_item'      => __( 'Add New Game', 'cjp' ),
	        'new_item_name'     => __( 'New Game Name', 'cjp' ),
	        'menu_name'         => __( 'Game Category', 'cjp' ),
	    );
	 
	    $args = array(
	        'hierarchical'      => true,
	        'labels'            => $labels,
	        'show_ui'           => true,
	        'show_admin_column' => true,
	        'query_var'         => true,
	        'rewrite'           => array( 'slug' => 'games' ),
	    );
	 
	   // register_taxonomy( 'game_category', 'casino_guide', $args );
	    register_taxonomy( 'game_category', array('free_game'), $args );

	    unset($labels);
	    unset($args);

	    //Tesimonials post types
	    $labels = array(
	        'name' => _x('Tesimonials', 'Tesimonials', 'ctl'),
	        'singular_name' => _x('Tesimonial', 'Tesimonial', 'ctl'),
	        'menu_name' => __('Tesimonials', 'ctl'),
	        'parent_item_colon' => __('Tesimonials', 'ctl'),
	        'all_items' => __('All Tesimonials', 'ctl'),
	        'view_item' => __('View Tesimonials', 'ctl'),
	        'add_new_item' => __('Add New Tesimonial', 'ctl'),
	        'add_new' => __('Add New', 'ctl'),
	        'edit_item' => __('Edit Tesimonial', 'ctl'),
	        'update_item' => __('Update Tesimonial', 'ctl'),
	        'search_items' => __('Search Tesimonial', 'ctl'),
	        'not_found' => __('Not Found', 'ctl'),
	        'not_found_in_trash' => __('Not found in Trash', 'ctl'),
	    );

	    $args = array(
	        'labels' => $labels,
	        'description' => __('Description.', 'ctl'),
	        'public' => false,
	        'publicly_queryable' => false,
	        'show_ui' => true,
	        'show_in_menu' => true,
	        'query_var' => true,
	        'rewrite' => array('slug' => 'tesimonials'),
	        'capability_type' => 'post',
	        'has_archive' => true,
	        'hierarchical' => false,
	        'menu_position' => null,
	        'menu_icon' => 'dashicons-format-quote',
	        'supports' => array('title')
	    );

	    // Registering Testimonial Post Type
	    register_post_type('casino_testimonial', $args);

	    //Tesimonials post types
	    $labels = array(
	        'name' => _x('Promotions', 'Promotions', 'ctl'),
	        'singular_name' => _x('Promotion', 'Promotion', 'ctl'),
	        'menu_name' => __('Promotions', 'ctl'),
	        'parent_item_colon' => __('Promotions', 'ctl'),
	        'all_items' => __('All Promotions', 'ctl'),
	        'view_item' => __('View Promotions', 'ctl'),
	        'add_new_item' => __('Add New Promotion', 'ctl'),
	        'add_new' => __('Add New', 'ctl'),
	        'edit_item' => __('Edit Promotion', 'ctl'),
	        'update_item' => __('Update Promotion', 'ctl'),
	        'search_items' => __('Search Promotion', 'ctl'),
	        'not_found' => __('Not Found', 'ctl'),
	        'not_found_in_trash' => __('Not found in Trash', 'ctl'),
	    );

	    $args = array(
	        'labels' => $labels,
	        'description' => __('Description.', 'ctl'),
	        'public' => false,
	        'publicly_queryable' => false,
	        'show_ui' => true,
	        'show_in_menu' => true,
	        'query_var' => true,
	        'rewrite' => array('slug' => 'promotion'),
	        'capability_type' => 'post',
	        'has_archive' => true,
	        'hierarchical' => false,
	        'menu_position' => null,
	        'menu_icon' => 'dashicons-megaphone',
	        'supports' => array('title','editor','thumbnail')
	    );

	    // Registering Promotions Post Type
	    register_post_type('casino_promotion', $args);

	    //Payment Options post types
	    $labels = array(
	        'name' => _x('Payment Options', 'Promotions', 'ctl'),
	        'singular_name' => _x('Payment Option', 'Promotion', 'ctl'),
	        'menu_name' => __('Payment Options', 'ctl'),
	        'parent_item_colon' => __('Payment Options', 'ctl'),
	        'all_items' => __('All Payment Options', 'ctl'),
	        'view_item' => __('View Payment Options', 'ctl'),
	        'add_new_item' => __('Add New Payment Option', 'ctl'),
	        'add_new' => __('Add New', 'ctl'),
	        'edit_item' => __('Edit Payment Option', 'ctl'),
	        'update_item' => __('Update Payment Option', 'ctl'),
	        'search_items' => __('Search Payment Option', 'ctl'),
	        'not_found' => __('Not Found', 'ctl'),
	        'not_found_in_trash' => __('Not found in Trash', 'ctl'),
	    );

	    $args = array(
	        'labels' => $labels,
	        'description' => __('Description.', 'ctl'),
	        'public' => true,
	        'publicly_queryable' => true,
	        'show_ui' => true,
	        'show_in_menu' => true,
	        'query_var' => true,
	        'rewrite' => array('slug' => 'payment-options'),
	        'capability_type' => 'post',
	        'has_archive' => true,
	        'hierarchical' => false,
	        'menu_position' => null,
	        'menu_icon' => 'dashicons-cart',
                'show_in_rest' => true,
	        'supports' => array('title','editor','thumbnail')
	    );

	    // Registering Payment Options Post Type
	    register_post_type('payment_option', $args);
            
            //Casino Software post types
	    $labels = array(
	        'name' => _x('Casino Software', 'Promotions', 'ctl'),
	        'singular_name' => _x('Casino Software', 'Promotion', 'ctl'),
	        'menu_name' => __('Casino Softwares', 'ctl'),
	        'parent_item_colon' => __('Casino Softwares', 'ctl'),
	        'all_items' => __('All Casino Softwares', 'ctl'),
	        'view_item' => __('View Casino Softwares', 'ctl'),
	        'add_new_item' => __('Add New Casino Software', 'ctl'),
	        'add_new' => __('Add New', 'ctl'),
	        'edit_item' => __('Edit Casino Software', 'ctl'),
	        'update_item' => __('Update Casino Software', 'ctl'),
	        'search_items' => __('Search Casino Software', 'ctl'),
	        'not_found' => __('Not Found', 'ctl'),
	        'not_found_in_trash' => __('Not found in Trash', 'ctl'),
	    );

	    $args = array(
	        'labels' => $labels,
	        'description' => __('Description.', 'ctl'),
	        'public' => true,
	        'publicly_queryable' => true,
	        'show_ui' => true,
	        'show_in_menu' => true,
	        'query_var' => true,
	        'rewrite' => array('slug' => 'casino-softwares'),
	        'capability_type' => 'post',
	        'has_archive' => true,
	        'hierarchical' => false,
	        'menu_position' => null,
	        'menu_icon' => 'dashicons-admin-site-alt2',
                'show_in_rest' => true,
	        'supports' => array('title','editor','thumbnail')
	    );

	    // Registering Payment Options Post Type
	    register_post_type('casino_software', $args);
            
	    flush_rewrite_rules();
	}
}


//add_action('admin_menu', 'wpdocs_register_my_custom_submenu_page');
//  
//function wpdocs_register_my_custom_submenu_page() {
//    
//    add_submenu_page(
//    'edit.php?post_type=casino_software',
//    __( 'Test Settings', 'menu-test' ),
//    __( 'Test Settings', 'menu-test' ),
//    'manage_options',
//    'testsettings',
//    'mt_settings_page'
//);
//}


?>