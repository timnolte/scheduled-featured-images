<?php
/**
 * Class DeactivatorTest
 *
 * @package NDS\ScheduledFeaturedImages
 * @subpackage NDS\ScheduledFeaturedImages\Tests\Common
 */

namespace NDS\ScheduledFeaturedImages\Common;

use PHPUnit\Framework\TestCase;
use Mockery;
use WP_UnitTestCase;
use NDS\ScheduledFeaturedImages;

/**
 * Deactivator test case.
 */
class DeactivatorTest extends WP_UnitTestCase {

	/**
	 * Test case setup method.
	 */
	public function setUp() {

		parent::setUp();

		$this->deactivator = new Deactivator();

	}

	/**
	 * Test case cleanup method.
	 */
	public function tearDown() {

		$this->deactivator = null;

		parent::tearDown();

	}

	/**
	 * A single example test.
	 *
	 * @group DeactivatorTests
	 */
	function testPluginDeactivatedState() {
		// Replace this with some actual testing code.
		$this->assertTrue( true );
	}
}
