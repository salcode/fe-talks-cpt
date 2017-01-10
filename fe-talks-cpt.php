<?php
/**
 * Plugin Name: Iron Code Talks Custom Post Type
 * Plugin URI: https://github.com/salcode/fe-talks-cpt
 * Description: Create Custom Post Type for Talks
 * Version: 0.1.0
 * Author: Sal Ferrarello
 * Author URI: http://salferrarello.com/
 * Text Domain: fe-talks-cpt
 * Domain Path: /languages
 *
 * @package fe-talks-cpt
 */

if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require __DIR__ . '/vendor/autoload.php';
}

$talks_cpt = new Fe_CPT();
