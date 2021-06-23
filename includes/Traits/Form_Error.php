<?php
/**
 * Trait
 *
 * @package dc-bought-together
 */

namespace DCoders\BoughtTogether\Traits;

/**
 * Error handler trait
 */
trait Form_Error {

	/**
	 * Holds the errors
	 *
	 * @var array
	 */
	public $errors = [];

	/**
	 * Check if the form has error.
	 *
	 * @param string $key Key of the input.
	 *
	 * @return boolean
	 */
	public function has_error( $key ) {
		return isset( $this->errors[ $key ] ) ? true : false;
	}

	/**
	 * Get the error by key
	 *
	 * @param string $key Key of the input.
	 *
	 * @return string | false
	 */
	public function get_error( $key ) {
		if ( isset( $this->errors[ $key ] ) ) {
			return $this->errors[ $key ];
		}

		return false;
	}
}
