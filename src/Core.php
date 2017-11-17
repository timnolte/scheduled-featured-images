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
 * The core plugin class.
 *
 * @package    NDS\ScheduledFeaturedImages
 * @author     Tim Nolte <tim.nolte@ndigitals.com>
 */
class Core {

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version = '1.0.0';

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name = 'scheduled-featured-images';

	/**
	 * The plugin system path.
	 *
	 * @since           1.0.0
	 * @access      protected
	 * @var             string      $plugin_path        The plugin system path.
	 */
	protected $plugin_path;

	/**
	 * The plugin base directory.
	 *
	 * @since           1.0.0
	 * @access      protected
	 * @var             string      $plugin_dir     The plugin base directory.
	 */
	protected $plugin_dir;

	/**
	 * The plugin URL.
	 *
	 * @since           1.0.0
	 * @access      protected
	 * @var             string      $plugin_url     The plugin URL.
	 */
	protected $plugin_url;

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Scheduled_Featured_Images_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'NDS_SFI_VERSION' ) ) {
			$this->version = NDS_SFI_VERSION;
		}
		if ( defined( 'NDS_SFI_PATH' ) ) {
			$this->plugin_path = NDS_SFI_PATH;
		} else {
			$this->plugin_path = trailingslashit( Common\Util::dirname_r( __FILE__, 2 ) );
		}
		if ( defined( 'NDS_SFI_DIR' ) ) {
			$this->plugin_dir = NDS_SFI_DIR;
		} else {
			$this->plugin_dir = basename( $this->plugin_path );
		}
		if ( defined( 'NDS_SFI_URL' ) ) {
			$this->plugin_url = NDS_SFI_URL;
		} else {
			$this->plugin_url = trailingslashit( str_replace( array( 'http:', 'https:' ), '', plugin_dir_url( $this->plugin_dir ) ) ) . trailingslashit( $this->plugin_name );
		}

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Scheduled_Featured_Images_Loader. Orchestrates the hooks of the plugin.
	 * - Scheduled_Featured_Images_I18n. Defines internationalization functionality.
	 * - Scheduled_Featured_Images_Admin. Defines all hooks for the admin area.
	 * - Scheduled_Featured_Images_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		$this->loader = new Common\Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Scheduled_Featured_Images_I18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Common\I18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Admin\Loader( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Frontend\Loader( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

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
		return $this->plugin_name;
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
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Scheduled_Featured_Images_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
