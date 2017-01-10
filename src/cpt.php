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

	protected $post_type;
	protected $args;

	public function __construct( string $post_type, array $args = [] ) {
		$this->set_post_type( $post_type );
		$this->args = $args;
	}

	private function set_post_type( string $post_type ) {
		if ( '' === $post_type ) {
			throw new \InvalidArgumentException( 'Cpt parameter $post_type must be a non-empty string' );
		}

		if ( false === strpos( $post_type, '_' ) ) {
			trigger_error( 'Cpt parameter $post_type should be prefixed with letters and an underscore to avoid collisions. See https://salferrarello.com/cpt-best-practices/#prefix-post-type' );
		}

		$this->post_type = $post_type;
	}

	/**
	 * Register post type.
	 *
	 * Call WordPress native function register_post_type().
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
