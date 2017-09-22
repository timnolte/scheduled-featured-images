<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.timnolte.com/
 * @since      1.0.0
 *
 * @package    Nds_Wp_Scheduled_Featured_Images
 * @subpackage Nds_Wp_Scheduled_Featured_Images/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Nds_Wp_Scheduled_Featured_Images
 * @subpackage Nds_Wp_Scheduled_Featured_Images/admin
 * @author     Tim Nolte <tim.nolte@ndigitals.com>
 */
class Nds_Wp_Scheduled_Featured_Images_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Nds_Wp_Scheduled_Featured_Images_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Nds_Wp_Scheduled_Featured_Images_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/nds-wp-scheduled-featured-images-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Nds_Wp_Scheduled_Featured_Images_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Nds_Wp_Scheduled_Featured_Images_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/nds-wp-scheduled-featured-images-admin.js', array( 'jquery' ), $this->version, false );

	}

}
