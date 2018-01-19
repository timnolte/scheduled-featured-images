<?php
/**
 * The standard Domain interface that incorporates much of the
 * database functionality of the plugin.
 *
 * @link       https://www.ndigitals.com/
 * @since      1.0.0
 * @package    NDS\ScheduledFeaturedImages
 * @subpackage NDS\ScheduledFeaturedImages\Domains
 * @author     Tim Nolte <tim.nolte@ndigitals.com>
 */

namespace NDS\ScheduledFeaturedImages\Domains;

/**
 * A standard Domain Interface.
 *
 * @package    NDS\ScheduledFeaturedImages
 * @subpackage NDS\ScheduledFeaturedImages\Domains
 * @author     Tim Nolte <tim.nolte@ndigitals.com>
 */
interface DomainInterface {

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 */
	public function __construct();

}
