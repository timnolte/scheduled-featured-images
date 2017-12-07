<?php
/**
 * Define the internationalization functionality.
 *
 * @link       https://www.ndigitals.com/
 * @since      1.0.0
 * @package    NDS\ScheduledFeaturedImages
 * @subpackage NDS\ScheduledFeaturedImages\Common
 * @author     Tim Nolte <tim.nolte@ndigitals.com>
 */

namespace NDS\ScheduledFeaturedImages\Common;

/**
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @package    NDS\ScheduledFeaturedImages
 * @subpackage NDS\ScheduledFeaturedImages\Common
 * @author     Tim Nolte <tim.nolte@ndigitals.com>
 */
class I18n {

	/**
	 * Instance of the NDS\ScheduledFeaturedImages\Core class.
	 *
	 * @var     NDS\ScheduledFeaturedImages\Core
	 */
	protected static $plugin = null;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param    string $plugin     An instance of the Core plugin class.
	 */
	public function __construct( $plugin ) {

		if ( null == self::$plugin ) {
			self::$plugin = $plugin;
		}

	}

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		$locale = apply_filters( 'plugin_locale', get_locale(), self::$plugin->get_plugin_name() );

		load_plugin_textdomain(
			self::$plugin->get_plugin_name(),
			false,
			self::$plugin->get_plugin_path() . 'languages/'
		);

	}

}
