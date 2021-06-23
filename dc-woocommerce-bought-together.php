<?php
/**
 * Plugin Name: DC WooCommerce Bought Together
 * Plugin URI: https://kapilpaul.me
 * Description: WooCommerce Bought Together plugin is the best choice for implementing this feature into your website.
 * Version: 1.0.0
 * Author: Kapil Paul
 * Author URI: https://kapilpaul.me
 * License: GPLv2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: dc-bought-together
 * Domain Path: /languages
 *
 * @package dc-bought-together
 */

/**
 * Copyright (c) 2021 Kapil Paul (email: kapilpaul007@gmail.com). All rights reserved.
 *
 * Released under the GPL license
 * http://www.opensource.org/licenses/gpl-license.php
 *
 * This is an add-on for WordPress
 * http://wordpress.org/
 *
 * **********************************************************************
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 * **********************************************************************
 */

// don't call the file directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once __DIR__ . '/vendor/autoload.php';

use DCoders\BoughtTogether\DCBoughtTogether;

/**
 * Initialize the main plugin
 *
 * @return DCBoughtTogether|bool
 */
function dc_bought_together() {
	return DCBoughtTogether::init();
}

/**
 * Kick-off the plugin.
 */
dc_bought_together();
