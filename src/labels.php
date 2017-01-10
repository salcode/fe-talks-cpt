<?php
/**
 * WordPress Custom Post Type Labels class
 *
 * Generates the labels array for a custom post type.
 *
 * @package   IronCode\Fe_Cpt
 * @author    Sal Ferrarello
 * @copyright 2017 Iron Code Studio
 * @license   MIT License
 */

namespace IronCode\Fe_Cpt;

class Labels {

	// Array.
	private $labels = [];


	/**
	 * Labels constructor.
	 *
	 * @param string $plural Plural form of CPT label.
	 */
	public function __construct( string $plural ) {
		if ( '' === $plural ) {
			throw new \InvalidArgumentException( 'Labels parameter $plural must be a non-empty string' );
		}
		$this->labels['name'] = $plural;
	}

	/*
	 * Render the labels array.
	 *
	 * Populate any missing values from the labels array.
	 */
	public function render() {
		// Populate missing values.
	}

	/**
	 * Output labels array.
	 *
	 * @return array Suitable array for use in a WordPress register_post_type call.
	 */
	public function to_array() {
		$this->render();
		return $this->labels;
	}
}
