<?php
/**
 * DCBoughtTogether class
 *
 * @package dc-bought-together
 */

namespace DCoders\BoughtTogether;

/**
 * DCBoughtTogether class
 *
 * @class DCBoughtTogether The class that holds the entire DCBoughtTogether plugin
 */
final class DCBoughtTogether {

	/**
	 * Plugin version
	 *
	 * @var string
	 */
	const VERSION = '1.0.0';

	/**
	 * Holds various class instances
	 *
	 * @var array
	 */
	private $container = [];

	/**
	 * Constructor for the DCBoughtTogether class
	 *
	 * Sets up all the appropriate hooks and actions
	 * within our plugin.
	 */
	private function __construct() {
		$this->define_constants();

		register_activation_hook( __FILE__, [ $this, 'activate' ] );
		register_deactivation_hook( __FILE__, [ $this, 'deactivate' ] );

		add_action( 'plugins_loaded', [ $this, 'init_plugin' ] );
	}

	/**
	 * Initializes the DCBoughtTogether() class
	 *
	 * Checks for an existing DCBoughtTogether() instance
	 * and if it doesn't find one, creates it.
	 *
	 * @return DCBoughtTogether|bool
	 */
	public static function init() {
		static $instance = false;

		if ( ! $instance ) {
			$instance = new DCBoughtTogether();
		}

		return $instance;
	}

	/**
	 * Magic getter to bypass referencing plugin.
	 *
	 * @param string $prop Prop name.
	 *
	 * @return mixed
	 */
	public function __get( $prop ) {
		if ( array_key_exists( $prop, $this->container ) ) {
			return $this->container[ $prop ];
		}

		return $this->{$prop};
	}

	/**
	 * Magic isset to bypass referencing plugin.
	 *
	 * @param string $prop Prop name.
	 *
	 * @return mixed
	 */
	public function __isset( $prop ) {
		return isset( $this->{$prop} ) || isset( $this->container[ $prop ] );
	}

	/**
	 * Define the constants
	 *
	 * @return void
	 */
	public function define_constants() {
		define( 'DC_BOUGHT_TOGETHER_VERSION', self::VERSION );
		define( 'DC_BOUGHT_TOGETHER_FILE', __FILE__ );
		define( 'DC_BOUGHT_TOGETHER_PATH', dirname( DC_BOUGHT_TOGETHER_FILE ) );
		define( 'DC_BOUGHT_TOGETHER_INCLUDES', DC_BOUGHT_TOGETHER_PATH . '/includes' );
		define( 'DC_BOUGHT_TOGETHER_URL', plugins_url( '', DC_BOUGHT_TOGETHER_FILE ) );
		define( 'DC_BOUGHT_TOGETHER_ASSETS', DC_BOUGHT_TOGETHER_URL . '/assets' );
	}

	/**
	 * Load the plugin after all plugins are loaded
	 *
	 * @return void
	 */
	public function init_plugin() {
		$this->includes();
		$this->init_hooks();
	}

	/**
	 * Placeholder for activation function
	 *
	 * Nothing being called here yet.
	 */
	public function activate() {
		$installer = new Installer();
		$installer->run();
	}

	/**
	 * Placeholder for deactivation function
	 *
	 * Nothing being called here yet.
	 */
	public function deactivate() {

	}

	/**
	 * Include the required files
	 *
	 * @return void
	 */
	public function includes() {
		if ( $this->is_request( 'admin' ) ) {
			$this->container['admin'] = new Admin();
		}

		if ( $this->is_request( 'frontend' ) ) {
			$this->container['frontend'] = new Frontend();
		}
	}

	/**
	 * Initialize the hooks
	 *
	 * @return void
	 */
	public function init_hooks() {
		/**
		 * Actions.
		 */
		add_action( 'init', [ $this, 'init_classes' ] );

		// Localize our plugin.
		add_action( 'init', [ $this, 'localization_setup' ] );

		/**
		 * Filters.
		 */
		add_filter( 'plugin_action_links_dc-woocommerce-bought-together/dc-woocommerce-bought-together.php', [ $this, 'plugin_action_links' ] );
	}

	/**
	 * Instantiate the required classes
	 *
	 * @return void
	 */
	public function init_classes() {
		$this->container['api']    = new Api();
		$this->container['assets'] = new Assets();
	}

	/**
	 * Initialize plugin for localization
	 *
	 * @uses load_plugin_textdomain()
	 */
	public function localization_setup() {
		load_plugin_textdomain( 'dc-bought-together', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}

	/**
	 * What type of request is this?
	 *
	 * @param string $type admin, ajax, cron or frontend.
	 *
	 * @return bool
	 */
	private function is_request( $type ) {
		switch ( $type ) {
			case 'admin':
				return is_admin();

			case 'ajax':
				return defined( 'DOING_AJAX' );

			case 'rest':
				return defined( 'REST_REQUEST' );

			case 'cron':
				return defined( 'DOING_CRON' );

			case 'frontend':
				return ( ! is_admin() || defined( 'DOING_AJAX' ) ) && ! defined( 'DOING_CRON' );
		}

		return false;
	}

	/**
	 * Check WooCommerce is exists or not.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	public function has_woocommerce() {
		return class_exists( 'WooCommerce' );
	}

	/**
	 * Plugin action links.
	 *
	 * @param array $links Bunch of links.
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	public function plugin_action_links( $links ) {
		array_unshift( $links, '<a href="' . admin_url( 'admin.php?page=dc-bought-together' ) . '">' . __( 'Settings', 'dc-bought-together' ) . '</a>' );

		return $links;
	}
}
