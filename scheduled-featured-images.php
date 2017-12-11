<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.ndigitals.com/
 * @since             1.0.0
 * @package           NDS\ScheduledFeaturedImages
 *
 * @wordpress-plugin
 * Plugin Name:       Scheduled Featured Images
 * Plugin URI:        https://www.ndigitals.com/wordpress/plugins/scheduled-featured-images-plugin/
 * Description:       Scheduled Featured Images allows you to attach multiple images to any post-type and set them to be the featured image based on a schedule.
 * Version:           1.0.0
 * Author:            Tim Nolte
 * Author URI:        https://www.timnolte.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       scheduled-featured-images
 * Domain Path:       /languages
 */

namespace NDS\ScheduledFeaturedImages;

// If this file is called directly, abort.
defined( 'WPINC' ) || exit;

// Due to namespace usage and composer package requirements we require PHP >= 5.5.0.
if ( ! defined( 'PHP_VERSION' ) || ! function_exists( 'version_compare' ) || version_compare( PHP_VERSION, '5.5.0', '<' ) ) {

	// When plugin is used via the WP-CLI print out the text instead of expecting the WordPress Dashboard to be present.
	if ( defined( 'WP_CLI' ) ) {

		WP_CLI::warning( _sfi_php_version_text() );

	} else {

		// Add Dashboard admin notice for plugin PHP version check failure.
		add_action( 'admin_notices', '_sfi_php_version_error' );

	}

} else {

	if ( ! defined( 'NDS_SFI_PLUGIN_FILE' ) ) {

		define( 'NDS_SFI_PLUGIN_FILE', __FILE__ );

	}

	// Check for and load the PSR-4 autoloader, built by Composer.
	if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {

		require_once( __DIR__ . '/vendor/autoload.php' );

	}

	// Startup the plugin to register hooks.
	_sfi_init();

}

/**
 * Admin notice for incompatible versions of PHP.
 * 
 * @since		1.0.0
 */
function _sfi_php_version_error() {

	printf( '<div class="error"><p>%s</p></div>', esc_html( _sfi_php_version_text() ) );

}

/**
 * String describing the minimum PHP version.
 *
 * @since		1.0.0
 * @return 	string 	The localized PHP version requirement message text.
 */
function _sfi_php_version_text() {

	return __( 'Scheduled Featured Images plugin error: Your version of PHP is too old to run this plugin. You must be running PHP 5.5 or higher.', 'scheduled-featured-images' );

}

/**
 * Intializes the main plugin global instance.
 * 
 * @since		1.0.0
 * @return	NDS\ScheduledFeaturedImages\Plugin	$plugin		The single NDS\ScheduledFeaturedImages\Plugin instance.
 */
function _sfi_init() {

	$plugin = Plugin::get_instance( __FILE__ );
	$plugin->init();

	return $plugin;

}
