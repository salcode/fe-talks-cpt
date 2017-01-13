<?php
/**
 * WordPress Custom Post Type Args class
 *
 * @package   IronCode\Fe_Cpt
 * @author    Sal Ferrarello
 * @copyright 2017 Iron Code Studio
 * @license   MIT License
 */

namespace IronCode\Fe_Cpt;

class CptArgs {

	protected $rewrite_slug;
	protected $labels;
	protected $args;

	/**
	 * Cpt constructor.
	 *
	 * @param string $rewrite_slug The URL rewrite slug (optional)
	 * @param array  $labels       Array of labels for populating labels arg of Cpt.
	 * @param array  $args         Arguments for defining this custom post type.
	 *                                 These are NOT overwritten by the generated values.
	 *                                 (optional)
	 */
	public function __construct(
		string $rewrite_slug = '',
		array $labels,
		array $args = []
	) {
		$this->set_rewrite_slug( $rewrite_slug );
		$this->labels = $labels;
		$this->args = $args;
	}

	/**
	 * Set the rewrite slug
	 *
	 * Check for an empty string.
	 */
	private function set_rewrite_slug( string $rewrite_slug ) {
		if ( '' === $rewrite_slug ) {
			throw new \InvalidArgumentException( 'CptArgs constructor failed due to an invalid argument' );
		}
		$this->rewrite_slug = $rewrite_slug;
	}

	/**
	 * Populate the args array.
	 *
	 * Populate any missing values from the args array.
	 */
	private function populate() {
		// Merge any existing values with default values. Existing values take preference.
		// We merge 'rewrite' and 'labels' prior to merging the full array since they are arrays themselves.
		$rewrite = array_merge(
			[
				'slug'       => $this->rewrite_slug,
				'with_front' => false,
			],
			( $this->args['rewrite'] ?? [] )
		);

		// Merge any existing values with default values. Existing values take preference.
		$labels = array_merge(
			$this->labels,
			( $this->args['labels'] ?? [] )
		);

		$this->args = array_merge(
			[
				'public'      => true,
				'has_archive' => true,
			], // defaults
			$this->args
		);

		$this->args['rewrite'] = $rewrite;
		$this->args['labels']  = $labels;
	}

	/**
	 * Return an array which works as the second parameter of register_post_type().
	 *
	 * @return array $this->args The arguments for the register_post_type() call.
	 */
	public function to_array() {
		$this->populate();
		return $this->args;
	}
}
