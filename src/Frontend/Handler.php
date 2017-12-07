<?php
/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @link       https://www.ndigitals.com/
 * @since      1.0.0
 * @package    NDS\ScheduledFeaturedImages
 * @subpackage NDS\ScheduledFeaturedImages\Frontend
 * @author     Tim Nolte <tim.nolte@ndigitals.com>
 */

namespace NDS\ScheduledFeaturedImages\Frontend;

/**
 * Class that handles all of the public-facing functionality of the plugin.
 *
 * @package    NDS\ScheduledFeaturedImages
 * @subpackage NDS\ScheduledFeaturedImages\Frontend
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
	 * The plugin public frontend views base URI.
	 *
	 * @since       1.0.0
	 * @access  protected
	 * @var         string          $admin_assets_uri       The plugin public frontend views base URI.
	 */
	protected $views_uri = 'src/views/frontend/';

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
	 * Register the stylesheets for the public-facing side of the site.
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
	 * Register the JavaScript for the public-facing side of the site.
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
