<?php
/**
 * The admin class.
 *
 * @package dc-bought-together
 */

namespace DCoders\BoughtTogether;

/**
 * The admin class.
 */
class Admin {

	/**
	 * Initialize the class
	 */
	public function __construct() {
		$this->dispatch_actions();
		new Admin\Menu();
	}

	/**
	 * Dispatch and bind actions
	 *
	 * @return void
	 */
	public function dispatch_actions() {

	}

}
