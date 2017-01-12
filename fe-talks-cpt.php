<?php
/**
 * Plugin Name: Iron Code Talks Custom Post Type
 * Plugin URI: https://github.com/salcode/fe-talks-cpt
 * Description: Create Custom Post Type for Talks. Requires PHP 7.0+
 * Version: 0.1.0
 * Author: Sal Ferrarello
 * Author URI: http://salferrarello.com/
 * Text Domain: fe-talks-cpt
 * Domain Path: /languages
 *
 * @package fe-talks-cpt
 */
namespace IronCode\TalksCpt;

use \IronCode\Fe_Cpt\Cpt;

if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require __DIR__ . '/vendor/autoload.php';
}

add_action( 'init', function() {
	// Parameters are: $post_type, $plural, $singular, $rewrite, (optional) $args
	$talks_cpt = new Cpt( 'fe_talk', 'Talks', 'Talk', 'talks' );

	try {
		$talks_cpt->register();
	} catch ( \Exception $e ) {
		error_log( 'Plugin "Iron Code Talks Custom Post Type" Failed to create CPT: WP Error ' . $e->getMessage() );
	}
});
