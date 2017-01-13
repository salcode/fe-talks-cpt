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

class CptLabels {

	// Array.
	private $labels = [];


	/**
	 * Labels constructor.
	 *
	 * @param string $plural   Plural form of CPT label.
	 * @param string $singular Singular form of CPT label.
	 * @param array  $labels   Label array values to be used.
	 */
	public function __construct( string $plural, string $singular, array $labels = [] ) {
		if ( '' === $plural ) {   throw new \InvalidArgumentException( 'Labels parameter $plural must be a non-empty string' ); }
		if ( '' === $singular ) { throw new \InvalidArgumentException( 'Labels parameter $singular must be a non-empty string' ); }

		$this->plural   = $plural;
		$this->singular = $singular;
		$this->labels   = $labels;
	}

	/**
	 * Populate the labels array.
	 *
	 * Populate any missing values from the labels array.
	 */
	private function populate() {
		$this->labels = array_merge( [
			'name'               => $this->plural,
			'singular_name'      => $this->singular,
			'menu_name'          => $this->plural,
			'name_admin_bar'     => $this->singular,
			'add_new'            => 'Add New',
			'add_new_item'       => 'Add New ' . $this->singular,
			'new_item'           => 'New ' . $this->singular,
			'edit_item'          => 'Edit ' . $this->singular,
			'view_item'          => 'View ' . $this->singular,
			'all_item'           => 'All ' . $this->plural,
			'search_items'       => 'Search ' . $this->plural,
			'parent_item_colon'  => 'Parent ' . $this->plural . ':',
			'not_found'          => 'No ' . $this->plural . ' found',
			'not_found_in_trash' => 'No ' . $this->plural . ' found in trash.',
		], $this->labels );
	}

	/**
	 * Output labels array.
	 *
	 * @return array Suitable array for use in a WordPress register_post_type call.
	 */
	public function to_array() {
		$this->populate();
		return $this->labels;
	}
}
