<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * PU_Admin_Settings class.
 */
class PU_Admin_Settings {

	/**
	 * FAQ settings options.
	 *
	 * @var array
	 */
	public $options = array();

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->options = get_option( 'pu_settings_options' );
		add_action( 'admin_init', array( $this, 'settings_page_init' ) );
	}

	/**
     * Register and add settings
     */
    public function settings_page_init() {        
        register_setting(
            'pu_settings_option_group', // Option group
            'pu_settings_options', // Option name
            array( $this, 'sanitize_settings' ) // Sanitize
        );

        add_settings_section(
            'pu_general_settings', // ID
            __( 'General', 'page-utils' ), // Title
            array( $this, 'pu_general_settings_section_info' ), // Callback
            'pu-settings-admin' // Page
        );  

        add_settings_field(
            'custom_css', // ID
            __( 'Custom CSS', 'page-utils' ), // Title 
            array( $this, 'custom_css_field_callback' ), // Callback
            'pu-settings-admin', // Page
            'pu_general_settings' // Section           
        );  

        add_settings_field(
            'override_ga_id', // ID
            __( 'Override GA ID', 'page-utils' ), // Title 
            array( $this, 'override_ga_id_field_callback' ), // Callback
            'pu-settings-admin', // Page
            'pu_general_settings' // Section           
        ); 

        add_settings_field(
            'pu_ga_id', // ID
            __( 'Add GA ID', 'page-utils' ), // Title 
            array( $this, 'pu_ga_id_field_callback' ), // Callback
            'pu-settings-admin', // Page
            'pu_general_settings' // Section           
        ); 

        add_settings_field(
            'load_ga_type', // ID
            __( 'Load GA types', 'page-utils' ), // Title 
            array( $this, 'load_ga_type_field_callback' ), // Callback
            'pu-settings-admin', // Page
            'pu_general_settings' // Section           
        ); 

        add_settings_field(
            'exclude_current_post_sitemap', // ID
            __( 'Exclude current page / post', 'page-utils' ), // Title 
            array( $this, 'exclude_current_post_sitemap_field_callback' ), // Callback
            'pu-settings-admin', // Page
            'pu_general_settings' // Section           
        );

        // shortcodes docs
        add_settings_field(
            'pu_shortcodes_docs', // ID
            __( '', 'page-utils' ), // Title 
            array( $this, 'pu_shortcodes_docs_callback' ), // Callback
            'pu-settings-admin', // Page
            'pu_general_settings' // Section           
        );         
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize_settings( $input ) {
        $new_input = array();
        if( isset( $input['custom_css'] ) )
            $new_input['custom_css'] = $input['custom_css'];
        if( isset( $input['override_ga_id'] ) )
            $new_input['override_ga_id'] = $input['override_ga_id'];
        if( isset( $input['pu_ga_id'] ) )
            $new_input['pu_ga_id'] = $input['pu_ga_id'];
        if( isset( $input['load_ga_type'] ) )
            $new_input['load_ga_type'] = $input['load_ga_type'];
        if( isset( $input['exclude_current_post_sitemap'] ) )
            $new_input['exclude_current_post_sitemap'] = $input['exclude_current_post_sitemap'];

        return $new_input;
    }

    /** 
     * Print the Section text
     */
    public function pu_general_settings_section_info() {
        print __( 'Enter your settings below:', 'page-utils' );
    }

    /** 
     * Get settings fields
     */
    public function custom_css_field_callback() {
        printf(
            '<textarea id="custom_css" name="pu_settings_options[custom_css]" rows="12" class="large-text">%s</textarea><p class="description">%s</p>',
            isset( $this->options['custom_css'] ) ? $this->options['custom_css'] : '',
            __('In this field, you can write your custom CSS code for shortcodes.', 'page-utils')
        );
    }

    /** 
     * Get settings fields
     */
    public function override_ga_id_field_callback() {
    	$override_ga_id = isset( $this->options['override_ga_id'] ) ? $this->options['override_ga_id'] : '';
        printf(
            "<input name='pu_settings_options[override_ga_id]' type='checkbox' id='override_ga_id' value='enabled' %s /><p class='description'>%s</p>",
            checked( 'enabled', $override_ga_id, false ),
            __('Enable to override google analytics script by CAS/PU', 'page-utils')
        );
    }

    /** 
     * Get settings fields
     */
    public function pu_ga_id_field_callback() {
        $pu_ga_id = isset( $this->options['pu_ga_id'] ) ? $this->options['pu_ga_id'] : '';
        printf(
            "<input name='pu_settings_options[pu_ga_id]' type='text' id='pu_ga_id' value='%s' />",
            $pu_ga_id
        );
    }

    /** 
     * Get settings fields
     */
    public function load_ga_type_field_callback() {
        $load_ga_type = isset( $this->options['load_ga_type'] ) ? $this->options['load_ga_type'] : 'new_ga';
        
        echo "<label><input name='pu_settings_options[load_ga_type]' type='radio' class='load_ga_type' value='old_ga' ".checked( 'old_ga', $load_ga_type, false )." />".__('Old GA', 'page-utils')."</label><br>";
        echo "<label><input name='pu_settings_options[load_ga_type]' type='radio' class='load_ga_type' value='new_ga' ".checked( 'new_ga', $load_ga_type, false )." />".__('New GA', 'page-utils')."</label>";
    }

    /** 
     * Get settings fields
     */
    public function exclude_current_post_sitemap_field_callback() {
        $exclude_current_post_sitemap = isset( $this->options['exclude_current_post_sitemap'] ) ? $this->options['exclude_current_post_sitemap'] : '';
        echo '<select name="pu_settings_options[exclude_current_post_sitemap]">';
        echo '<option value="enabled" '.selected( 'enabled', $exclude_current_post_sitemap, false ) .'>'. __( 'Enabled', 'page-utils' ).'</option>';
        echo '<option value="disabled" '.selected( 'disabled', $exclude_current_post_sitemap, false ) .'>'. __( 'Disabled', 'page-utils' ).'</option>';
        echo '</select>';
        printf(
            "<p class='description'>%s</p>",
            __( 'Exclude current page / post from [simple_sitemap]', 'page-utils' )
        );
    }


    /** 
     * Get PU shortcodes documentations
     */
    public function pu_shortcodes_docs_callback() {
    	?>
        <hr/>
    	<h4 class="title"><?php _e( 'Shortcode - [faq]', 'page-utils' ); ?></h4>
		<table class="widefat striped" style="width:auto">
			<thead>
				<tr>
					<td><?php esc_html_e( 'Attributes', 'page-utils' ); ?></td>
					<td><?php esc_html_e( 'Values', 'page-utils' ); ?></td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><code contenteditable>id</code></td>
					<td><?php esc_html_e( 'The id of a FAQ', 'page-utils' ); ?></td>
				</tr>
				<tr>
					<td><code contenteditable>order</code></td>
					<td><?php esc_html_e( 'FAQ ordering is ascending (ASC) or descending (DESC). Defaults to ASC', 'page-utils' ); ?></td>
				</tr>
			</tbody>
		</table>
        <h4 class="title"><?php _e( 'Shortcode - [current_date]', 'page-utils' ); ?></h4>
        <table class="widefat striped" style="width:auto">
            <thead>
                <tr>
                    <td><?php esc_html_e( 'Attributes', 'page-utils' ); ?></td>
                    <td><?php esc_html_e( 'Values', 'page-utils' ); ?></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><code contenteditable>format</code></td>
                    <td><?php esc_html_e( 'Add valid date format to show date.', 'page-utils' ); ?></td>
                </tr>
            </tbody>
        </table>
        <h4 class="title"><?php _e( 'Shortcode - [simple_sitemap]', 'page-utils' ); ?></h4>
        <table class="widefat striped" style="width:auto">
            <thead>
                <tr>
                    <td><?php esc_html_e( 'Attributes', 'page-utils' ); ?></td>
                    <td><?php esc_html_e( 'Values', 'page-utils' ); ?></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><code contenteditable>post_types</code></td>
                    <td><?php esc_html_e( 'Add multiple post types comma separated. Default: page', 'page-utils' ); ?></td>
                </tr>
                <tr>
                    <td><code contenteditable>orderby</code></td>
                    <td><?php esc_html_e( 'Add orderby value for posts. Default: name', 'page-utils' ); ?></td>
                </tr>
                <tr>
                    <td><code contenteditable>orderby</code></td>
                    <td><?php esc_html_e( 'Add order value for posts. Default: ASC', 'page-utils' ); ?></td>
                </tr>
                <tr>
                    <td><code contenteditable>exclude</code></td>
                    <td><?php esc_html_e( 'Add post/page ids comma separated to exclude', 'page-utils' ); ?></td>
                </tr>
                <tr>
                    <td><code contenteditable>links</code></td>
                    <td><?php esc_html_e( 'Enable or disable posts link. Default: true', 'page-utils' ); ?></td>
                </tr>
                <tr>
                    <td><code contenteditable>links_target</code></td>
                    <td><?php esc_html_e( 'Add links target. Default: _blank ( opened in new page )', 'page-utils' ); ?></td>
                </tr>
                <tr>
                    <td><code contenteditable>wrapper_tag</code></td>
                    <td><?php esc_html_e( 'Add wrapper tag, only tag name. Default: ul', 'page-utils' ); ?></td>
                </tr>
                <tr>
                    <td><code contenteditable>types_tag</code></td>
                    <td><?php esc_html_e( 'Add types heading tag, only tag name. Default: h3', 'page-utils' ); ?></td>
                </tr>
                <tr>
                    <td><code contenteditable>item_tag</code></td>
                    <td><?php esc_html_e( 'Add item tag, only tag name. Default: li', 'page-utils' ); ?></td>
                </tr>
            </tbody>
        </table>
        <h4 class="title"><?php _e( 'Shortcode - [star]', 'page-utils' ); ?></h4>
        <table class="widefat striped" style="width:auto">
            <thead>
                <tr>
                    <td><?php esc_html_e( 'Attributes', 'page-utils' ); ?></td>
                    <td><?php esc_html_e( 'Values', 'page-utils' ); ?></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><code contenteditable>rating</code></td>
                    <td><?php esc_html_e( 'Add star rating value. Default: 0', 'page-utils' ); ?></td>
                </tr>
                <tr>
                    <td><code contenteditable>type</code></td>
                    <td><?php esc_html_e( 'Type of start shortcode. Default: rating', 'page-utils' ); ?></td>
                </tr>
                <tr>
                    <td><code contenteditable>max</code></td>
                    <td><?php esc_html_e( 'Add maximum star rating value. Default: 5', 'page-utils' ); ?></td>
                </tr>
                <tr>
                    <td><code contenteditable>numeric</code></td>
                    <td><?php esc_html_e( 'Rating will be numeric or not. Default: no', 'page-utils' ); ?></td>
                </tr>
            </tbody>
        </table>
    	<?php
    }

}
return new PU_Admin_Settings();