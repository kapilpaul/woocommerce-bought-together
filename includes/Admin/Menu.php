<?php
/**
 * Admin Pages Handler
 *
 * @package dc-bought-together
 */

namespace DCoders\BoughtTogether\Admin;

/**
 * Class Menu
 */
class Menu {
	/**
	 * Menu constructor.
	 */
	public function __construct() {
		add_action( 'admin_menu', [ $this, 'admin_menu' ] );
	}

	/**
	 * Register our menu page
	 *
	 * @return void
	 */
	public function admin_menu() {
		$parent_slug = 'dc-bought-together';
		$capability  = 'manage_options';

		$hook = add_menu_page( __( 'WooCommerce Bought Together', 'dc-bought-together' ), __( 'Bought Together', 'dc-bought-together' ), $capability, $parent_slug, [ $this, 'plugin_page' ], 'dashicons-admin-tools' );


		add_action( 'load-' . $hook, [ $this, 'init_hooks' ] );
	}

	/**
	 * Initialize our hooks for the admin page
	 *
	 * @return void
	 */
	public function init_hooks() {
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
	}

	/**
	 * Load scripts and styles for the app
	 *
	 * @return void
	 */
	public function enqueue_scripts() {

	}

	/**
	 * Handles the main page
	 *
	 * @return void
	 */
	public function plugin_page() {
		echo '<div class="wrap">WP Generator is a plugin generator tool for developers.</div>';
	}


}
