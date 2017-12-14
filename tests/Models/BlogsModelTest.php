<?php
/**
 * Class BlogsModelTest
 *
 * @package NDS\ScheduledFeaturedImages
 * @subpackage NDS\ScheduledFeaturedImages\Tests\Models
 */

namespace NDS\ScheduledFeaturedImages\Models;

use PHPUnit\Framework\TestCase;
use WP_UnitTestCase;

/**
 * BlogsModel test case.
 */
class BlogsModelTest extends WP_UnitTestCase {

	/**
	 * Test case setup method.
	 */
	public function setUp() {

		parent::setUp();

		$this->model = new BlogsModel();

	}

	/**
	 * Test case cleanup method.
	 */
	public function tearDown() {

		parent::tearDown();

		$this->model = null;

	}

	/**
	 * Test get_blog_ids method when run on a single-site instance.
	 *
	 * @group ModelTests
	 */
	function testGetBlogIds() {
		$this->assertCount( 0, $this->model->get_blog_ids() );
	}
}
