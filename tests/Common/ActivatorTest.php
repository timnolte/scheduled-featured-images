<?php
/**
 * Class ActivatorTest
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
 * Activator test case.
 */
class ActivatorTest extends WP_UnitTestCase {

	/**
	 * Test case setup method.
	 */
	public function setUp() {

		parent::setUp();

		$this->activator = new Activator();

	}

	/**
	 * Test case cleanup method.
	 */
	public function tearDown() {

		$this->activator = null;

		parent::tearDown();

	}

	/**
	 * A single example test.
	 *
	 * @group ActivatorTests
	 */
	function testActivateNewSite() {
		// Replace this with some actual testing code.
		$this->assertTrue( true );
	}
}
