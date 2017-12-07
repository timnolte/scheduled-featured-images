<?php
/**
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @link       https://www.ndigitals.com/
 * @since      1.0.0
 * @package    NDS\ScheduledFeaturedImages
 * @author     Tim Nolte <tim.nolte@ndigitals.com>
 */

namespace NDS\ScheduledFeaturedImages;

use NDS\ScheduledFeaturedImages\Common;
use NDS\ScheduledFeaturedImages\Admin;
use NDS\ScheduledFeaturedImages\Frontend;


/**
 * The main Plugin class.
 *
 * @package    NDS\ScheduledFeaturedImages
 * @author     Tim Nolte <tim.nolte@ndigitals.com>
 */
class Plugin {

	/**
	 * Instance of the class.
	 *
	 * @var			NDS\ScheduledFeaturedImages\Plugin
	 */
	protected static $instance = null;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    NAME    The string used to uniquely identify this plugin.
	 */
	const NAME = 'scheduled-featured-images';

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string         VERSION      The current version of the plugin.
	 */
	const VERSION = '1.0.0';

	/**
	 * The plugin system path.
	 *
	 * @since       1.0.0
	 * @access  protected
	 * @var         string          $plugin_path        The plugin system path.
	 */
	protected $plugin_path;

	/**
	 * The plugin base directory.
	 *
	 * @since       1.0.0
	 * @access  protected
	 * @var         string          $plugin_dir     The plugin base directory.
	 */
	protected $plugin_dir;

	/**
	 * The plugin URL.
	 *
	 * @since       1.0.0
	 * @access  protected
	 * @var         string          $plugin_url     The plugin URL.
	 */
	protected $plugin_url;

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      NDS\ScheduledFeaturedImages\Common\Loader      $loader     Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * Initialize the core functionality of the plugin.
	 *
	 * Set the plugin paths and URL that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct( ) {

		$this->plugin_path = trailingslashit( Common\Util::dirname_r( __FILE__, 2 ) );
		$this->plugin_dir = basename( $this->plugin_path );
		$this->plugin_url = trailingslashit( str_replace( array( 'http:', 'https:' ), '', plugin_dir_url( $this->plugin_dir ) ) ) . trailingslashit( self::NAME );

		$this->define_constants();
		$this->load_dependencies( new Common\Loader( $this ) );
		$this->set_locale( new Common\I18n( $this ) );
		$this->define_admin_hooks( new Admin\Handler( $this ) );
		$this->define_frontend_hooks( new Frontend\Handler( $this ) );

	}

	/**
	 * Define the GLOBAL constants for this plugin.
	 *
	 * All plugin GLOBAL constants should be controlled by the main Plugin class.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_constants() {

		if ( ! defined( 'NDS_SFI_VERSION' ) ) {
			define( 'NDS_SFI_VERSION', self::VERSION );
		}

		if ( ! defined( 'NDS_SFI_PATH' ) ) {
			define( 'NDS_SFI_PATH', $this->plugin_path );
		}

		if ( ! defined( 'NDS_SFI_DIR' ) ) {
			define( 'NDS_SFI_DIR', $this->plugin_dir );
		}

		if ( ! defined( 'NDS_SFI_URL' ) ) {
			define( 'NDS_SFI_URL', $this->plugin_url );
		}

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Create an instance of the NDS\ScheduledFeaturedImages\Common\Loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies( $loader ) {

		$this->loader = $loader;

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the NDS\ScheduledFeaturedImages\Common\I18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @param		 Common\I18n	$plugin_i18n		Instance of the NDS\ScheduledFeaturedImages\Common\I18n class that manages translation hooks.
	 */
	private function set_locale( $plugin_i18n ) {

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @param		 Admin\Handler	$plugin_admin		Instance of the NDS\ScheduledFeaturedImages\Admin\Handler class that manages admin-related hooks.
	 */
	private function define_admin_hooks( $plugin_admin ) {

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @param		 Frontend\Handler	$plugin_frontend		Instance of the NDS\ScheduledFeaturedImages\Frontend\Handler class that manages public-facing related hooks.
	 */
	private function define_frontend_hooks( $plugin_frontend ) {

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_frontend, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_frontend, 'enqueue_scripts' );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {

		$this->loader->run();

	}

	/**
	 * Gets instance of class.
	 *
	 * @return      NDS\ScheduledFeaturedImages\Plugin        Instance of the class.
	 */
	public static function get_instance() {

		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;

	}

	/**
	 * The base directory of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The base directory of the plugin.
	 */
	public function get_plugin_dir() {

		return $this->plugin_dir;

	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {

		return self::NAME;

	}

	/**
	 * The directory path of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The directory path of the plugin.
	 */
	public function get_plugin_path() {

		return $this->plugin_path;

	}

	/**
	 * The URL of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The URL of the plugin.
	 */
	public function get_plugin_url() {

		return $this->plugin_url;

	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {

		return self::VERSION;

	}

}
