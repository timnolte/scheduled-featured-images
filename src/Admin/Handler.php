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
class Handler {

	/**
	 * Instance of the NDS\ScheduledFeaturedImages\Plugin class.
	 *
	 * @var     NDS\ScheduledFeaturedImages\Plugin
	 */
	protected static $plugin = null;

	/**
	 * The plugin admin views base URI.
	 *
	 * @since       1.0.0
	 * @access  protected
	 * @var         string          $admin_assets_uri       The plugin admin views base URI.
	 */
	protected $views_uri = 'src/views/admin/';

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param    string $plugin     An instance of the plugin NDS\ScheduledFeaturedImages\Plugin class.
	 */
	public function __construct( $plugin ) {

		if ( null == self::$plugin ) {
			self::$plugin = $plugin;
		}

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style(
			self::$plugin->get_plugin_name(),
			self::$plugin->get_plugin_url() . $this->views_uri . 'css/styles.min.css',
			array(),
			self::$plugin->get_plugin_version(),
			'all'
		);

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script(
			self::$plugin->get_plugin_name(),
			self::$plugin->get_plugin_url() . $this->views_uri . 'js/scripts.min.js',
			array( 'jquery' ),
			self::$plugin->get_plugin_version(),
			false
		);

	}

}
