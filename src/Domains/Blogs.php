<?php
/**
 * The blog(s) specific database functionality of the plugin.
 *
 * @link       https://www.ndigitals.com/
 * @since      1.0.0
 * @package    NDS\ScheduledFeaturedImages
 * @subpackage NDS\ScheduledFeaturedImages\Models
 * @author     Tim Nolte <tim.nolte@ndigitals.com>
 */

namespace NDS\ScheduledFeaturedImages\Models;

/**
 * Blog level database functionalities class.
 *
 * @package    NDS\ScheduledFeaturedImages
 * @subpackage NDS\ScheduledFeaturedImages\Models
 * @author     Tim Nolte <tim.nolte@ndigitals.com>
 */
class BlogsModel {

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since       1.0.0
	 */
	public function __construct() {

		null;

	}

	/**
	 * Get the list of blog ids for network installs.
	 *
	 * @since       1.0.0
	 * @param       \WPDB $wpdb      An instance of the WordPress core wpdb class, except for unit tests this should be the GLOBAL instance.
	 * @return      array       Returns an array of blog ids.
	 */
	public function get_ids( $wpdb = null ) {
		if ( is_null( $wpdb ) ) {
			global $wpdb;
		}

		// The wp_blogs table doesn't exist on a single site instance.
		if ( empty( $wpdb->blogs ) ) {
			return [];
		}

		return $wpdb->get_col(
			$wpdb->prepare(
				"
SELECT blog_id 
FROM {$wpdb->blogs} 
WHERE archived = %d
	AND spam = %d
	AND deleted = %d
",
				0,
				0,
				0
			)
		);
	}

}
