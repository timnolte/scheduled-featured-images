<?php
/**
 * Fired during plugin activation.
 *
 * @link       https://www.ndigitals.com/
 * @since      1.0.0
 * @package    NDS\ScheduledFeaturedImages
 * @subpackage NDS\ScheduledFeaturedImages\Common
 * @author     Tim Nolte <tim.nolte@ndigitals.com>
 */

namespace NDS\ScheduledFeaturedImages\Common;

use NDS\ScheduledFeaturedImages\Models\BlogsModel;

/**
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @package    NDS\ScheduledFeaturedImages
 * @subpackage NDS\ScheduledFeaturedImages\Common
 * @author     Tim Nolte <tim.nolte@ndigitals.com>
 */
class Activator {

	/**
	 * Activate the plugin.
	 *
	 * This method handles both single site and network wide activation of the plugin.
	 *
	 * @since    1.0.0
	 *
	 * @param    boolean $network_wide    True if WPMU superadmin uses "Network Activate" action, false if WPMU is disabled or plugin is activated on an individual blog.
	 */
	public static function activate( $network_wide = false ) {

		global $wpdb;

		if ( function_exists( 'is_multisite' ) && is_multisite() ) {
			if ( $network_wide ) {

				// Get all blog ids.
				$blog_ids = ( new BlogsModel() )->get_ids( $wpdb );

				foreach ( $blog_ids as $blog_id ) {
					self::single_activate( $blog_id );
				}

				restore_current_blog();

			} else {
				self::single_activate();
			}
		} else {
			self::single_activate();
		}

	}

	/**
	 * Fired when a new site is activated with a WPMU environment.
	 *
	 * @since    1.0.0
	 *
	 * @param    int $blog_id ID of the new blog.
	 */
	public function activate_new_site( $blog_id ) {

		if ( 1 !== did_action( 'wpmu_new_blog' ) ) {
			return;
		}

		self::single_activate( $blog_id );
		restore_current_blog();

	}

	/**
	 * Fired for each blog when the plugin is activated.
	 *
	 * @since    1.0.0
	 *
	 * @param     int $blog_id    ID of the blog to switch to and activate on.
	 */
	private static function single_activate( $blog_id = null ) {

		// Switch to another blog/site if a blog_id is passed.
		if ( ! empty( $blog_id ) ) {
			switch_to_blog( $blog_id );
		}

		// TODO: Define activation functionality here.
		null;
	}

}
