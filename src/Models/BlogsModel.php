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
	 * return       array       Returns an array of blog ids. When not a multi-site install returns an empty array.
	 */
	public function get_blog_ids() {
		global $wpdb;

		if ( count( $wpdb->blogs ) === 0 ) {
			return [];
		}

		return $wpdb->get_col( "SELECT blog_id FROM {$wpdb->blogs}" );
	}

}
