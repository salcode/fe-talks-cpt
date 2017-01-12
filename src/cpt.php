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
	protected $plural;
	protected $singular;
	protected $rewrite_slug;
	protected $args;

	/**
	 * Cpt constructor.
	 *
	 * @param string $post_type    The post type of this custom post type.
	 * @param string $plural       The plural form for the label.
	 * @param string $singular     The singular form for the label.
	 * @param string $rewrite_slug The URL rewrite slug.
	 * @param array  $args         Arguments for defining this custom post type.
	 *                                 These are NOT overwritten by the generated values.
	 */
	public function __construct(
		string $post_type,
		string $plural,
		string $singular,
		string $rewrite_slug,
		array $args = []
	) {
		$this->validate_string_property( 'post_type',     $post_type );
		$this->validate_string_property( 'plural',        $plural );
		$this->validate_string_property( 'singular',      $singular );
		$this->validate_string_property( 'rewrite_slug',  $rewrite_slug );

		$this->post_type    = $post_type;
		$this->plural       = $plural;
		$this->singular     = $singular;
		$this->rewrite_slug = $rewrite_slug;

		$this->args = $args;
	}

	/**
	 * Validate string property.
	 *
	 * Current confirms the string is NOT empty.
	 * @param  string $property_name The name of property.
	 * @param  string $value         The value for the property.
	 * @throws InvalidArgumentException
	 * @throws Error_Notice
	 */
	private function validate_string_property( string $variable_name, string $value ) {
		if ( '' === $value ) {
			throw new \InvalidArgumentException( 'Cpt property ' . $variable_name . ' must be a non-empty string' );
		}

		if ( 'post_type' === $variable_name && false === strpos( $value, '_' ) ) {
			// Throw Error Notice if the post_type is NOT prefixed.
			trigger_error( 'Cpt property $post_type should be prefixed with letters and an underscore to avoid collisions. See https://salferrarello.com/cpt-best-practices/#prefix-post-type' );
		}
	}

	/**
	 * Populate args
	 *
	 * Populate unset args, while keeping existing args if they exist.
	 *
	 * @return array $this->args The arguments for the register_post_type() call.
	 */
	public function populate_args() {
		$this->args['public'] = true;
		$this->args['label'] = $this->plural;
		return $this->args;
	}

	/**
	 * Register post type.
	 *
	 * Call WordPress native function register_post_type().
	 *
	 * @throws Exception When the post type fails to register.
	 */
	public function register() {
		$result = register_post_type( $this->post_type, $this->populate_args() );
		if ( is_wp_error( $result ) ) {
			throw new \Exception(
				$result->get_error_code() . ' ' .
				$result->get_error_message()
			);
		}
	}
}
