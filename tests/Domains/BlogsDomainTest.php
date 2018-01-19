<?php
/**
 * Class BlogsDomainTest
 *
 * @package NDS\ScheduledFeaturedImages
 * @subpackage NDS\ScheduledFeaturedImages\Tests\Domains
 */

namespace NDS\ScheduledFeaturedImages\Domains;

use PHPUnit\Framework\TestCase;
use Mockery;
use WP_UnitTestCase;

/**
 * BlogsDomain test case.
 */
class BlogsDomainTest extends WP_UnitTestCase {

	/**
	 * Test case setup method.
	 */
	public function setUp() {

		parent::setUp();

		$this->wpdb = Mockery::mock( '\WPDB' );

		$this->blogs = new BlogsDomain();

	}

	/**
	 * Test case cleanup method.
	 */
	public function tearDown() {

		$this->blogs = null;

		Mockery::close();
		$this->wpdb = null;

		parent::tearDown();

	}

	/**
	 * Test get_ids method when run on a single-site instance.
	 *
	 * @group DomainTests
	 */
	function testGetIdsSingleSite() {

		$this->wpdb->shouldReceive( 'blogs' )
			->andReturn( null );

		$this->assertEmpty( $this->blogs->get_ids( $this->wpdb ) );

		$this->wpdb->shouldReceive( 'blogs' )
			->andReturn( '' );

		$this->assertEmpty( $this->blogs->get_ids( $this->wpdb ) );

	}

	/**
	 * Test get_ids method when run on a multisite instance.
	 *
	 * @group DomainTests
	 */
	function testGetIdsMultisite() {

		$this->wpdb->shouldReceive( 'blogs' )
			->andReturn( 'wp_blogs' );

		$this->wpdb->shouldReceive( 'get_col' )
			->with( matchesPattern( '/^SELECT blog_id\s*FROM\s*wp_blogs\s*WHERE.*archived.*spam.*deleted.*/' ) )
			->andReturn( [ 1, 2 ] );

		$this->assertGreaterThanOrEqual( 2, $this->blogs->get_ids( $this->wpdb ) );

	}
}
