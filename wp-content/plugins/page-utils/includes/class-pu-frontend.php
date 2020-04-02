<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * PU_Frontend class.
 */
class PU_Frontend {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'wp_enqueue_scripts' ), 99 );
		// Add custom styles of plugins
		add_action( 'wp_head', array( $this, 'add_custom_styles' ) );
		if( pu_get_settings( 'webp_supports' ) == 'enabled' )
			add_action( 'wp_head', array( $this, 'add_webp_scripts_supports' ), 99 );
		// Meta in the html head section
		add_action( 'wp_head', array( $this, 'wp_head_href_lang' ) );
		// Add shortcode supports in title
		//add_filter( 'the_title', array( $this, 'shortcode_supports_in_title' ), 99 );
		//add_filter( 'document_title_parts', array( $this, 'shortcode_supports_in_title' ), 99 );
		add_filter( 'the_title', 'do_shortcode' );
		add_filter( 'single_post_title', 'do_shortcode' );
		//add_filter( 'wp_title_parts', array( $this, 'shortcode_supports_in_title' ) );
		// add styling for star shortcode
		add_action( 'pu_wp_head_add_scripts', array( $this, 'add_star_shortcode_styles' ) );
		if( pu_get_settings( 'override_ga_id' ) == 'enabled' ) {
			add_action( 'wp_head', array( $this, 'override_ga_scripts' ) );
			add_filter( 'maxfreebets_header_ga_scripts', '__return_false' );
		}
	}

	public function shortcode_supports_in_title( $title ) {
		//return do_shortcode( $title );
	}

	public function wp_enqueue_scripts() {
		wp_enqueue_style( 'page_utils_css', PU()->plugin_url() . '/assets/css/page_utils.css', array(), PU_VERSION );
	}

	public function add_custom_styles() {
		?>
		<style type="text/css">
			<?php echo pu_get_settings( 'custom_css' ); ?>
			<?php do_action( 'pu_wp_head_add_scripts' ); ?>
		</style>
		<?php
	}

	public function add_star_shortcode_styles() {
		if( pu_get_settings( 'star_rating_star_size', 'star_rating' ) == 'enabled' ) {
			$icon_font_size = '100%';
			$int_font_size = '80%';
		} else {
			$icon_font_size = '20px';
			$int_font_size = '13px';
		}
		$star_color = ( pu_get_settings( 'star_rating_star_color', 'star_rating' ) ) ? pu_get_settings( 'star_rating_star_color', 'star_rating' ) : '#FCAE00';
		$css = '.shortcode-star-rating{padding:0 0.5em;}.dashicons{font-size:'.$icon_font_size.';width:auto;height:auto;line-height:normal;text-decoration:inherit;vertical-align:middle;}.shortcode-star-rating [class^="dashicons dashicons-star-"]:before{color:'.$star_color.';}.ssr-int{margin-left:0.2em;font-size:'.$int_font_size.';vertical-align:middle;color:#333;}';
		echo $css;
	}

	/**
	 * Outputs hreflang link in the html head section
	 *
	 */
	public function wp_head_href_lang() {
		global $post;
		// Don't output anything on paged archives: see https://wordpress.org/support/topic/hreflang-on-page2
		// Don't output anything on paged pages and paged posts
		if ( is_paged() || ( is_singular() && ( $page = get_query_var( 'page' ) ) && $page > 1 ) ) {
			return;
		}

		$supported_content_types = hreflang_tags_get_settings('hreflang_tags_content_types');
		$supported_post_types = isset($supported_content_types['post_type']) ? $supported_content_types['post_type'] : array();
		$supported_taxonomy = isset($supported_content_types['taxonomy']) ? $supported_content_types['taxonomy'] : array();
		$supported_lang_code_only = hreflang_tags_get_settings('supported_lang_code_only');
		//$translations = wp_get_available_translations();

		$hreflang_attributes = array();

		if ( is_category() || is_tax() || is_tag() ) {
			$term = get_queried_object();
			if( $term && in_array( $term->taxonomy, $supported_taxonomy ) ){
				$supported_term_slugs = get_term_meta( $term->term_id, 'hreflang_tags_supported_taxonomy_slug', true );
				$enabled_trailingslashit = get_term_meta( $term->term_id, 'hreflang_enabled_trailingslashit', true );
				if( $supported_term_slugs ){
					foreach ( $supported_term_slugs as $lang => $slug ) {
						$url = get_all_supported_lang_base_url($lang);
						if( !$slug ) continue;
						$url .= trailingslashit($slug);
						//$translation = $translations[$lang];
						if(in_array($lang, $supported_lang_code_only)){
							$lang_code = pu_get_lang_locale( $lang );
							$hreflang = ( $lang_code ) ? $lang_code : str_replace( '_', '-', $lang );
						}else{
							$hreflang = str_replace( '_', '-', $lang );
						}
						$hreflang_attributes[$hreflang] = ( $enabled_trailingslashit == 'yes' ) ? trailingslashit($url) : untrailingslashit($url);
					}
				}
			}
		}elseif((is_front_page() || is_home() ) && $post && in_array( $post->post_type, $supported_post_types ) ) {
			$supported_post_slugs = get_post_meta( $post->ID, 'hreflang_tags_supported_post_slug', true );
			$enabled_trailingslashit = get_post_meta( $post->ID, 'hreflang_enabled_trailingslashit', true );
			if( $supported_post_slugs ){
				foreach ( $supported_post_slugs as $lang => $slug ) {
					$url = get_all_supported_lang_base_url($lang);
					
					//$translation = $translations[$lang];
					if(in_array($lang, $supported_lang_code_only)){
						$lang_code = pu_get_lang_locale( $lang );
						$hreflang = ( $lang_code ) ? $lang_code : str_replace( '_', '-', $lang );
					}else{
						$hreflang = str_replace( '_', '-', $lang );
					}
					$hreflang_attributes[$hreflang] = ( $enabled_trailingslashit == 'yes' ) ? trailingslashit($url) : untrailingslashit($url);
				}
			}
		}elseif( $post && in_array( $post->post_type, $supported_post_types ) ) {
			$supported_post_slugs = get_post_meta( $post->ID, 'hreflang_tags_supported_post_slug', true );
			$enabled_trailingslashit = get_post_meta( $post->ID, 'hreflang_enabled_trailingslashit', true );
			if( $supported_post_slugs ){
				foreach ( $supported_post_slugs as $lang => $slug ) {
					$url = get_all_supported_lang_base_url($lang);
					if( !$slug ) continue;
					$url .= trailingslashit($slug);
					//$translation = $translations[$lang];
					if(in_array($lang, $supported_lang_code_only)){
						$lang_code = pu_get_lang_locale( $lang );
						$hreflang = ( $lang_code ) ? $lang_code : str_replace( '_', '-', $lang );
					}else{
						$hreflang = str_replace( '_', '-', $lang );
					}
					$hreflang_attributes[$hreflang] = ( $enabled_trailingslashit == 'yes' ) ? trailingslashit($url) : untrailingslashit($url);
				}
			}
		}

		$hreflangs = apply_filters( 'pu_rel_hreflang_attributes', $hreflang_attributes );
		if( $hreflangs ) {
			foreach ( $hreflangs as $lang => $url ) {
				printf( '<link rel="alternate" id="page-utils-lang-%s" href="%s" hreflang="%s" />' . "\n", esc_attr( $lang ), esc_url( $url ), esc_attr( $lang ) );
			}
			if( !check_has_default_hreflang_site_url() || hreflang_tags_get_settings('enable_x_default') == 'enabled' ) {
				// for x-default
				$lang = 'x-default';
				$default_domain = trailingslashit(hreflang_tags_get_settings('default_domain_x_default'));
				$current_page_url = '';
				$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
				$current_page_url = ($default_domain) ? $default_domain : $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
				printf( '<link rel="alternate" id="page-utils-lang-%s" href="%s" hreflang="%s" />' . "\n", esc_attr( $lang ), esc_url( $current_page_url ), esc_attr( $lang ) );
			}
			
		}
		
	}

	/**
	 * Override GA scripts.
	 */
	public function override_ga_scripts() {
		$cas_ga_id = get_option( 'google_analytics_id' );
		$ga_id = ( $cas_ga_id ) ? $cas_ga_id : pu_get_settings( 'pu_ga_id' );
		$ga_type = ( pu_get_settings( 'load_ga_type' ) ) ? pu_get_settings( 'load_ga_type' ) : 'new_ga';
		if( $ga_id && $ga_type == 'new_ga' ) {
		?>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $ga_id; ?>"></script>
		<script>
		  	window.dataLayer = window.dataLayer || [];
		  	function gtag(){dataLayer.push(arguments);}
		  	gtag('js', new Date());

		  	gtag('config', '<?php echo $ga_id; ?>');
		</script>
		<!-- End Google Analytics -->
		<?php 
		} else { ?>
		<!-- Tracking Code -->
		<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		ga('create', '<?php echo $ga_id; ?>', 'auto');
		ga('set', 'transport', 'xhr');
		ga('send', 'pageview');
		</script>
		<!-- End Google Analytics -->
		<?php }
	}

}

return new PU_Frontend();