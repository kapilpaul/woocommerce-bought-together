<?php
/**
 * The API class.
 *
 * @package dc-bought-together
 */

namespace DCoders\BoughtTogether;

/**
 * API Class
 */
class API {

	/**
	 * Initialize the class
	 */
	public function __construct() {
		add_action( 'rest_api_init', [ $this, 'register_api' ] );
	}

	/**
	 * Register the API
	 *
	 * @return void
	 */
	public function register_api() {

	}
}
