<?php

defined( 'ABSPATH' ) || exit;

/**
 * Integrations class.
 */
class PU_Integrations {

	/**
	 * Array of integrations.
	 *
	 * @var array
	 */
	public $integrations = array();

	/**
	 * Initialize integrations.
	 */
	public function __construct() {

		do_action( 'pu_integrations_init' );

		include_once PU_INTEGRATIONS_PATH . 'gdpr-cookie/class-pu-gdpr-cookie.php';
		include_once PU_INTEGRATIONS_PATH . 'lazy-load/class-pu-lazy-load.php';

		$load_integrations = apply_filters( 'pu_integrations', array(
			'gdpr_cookie' => 'PU_Integrations_GDPR_Cookie',
			'lazy_load' => 'PU_Integrations_Lazy_Load',
		) );
		// Load integration classes.
		if( !$this->integrations ) :
			foreach ( $load_integrations as $id => $integration ) {
				//if( $this->integrations && array_key_exists( $id, $this->integrations ) ) continue;
				$load_integration = new $integration();
				$this->integrations[ $id ] = $load_integration;
			}
		endif;
		//print_r($this->integrations);
	}

	/**
	 * Return loaded integrations.
	 *
	 * @return array
	 */
	public function get_integrations() {
		return $this->integrations;
	}
}
