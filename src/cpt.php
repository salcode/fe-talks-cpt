<?php
/**
 * WordPress Custom Post Type class
 *
 * @package   IronCode\Fe_Cpt
 * @author    Sal Ferrarello
 * @copyright 2017 Iron Code Studio
 * @license   MIT License
 */

namespace IronCode\Fe_Cpt;

class Cpt {


	/**
	 * String
	 */
	protected $rewrite_slug;

	/**
	 * array
	 * Array of args for defining Custom Post Type settings.
	 */
	protected $args;

	/**
	 * Cpt constructor.
	 *
	 * @param string $post_type The post type of this custom post type.
	 * @param array  $args      Array of args for defining Custom Post Type settings.
	 */
	public function __construct( string $post_type, array $args ) {
		$this->set_post_type( $post_type );
		$this->args = $args;
	}

	/**
	 * Set post_type
	 *
	 * @param string $post_type The slug for registering the post type.
	 * @throws InvalidArgumentException When the post_type is an empty string.
	 * @throws A warning when the post_type does not have an underscore (_) (e.g. not prefixed)
	 */
	public function set_post_type( $post_type ) {
		if ( '' === $post_type ) { throw new \InvalidArgumentException( 'Cpt argument $post_type must not be an empty string.' ); }

		if ( false === strpos( $post_type, '_' ) ) {
			// Throw Error Notice if the post_type is NOT prefixed.
			trigger_error( 'Cpt property $post_type should be prefixed with letters and an underscore to avoid collisions. See https://salferrarello.com/cpt-best-practices/#prefix-post-type' );
		}
		$this->post_type = $post_type;
	}

	/**
	 * Register post type.
	 *
	 * Call WordPress native function register_post_type().
	 *
	 * @throws Exception When the post type fails to register.
	 */
	public function register() {
		$result = register_post_type( $this->post_type, $this->args );
		if ( is_wp_error( $result ) ) {
			throw new \Exception(
				$result->get_error_code() . ' ' .
				$result->get_error_message()
			);
		}
	}
}
