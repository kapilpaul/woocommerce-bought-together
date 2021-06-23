<?php
/**
 * The assets class.
 * Enqueue all files from here
 *
 * @package dc-bought-together
 */

namespace DCoders\BoughtTogether;

/**
 * Scripts and Styles Class
 */
class Assets {
	/**
	 * Assets constructor.
	 */
	public function __construct() {
		if ( is_admin() ) {
			add_action( 'admin_enqueue_scripts', [ $this, 'register' ], 5 );
		} else {
			add_action( 'wp_enqueue_scripts', [ $this, 'register' ], 5 );
		}
	}

	/**
	 * Register our app scripts and styles
	 *
	 * @return void
	 */
	public function register() {
		$this->register_scripts( $this->get_scripts() );
		$this->register_styles( $this->get_styles() );
	}

	/**
	 * Register scripts.
	 *
	 * @param array $scripts All scripts details.
	 *
	 * @return void
	 */
	private function register_scripts( $scripts ) {
		foreach ( $scripts as $handle => $script ) {
			$deps      = isset( $script['deps'] ) ? $script['deps'] : false;
			$in_footer = isset( $script['in_footer'] ) ? $script['in_footer'] : false;
			$version   = isset( $script['version'] ) ? $script['version'] : DC_BOUGHT_TOGETHER_VERSION;

			wp_register_script( $handle, $script['src'], $deps, $version, $in_footer );
		}
	}

	/**
	 * Register styles.
	 *
	 * @param array $styles All styles details.
	 *
	 * @return void
	 */
	public function register_styles( $styles ) {
		foreach ( $styles as $handle => $style ) {
			$deps = isset( $style['deps'] ) ? $style['deps'] : false;

			wp_register_style( $handle, $style['src'], $deps, DC_BOUGHT_TOGETHER_VERSION );
		}
	}

	/**
	 * Get all registered scripts.
	 *
	 * @return array
	 */
	public function get_scripts() {
		$plugin_js_assets_path = DC_BOUGHT_TOGETHER_ASSETS . '/js/';

		$scripts = [];

		return $scripts;
	}

	/**
	 * Get registered styles
	 *
	 * @return array
	 */
	public function get_styles() {
		$plugin_css_assets_path = DC_BOUGHT_TOGETHER_ASSETS . '/css/';

		$styles = [];

		return $styles;
	}
}
