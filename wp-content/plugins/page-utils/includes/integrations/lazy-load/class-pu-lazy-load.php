<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * PU_Integrations_Lazy_Load class.
 */
class PU_Integrations_Lazy_Load {

	protected $skip_images_classes;
	protected $skip_pages;
	protected $lazy_placeholder_url;
	protected static $_instance = null;
	protected $settings;

	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->settings = pu_get_settings( '', 'lazy_load' );
		if( isset( $this->settings['enable_lazy_load'] ) && $this->settings['enable_lazy_load'] !== 'enabled' ) return;

		$this->skip_images_classes = ( isset( $this->settings['exclude_lazy_load_images'] ) && $this->settings['exclude_lazy_load_images'] ) ? explode( ',', $this->settings['exclude_lazy_load_images'] ) : array();
		$this->skip_pages = ( isset( $this->settings['exclude_lazy_load_pages'] ) && $this->settings['exclude_lazy_load_pages'] ) ? explode( ',', $this->settings['exclude_lazy_load_pages'] ) : array();
		$this->lazy_placeholder_url = PU()->plugin_url() . '/assets/images/spinner.gif';

		if( isset( $this->settings['enable_lazy_load_images_globally'] ) && $this->settings['enable_lazy_load_images_globally'] == 'enabled' ) { 
			
			add_action( 'wp_enqueue_scripts', array( $this, 'wp_enqueue_scripts' ), 99 );
			//add_filter( 'the_content', array( $this, 'filter_the_content' ), 99 );
			//add_filter( 'do_shortcode_tag', array( $this, 'filter_the_content' ), 99 );
			//add_filter( 'acf_the_content', array( $this, 'filter_the_content' ), 99 );
			add_action( 'wp_head', array( $this, 'before_filter_contents' ), 0 );
			add_action( 'wp_footer', array( $this, 'after_filter_contents' ), 1000 );
			//add_action( 'dynamic_sidebar_before', array( $this, 'sidebar_before_filter_images' ), 0 );
			//add_action( 'dynamic_sidebar_after', array( $this, 'sidebar_after_filter_images' ), 1000 );
			//add_filter( 'post_thumbnail_html', array( $this, 'filter_images' ), 99 );
			//add_filter( 'get_avatar', array( $this, 'filter_images' ), 99 );
		}
	}

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	static public function preg_quote_with_wildcards( $what ){
		// Perform preg_quote, but still allow `.*` to be used in the class list as a wildcard.
		return str_replace( array( '\*', '\.' ), '', preg_quote( $what, '/' ) );
	}

	public function filter_images( $content ) {
		if ( is_admin() ) return $content;
		$ll = self::instance();
		return $ll->filter_content( $content );
	}

	public function filter_the_content( $content ) {
		$ll = self::instance();
		return $ll->filter_content( $content );
	}

	public function before_filter_contents() {
		ob_start();
	}

	public function after_filter_contents() {
		$content = ob_get_clean();
		$ll = self::instance();
		// if settings enabled for BG images
		if( isset( $this->settings['enable_lazy_load_for_bg_images'] ) && $this->settings['enable_lazy_load_for_bg_images'] === 'enabled' ) {
			$content = $ll->filter_bg_contents( $content );
		}
		$content = $ll->filter_content( $content );
		if( isset( $this->settings['enable_lazy_load_for_iframe'] ) && $this->settings['enable_lazy_load_for_iframe'] === 'enabled' ) {
			$content = $ll->preg_replace_html( $content, array('iframe','embed','video','audio') );
		}
		//$content = $ll->preg_replace_html( $content, array('iframe','embed','video','audio') );
		echo $content;
		unset( $content );
	}

	public function wp_enqueue_scripts() {
		wp_enqueue_style( 'pu_lazyloadxt_fadein_css', PU()->plugin_url() . '/assets/css/jquery.lazyloadxt.fadein.css', array(), PU_VERSION );
		if( isset( $this->settings['enable_lazy_load_for_iframe'] ) && $this->settings['enable_lazy_load_for_iframe'] === 'enabled' ) {
			wp_enqueue_script( 'pu_lazyloadxt_js', PU()->plugin_url() . '/assets/js/jquery.lazyloadxt.extra.js', array( 'jquery' ), PU_VERSION, true );
		}else{
			wp_enqueue_script( 'pu_lazyloadxt_js', PU()->plugin_url() . '/assets/js/jquery.lazyloadxt.js', array( 'jquery' ), PU_VERSION, true );
		}
		
		wp_enqueue_script( 'pu_lazyloadxt_bg_js', PU()->plugin_url() . '/assets/js/jquery.lazyloadxt.bg.js', array( 'jquery' ), PU_VERSION, true );
		
		wp_add_inline_script( 'pu_lazyloadxt_js', '( function( $ ) {
			$(window).on("ajaxComplete", function() {
		        setTimeout(function() {
		            $(window).lazyLoadXT();
		        }, 50);
		    });
		} )( jQuery );' );
	}


	protected function filter_content( $content ) {
		global $wp;
		// skip functionalities for excluded pages
		if( $wp->request && $this->skip_pages ) {
			if( in_array( $wp->request, $this->skip_pages ) ) return $content;
		}
		$matches = array();
		preg_match_all( '/<img[\s\r\n]+.*?>/is', $content, $matches );

		$search = array();
		$replace = array();

		if ( is_array( $this->skip_images_classes ) ) {
			$skip_images_preg_quoted = array_map( array( $this, 'preg_quote_with_wildcards' ), $this->skip_images_classes );
			$skip_images_regex = sprintf( '/class=["\'].*(%s).*["\']/s', implode( '|', $skip_images_preg_quoted ) );
		}

		$i = 0;
		foreach ( $matches[0] as $imgHTML ) {

			// don't to the replacement if a skip class is provided and the image has the class, or if the image is a data-uri
			if ( ! ( is_array( $this->skip_images_classes ) && preg_match( $skip_images_regex, $imgHTML ) ) && ! preg_match( "/src=['\"]data:image/is", $imgHTML ) && ! preg_match( "/src=.*lazy_placeholder.gif['\"]/s", $imgHTML ) ) {
				$i++;
				// replace the src and add the data-src attribute
				$replaceHTML = '';
				$replaceHTML = preg_replace( '/<img(.*?)src=/is', '<img$1src="' . $this->lazy_placeholder_url . '" data-lazy-type="image" data-src=', $imgHTML );
				$replaceHTML = preg_replace( '/<img(.*?)srcset=/is', '<img$1srcset="" data-srcset=', $replaceHTML );

				// add the lazy class to the img element
				if ( preg_match( '/class=["\']/i', $replaceHTML ) ) {
					$replaceHTML = preg_replace( '/class=(["\'])(.*?)["\']/is', 'class=$1lazy lazy-hidden $2$1', $replaceHTML );
				} else {
					$replaceHTML = preg_replace( '/<img/is', '<img class="lazy lazy-hidden"', $replaceHTML );
				}

				// if ( $include_noscript ) {
				// 	$replaceHTML .= '<noscript>' . $imgHTML . '</noscript>';
				// }

				array_push( $search, $imgHTML );
				array_push( $replace, $replaceHTML );
			}
		}

		$search = array_unique( $search );
		$replace = array_unique( $replace );

		$content = str_replace( $search, $replace, $content );


		return $content;
	}

	protected function filter_bg_contents( $content ) {
		global $wp;
		// skip functionalities for excluded pages
		if( $wp->request && $this->skip_pages ) {
			if( in_array( $wp->request, $this->skip_pages ) ) return $content;
		}
		$matches = array();
		preg_match_all( '~\bstyle=(\'|")(.*?)background(-image)?\s*:(.*?)\(\s*(\'|")?(?<image>.*?)\3?\s*\);?~i', $content, $matches );

	    if( empty( $matches ) ) return $content;

	    foreach( $matches[0] as $match ){
	        preg_match( '~\bbackground(-image)?\s*:(.*?)\(\s*(\'|")?(?<image>.*?)\3?\s*\);?~i', $match, $bg );              
	        $bg_less_match = str_replace( $bg[0], '', $match );             
	        $data_match = 'data-bg="'.$bg['image'].'" '.$bg_less_match;
	        $content = str_replace( array( $match.';', $match ), array( $data_match, $data_match ), $content );
	    }
	  	return $content;
	}

	protected function preg_replace_html($content,$tags) {
		global $wp;
		// skip functionalities for excluded pages
		if( $wp->request && $this->skip_pages ) {
			if( in_array( $wp->request, $this->skip_pages ) ) return $content;
		}
    	$search = array();
    	$replace = array();

    	$attrs_array = array( 'src','poster' );
    	//if ($this->settings['responsive']) array_push($attrs_array, 'srcset');

    	// Attributes to search for
    	$attrs = implode( '|', $attrs_array );
    	// Elements requiring a 'src' attribute to be valide HTML
    	$src_req = array( 'img', 'video' );

    	// Loop through tags
    	foreach( $tags as $tag ) {
      		// Is the tag self closing?
      		$self_closing = in_array( $tag, array( 'img', 'embed', 'source' ) );
      		// Set tag end, depending of if it's self-closing
      		$tag_end = ( $self_closing ) ? '\/' : '<\/' . $tag;

      		// Look for tag in content
      		preg_match_all( '/<'.$tag.'[\s\r\n]([^<]+)('.$tag_end.'>)(?!<noscript>|<\/noscript>)/is', $content, $matches );

      		// If tags exist, loop through them and replace stuff
      		if ( count( $matches[0] ) ) {
        		foreach ( $matches[0] as $match ) {
          			preg_match( '/[\s\r\n]class=[\'"](.*?)[\'"]/', $match, $classes );
          			// If it has assigned classes, explode them
          			$classes_r = ( array_key_exists( 1, $classes ) ) ? explode( ' ',$classes[1] ) : array();
          			// But first, check that the tag doesn't have any excluded classes
          			if ( count( array_intersect( $classes_r, $this->skip_images_classes ) ) == 0) {
            			// Set the original version for <noscript>
            			$original = $match;
            			// And add it to the $search array.
            			array_push( $search, $original );

          				// If the element requires a 'src', set the src to default image
          				$src = ( in_array( $tag, $src_req ) ) ? ' src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"' : '';
              			// If the element is an audio tag, set the src to a blank mp3
              			//$src = ( $tag == 'audio' ) ? ' src="' . $this->dir.'assets/empty.mp3"' : $src;

              			// Set replace html
              			$replace_markup = $match;
              			// Now replace attr with data-attr
              			$replace_markup = preg_replace( '/[\s\r\n]('.$attrs.')?=/', $src.' data-$1=', $replace_markup );
              			// And add the original in as <noscript>
              			$replace_markup .= '<noscript>'.$original.'</noscript>';
              			// And add it to the $replace array.
              			array_push( $replace, $replace_markup );
            		}
          		}
        	}
      	}

    	// Replace all the $search items with the $replace items
    	$newcontent = str_replace( $search, $replace, $content );
    	return $newcontent;
  	}

}