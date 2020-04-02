<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * PU_Lazy_Load_Admin_Settings class.
 */
class PU_Lazy_Load_Admin_Settings {

	/**
	 * Lazy Load settings options.
	 *
	 * @var array
	 */
	public $options = array();

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->options = get_option( 'lazy_load_settings_options' );
		add_action( 'admin_init', array( $this, 'settings_page_init' ) );
	}

	/**
     * Register and add settings
     */
    public function settings_page_init() {        
        register_setting(
            'lazy_load_settings_option_group', // Option group
            'lazy_load_settings_options', // Option name
            array( $this, 'sanitize_settings' ) // Sanitize
        );

        add_settings_section(
            'lazy_load_general_settings', // ID
            __( 'General', 'page-utils' ), // Title
            array( $this, 'lazy_load_general_settings_section_info' ), // Callback
            'lazy_load-settings-admin' // Page
        );  

        add_settings_field(
            'enable_lazy_load', // ID
            __( 'Enable lazy load', 'page-utils' ), // Title 
            array( $this, 'enable_lazy_load_field_callback' ), // Callback
            'lazy_load-settings-admin', // Page
            'lazy_load_general_settings' // Section           
        );  
        add_settings_field(
            'enable_lazy_load_images_globally', // ID
            __( 'Enable lazy load images globally', 'page-utils' ), // Title 
            array( $this, 'enable_lazy_load_images_globally_field_callback' ), // Callback
            'lazy_load-settings-admin', // Page
            'lazy_load_general_settings' // Section           
        ); 
        add_settings_field(
            'exclude_lazy_load_images', // ID
            __( 'Disable lazy load for images', 'page-utils' ), // Title 
            array( $this, 'exclude_lazy_load_images_field_callback' ), // Callback
            'lazy_load-settings-admin', // Page
            'lazy_load_general_settings' // Section           
        ); 
        add_settings_field(
            'enable_lazy_load_for_bg_images', // ID
            __( 'Enable lazy load for BG images', 'page-utils' ), // Title 
            array( $this, 'enable_lazy_load_for_bg_images_field_callback' ), // Callback
            'lazy_load-settings-admin', // Page
            'lazy_load_general_settings' // Section           
        );
        add_settings_field(
            'enable_lazy_load_for_iframe', // ID
            __( 'Enable lazy load for iframe', 'page-utils' ), // Title 
            array( $this, 'enable_lazy_load_for_iframe_field_callback' ), // Callback
            'lazy_load-settings-admin', // Page
            'lazy_load_general_settings' // Section           
        );
        add_settings_field(
            'exclude_lazy_load_pages', // ID
            __( 'Disable lazy load for pages', 'page-utils' ), // Title 
            array( $this, 'exclude_lazy_load_pages_field_callback' ), // Callback
            'lazy_load-settings-admin', // Page
            'lazy_load_general_settings' // Section           
        );
    
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize_settings( $input ) {
        $new_input = array();

        if( isset( $input['enable_lazy_load'] ) )
            $new_input['enable_lazy_load'] = $input['enable_lazy_load'];
        if( isset( $input['enable_lazy_load_images_globally'] ) )
            $new_input['enable_lazy_load_images_globally'] = $input['enable_lazy_load_images_globally'];
        if( isset( $input['exclude_lazy_load_images'] ) )
            $new_input['exclude_lazy_load_images'] = $input['exclude_lazy_load_images'];
        if( isset( $input['enable_lazy_load_for_bg_images'] ) )
            $new_input['enable_lazy_load_for_bg_images'] = $input['enable_lazy_load_for_bg_images'];
        if( isset( $input['enable_lazy_load_for_iframe'] ) )
            $new_input['enable_lazy_load_for_iframe'] = $input['enable_lazy_load_for_iframe'];
        if( isset( $input['exclude_lazy_load_pages'] ) && $input['exclude_lazy_load_pages'] ){
            $excluded_pages = explode( ',', $input['exclude_lazy_load_pages'] );
            $excluded_pages_data = array();
            if( is_array( $excluded_pages ) ){
                foreach ( $excluded_pages as $slug ) {
                    $slug = ltrim( $slug, '/' );
                    $slug = rtrim( $slug, '/' );
                    $excluded_pages_data[] = $slug;
                }
            }
            $new_input['exclude_lazy_load_pages'] = implode( ',', $excluded_pages_data );
        }

        return $new_input;
    }

    /** 
     * Print the Section text
     */
    public function lazy_load_general_settings_section_info() {
        echo "";
    }

    /** 
     * Get settings fields
     */
    public function enable_lazy_load_field_callback() {
        $enable_lazy_load = isset( $this->options['enable_lazy_load'] ) ? $this->options['enable_lazy_load'] : '';
        printf(
            "<input name='lazy_load_settings_options[enable_lazy_load]' type='checkbox' id='enable_lazy_load' value='enabled' %s /><p class='description'>%s</p>",
            checked( 'enabled', $enable_lazy_load, false ),
            __('Allow lazyload for your site.', 'page-utils')
        );
    }

    /** 
     * Get settings fields
     */
    public function enable_lazy_load_images_globally_field_callback() {
        $enable_lazy_load_images_globally = isset( $this->options['enable_lazy_load_images_globally'] ) ? $this->options['enable_lazy_load_images_globally'] : '';
        printf(
            "<input name='lazy_load_settings_options[enable_lazy_load_images_globally]' type='checkbox' id='enable_lazy_load_images_globally' value='enabled' %s /><p class='description'>%s</p>",
            checked( 'enabled', $enable_lazy_load_images_globally, false ),
            __('Allow lazyload globally for all images on your site.', 'page-utils')
        );
    }

    /** 
     * Get settings fields
     */
    public function exclude_lazy_load_images_field_callback() {
        $exclude_lazy_load_images = isset( $this->options['exclude_lazy_load_images'] ) ? $this->options['exclude_lazy_load_images'] : '';
        printf(
            "<input name='lazy_load_settings_options[exclude_lazy_load_images]' class='regular-text' type='text' id='exclude_lazy_load_images' value='%s' /><p class='description'>%s</p>",
            $exclude_lazy_load_images,
            __( 'Add comma separated image classes that exclude lazy loading', 'page-utils' )
        );
    }

    /** 
     * Get settings fields
     */
    public function enable_lazy_load_for_bg_images_field_callback() {
        $enable_lazy_load_for_bg_images = isset( $this->options['enable_lazy_load_for_bg_images'] ) ? $this->options['enable_lazy_load_for_bg_images'] : '';
        printf(
            "<input name='lazy_load_settings_options[enable_lazy_load_for_bg_images]' type='checkbox' id='enable_lazy_load_for_bg_images' value='enabled' %s /><p class='description'>%s</p>",
            checked( 'enabled', $enable_lazy_load_for_bg_images, false ),
            __('Allow lazyload for all background images added via styles on your site.', 'page-utils')
        );
    }

    /** 
     * Get settings fields
     */
    public function enable_lazy_load_for_iframe_field_callback() {
        $enable_lazy_load_for_iframe = isset( $this->options['enable_lazy_load_for_iframe'] ) ? $this->options['enable_lazy_load_for_iframe'] : '';
        printf(
            "<input name='lazy_load_settings_options[enable_lazy_load_for_iframe]' type='checkbox' id='enable_lazy_load_for_iframe' value='enabled' %s /><p class='description'>%s</p>",
            checked( 'enabled', $enable_lazy_load_for_iframe, false ),
            __('Allow lazyload for iframe on your site.', 'page-utils')
        );
    }

    /** 
     * Get settings fields
     */
    public function exclude_lazy_load_pages_field_callback() {
        $exclude_lazy_load_pages = isset( $this->options['exclude_lazy_load_pages'] ) ? $this->options['exclude_lazy_load_pages'] : '';
        printf(
            "<input name='lazy_load_settings_options[exclude_lazy_load_pages]' class='regular-text' type='text' id='exclude_lazy_load_pages' value='%s' /><p class='description'>%s</p>",
            $exclude_lazy_load_pages,
            __( 'Add comma separated pages slugs that exclude lazy loading', 'page-utils' )
        );
    }

}
return new PU_Lazy_Load_Admin_Settings();