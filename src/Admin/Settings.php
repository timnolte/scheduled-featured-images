<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @link       https://www.ndigitals.com/
 * @since      1.0.0
 * @package    NDS\ScheduledFeaturedImages
 * @subpackage NDS\ScheduledFeaturedImages\Admin
 * @author     Tim Nolte <tim.nolte@ndigitals.com>
 */

namespace NDS\ScheduledFeaturedImages\Admin;

/**
 * Plugin administrative functionalities class.
 *
 * @package    NDS\ScheduledFeaturedImages
 * @subpackage NDS\ScheduledFeaturedImages\Admin
 * @author     Tim Nolte <tim.nolte@ndigitals.com>
 */
class Settings {

	/**
	 * Instance of the NDS\ScheduledFeaturedImages\Admin\Handler class.
	 *
	 * @var     NDS\ScheduledFeaturedImages\Admin\Handler
	 */
	protected static $plugin_admin = null;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param    string $plugin_admin     An instance of the plugin NDS\ScheduledFeaturedImages\Admin\Handler class.
	 */
	public function __construct( $plugin_admin ) {

		if ( null == self::$plugin_admin ) {
			self::$plugin_admin = $plugin_admin;
		}

	}

}
