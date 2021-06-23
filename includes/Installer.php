<?php
/**
 * The Installer class.
 * Install all dependency from here while activating the plugin.
 *
 * @package dc-bought-together
 */

namespace DCoders\BoughtTogether;

/**
 * Class Installer
 */
class Installer {
	/**
	 * Run the installer
	 *
	 * @return void
	 */
	public function run() {
		$this->add_version();
	}

	/**
	 * Add time and version on DB
	 *
	 * @return void
	 */
	public function add_version() {
		$installed = get_option( 'dc_bought_together_installed' );

		if ( ! $installed ) {
			update_option( 'dc_bought_together_installed', time() );
		}

		update_option( 'dc_bought_together_version', DC_BOUGHT_TOGETHER_VERSION );
	}
}
