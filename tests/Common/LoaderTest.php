<?php
/**
 * Class LoaderTest
 *
 * @package NDS\ScheduledFeaturedImages
 * @subpackage NDS\ScheduledFeaturedImages\Tests
 */

namespace NDS\ScheduledFeaturedImages\Common;

use PHPUnit\Framework\TestCase;
use WP_UnitTestCase;
use NDS\ScheduledFeaturedImages;

/**
 * Loader test case.
 */
class LoaderTest extends WP_UnitTestCase {

	/**
	 * Test case setup method.
	 */
	public function setUp() {

		parent::setUp();

		$this->loader = new Loader( ScheduledFeaturedImages\Plugin::get_instance( NDS_SFI_PLUGIN_FILE ) );

	}

	/**
	 * Test case cleanup method.
	 */
	public function tearDown() {

		parent::tearDown();

		$this->loader = null;

	}

	/**
	 * Test plugin loader.
	 */
	public function testLoaderIsValidInstance() {

		$this->assertInstanceOf( Loader::class, $this->loader) ;

	}

}
