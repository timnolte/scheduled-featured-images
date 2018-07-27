<?php
/**
 * Fired during plugin deactivation.
 *
 * @link       https://www.ndigitals.com/
 * @since      1.0.0
 * @package    NDS\ScheduledFeaturedImages
 * @subpackage NDS\ScheduledFeaturedImages\Common
 * @author     Tim Nolte <tim.nolte@ndigitals.com>
 */

namespace NDS\ScheduledFeaturedImages\Common;

/**
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @package    NDS\ScheduledFeaturedImages
 * @subpackage NDS\ScheduledFeaturedImages\Common
 * @author     Tim Nolte <tim.nolte@ndigitals.com>
 */
class Deactivator {

	/**
	 * Fired when the plugin is deactivated.
	 *
	 * @since    1.0.0
	 *
	 * @param    boolean $network_wide    True if WPMU superadmin uses "Network Deactivate" action, false if WPMU is disabled or plugin is deactivated on an individual blog.
	 */
	public static function deactivate( $network_wide ) {

		global $wpdb;

		if ( function_exists( 'is_multisite' ) && is_multisite() ) {
			if ( $network_wide ) {

				// Get all blog ids.
				$blog_ids = ( new BlogsModel() )->get_ids( $wpdb );

				foreach ( $blog_ids as $blog_id ) {
					self::single_deactivate( $blog_id );
				}

				restore_current_blog();

			} else {
				self::single_deactivate();
			}
		} else {
			self::single_deactivate();
		}
	}

	/**
	 * Fired for each blog when the plugin is deactivated.
	 *
	 * @since    1.0.0
	 *
	 * @param     int $blog_id    ID of the blog to switch to and activate on.
	 */
	private static function single_deactivate( $blog_id = null ) {

		// Switch to another blog/site if a blog_id is passed.
		if ( ! empty( $blog_id ) ) {
			switch_to_blog( $blog_id );
		}

		// TODO: Define deactivation functionality here.
		null;
	}

}
