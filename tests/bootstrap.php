<?php
/**
 * PHPUnit bootstrap file
 *
 * @package NDS\ScheduledFeaturedImages
 */

// if ( !defined( 'WP_DEBUG_DISPLAY' ) ) {
// 	define( 'WP_DEBUG_DISPLAY', false );
// } else {
// 	$GLOBAL['WP_DEBUG_DISPLAY'] = false;
// }
// if ( !defined( 'WP_DEBUG_LOG' ) ) {
// 	define( 'WP_DEBUG_LOG', true );
// } else {
// 	$GLOBAL['WP_DEBUG_LOG'] = true;
// }

/**
 * Check for and load the PSR-4 autoloader, built by Composer.
 */
if ( file_exists( dirname( __DIR__ ) . '/vendor/autoload.php' ) ) {
	require_once( dirname( __DIR__ ) . '/vendor/autoload.php' );
}

$_tests_dir = getenv( 'WP_TESTS_DIR' );
if ( ! $_tests_dir ) {
	$_tests_dir = '/tmp/wordpress-tests-lib';
}

// Give access to tests_add_filter() function.
require_once $_tests_dir . '/includes/functions.php';

/**
 * Manually load the plugin being tested.
 */
function _manually_load_plugin() {
	require dirname( dirname( __FILE__ ) ) . '/scheduled-featured-images.php';
}
tests_add_filter( 'muplugins_loaded', '_manually_load_plugin' );

// Start up the WP testing environment.
require $_tests_dir . '/includes/bootstrap.php';
