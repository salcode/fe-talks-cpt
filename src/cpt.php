<?php
/**
 * WordPress Custom Post Type class
 *
 * @package   IronCode\Fe_Cpt
 * @author    Sal Ferrarello
 * @copyright 2016 Iron Code Studio
 * @license   MIT License
 */

namespace IronCode\Fe_Cpt;

class Cpt {

	protected $post_type;
	protected $args;

	public function __construct( string $post_type, array $args = [] ) {

		if ( '' === $post_type ) {
			throw new InvalidArgumentException( __( 'Cpt parameter $post_type must be a non-empty string', 'fe-cpt' ) );
		}

		if ( false === strpos( $post_type, '_' ) ) {
			trigger_error( __( 'Cpt parameter $post_type should be prefixed with letters and an underscore to avoid collisions. See https://salferrarello.com/cpt-best-practices/#prefix-post-type', 'fe-cpt' ) );
		}

		$this->post_type = $post_type;
		$this->args = $args;
	}

	public function register() {
	}
}
