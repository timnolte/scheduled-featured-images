<?php
/**
 * Class BlogsModelTest
 *
 * @package NDS\ScheduledFeaturedImages
 * @subpackage NDS\ScheduledFeaturedImages\Tests\Models
 */

namespace NDS\ScheduledFeaturedImages\Models;

use PHPUnit\Framework\TestCase;
use Mockery;
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

		$this->wpdb = Mockery::mock( '\WPDB' );

		$this->blogs = new BlogsModel();

	}

	/**
	 * Test case cleanup method.
	 */
	public function tearDown() {

		parent::tearDown();

		$this->blogs = null;
		
		Mockery::close();
		$this->wpdb = null;

	}

	/**
	 * Test get_ids method when run on a single-site instance.
	 *
	 * @group ModelTests
	 */
	function testGetIdsSingleSite() {

		$this->wpdb->shouldReceive( 'get_col' )
			->with( matchesPattern("/^SELECT blog_id FROM/" ) )
			->andReturn( [ 1 ] );
		
		$this->assertCount( 1, $this->blogs->get_ids( $this->wpdb ) );

	}

	/**
	 * Test get_ids method when run on a multisite instance.
	 *
	 * @group ModelTests
	 */
	function testGetIdsMultisite() {

		$this->wpdb->shouldReceive( 'get_col' )
			->with( matchesPattern( "/^SELECT blog_id FROM/" ) )
			->andReturn( [ 1, 2 ] );
		
		$this->assertCount( 2, $this->blogs->get_ids( $this->wpdb ) );

	}
}
