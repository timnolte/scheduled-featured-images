<?php
/**
 * Class CoreTest
 *
 * @package NDS\ScheduledFeaturedImages
 * @subpackage NDS\ScheduledFeaturedImages\Tests
 */

namespace NDS\ScheduledFeaturedImages;

use PHPUnit\Framework\TestCase;
use WP_UnitTestCase;

/**
 * Core test case.
 */
class CoreTest extends WP_UnitTestCase {

	/**
	 * Commong test group setup method.
	 */
	function setUp() {
		parent::setUp();

		$this->plugin = new Core();
		$this->plugin_name = 'scheduled-featured-images';
	}

	/**
	 * Test group cleanup method.
	 */
	function tearDown() {
		parent::tearDown();

		$this->plugin = null;
		$this->plugin_name = null;
	}

	/**
	 * Test Core plugin version method when a global has not been defined.
	 */
	function testCoreDefaultVersion() {
		$this->assertNotEmpty( $this->plugin->get_version(), 'Plugin should have a default version number.' );
		$this->assertSame( '1.0.0', $this->plugin->get_version() );
	}

	/**
	 * Test Core plugin version method when a global is defined.
	 * NOTE: Cannot run constant tests without negatively affecting downstream tests.
	 *
	 * @requires extension null
	 * @ignore
	 * @link http://php.net/manual/en/language.constants.php
	 */
	function testCoreGlobalVersion() {
		define( 'NDS_SFI_VERSION', '1.2.3' );
		$this->assertNotEmpty( NDS_SFI_VERSION, 'Global NDS_SFI_VERSION should not be empty if it is defined.' );
		$plugin = new Core();
		$this->assertSame( NDS_SFI_VERSION, $plugin->get_version() );
	}

	/**
	 * Test Core plugin name/slug method when a global has not been defined.
	 */
	function testCoreDefaultSlug() {
		$this->assertNotEmpty( $this->plugin->get_plugin_name(), 'Plugin should have a default name/slug define.' );
		$this->assertSame( $this->plugin_name, $this->plugin->get_plugin_name() );
	}

	/**
	 * Test Core plugin path when a global path has not been defined.
	 */
	function testCoreDefaultPluginPath() {
		$this->assertNotEmpty( $this->plugin->get_plugin_path(), 'Plugin should have a default path.' );
		$this->assertThat( $this->plugin->get_plugin_path(), $this->stringContains( $this->plugin_name ) );
		$this->assertThat( $this->plugin->get_plugin_path(), $this->logicalNot( $this->stringContains( 'src' ) ) );
		$this->assertThat( $this->plugin->get_plugin_path(), $this->logicalNot( $this->stringContains( 'test' ) ) );
		$this->assertSame( trailingslashit( Common\Util::dirname_r( __FILE__, 2 ) ), $this->plugin->get_plugin_path() );
	}

	/**
	 * Test Core plugin path method when a global is defined.
	 * NOTE: Cannot run constant tests without negatively affecting downstream tests.
	 *
	 * @requires extension null
	 * @ignore
	 * @link http://php.net/manual/en/language.constants.php
	 */
	function testCoreGlobalPluginPath() {
		define( 'NDS_SFI_PATH', '/some/file/path/' );
		$this->assertNotEmpty( NDS_SFI_PATH, 'Global NDS_SFI_PATH should not be empty if it is defined.' );
		$plugin = new Core();
		$this->assertSame( NDS_SFI_PATH, $plugin->get_plugin_path() );
	}

	/**
	 * Test Core plugin base directory method when a global directory has not been defined.
	 */
	function testCoreDefaultPluginDirectory() {
		$this->assertNotEmpty( $this->plugin->get_plugin_dir(), 'Plugin should have a default directory.' );
		$this->assertThat( $this->plugin->get_plugin_dir(), $this->stringContains( $this->plugin_name ) );
		$this->assertThat( $this->plugin->get_plugin_dir(), $this->logicalNot( $this->stringContains( 'src' ) ) );
		$this->assertThat( $this->plugin->get_plugin_dir(), $this->logicalNot( $this->stringContains( 'test' ) ) );
		$this->assertSame( basename( $this->plugin->get_plugin_path() ), $this->plugin->get_plugin_dir() );
	}

	/**
	 * Test Core plugin base directory method when a global is defined.
	 * NOTE: Cannot run constant tests without negatively affecting downstream tests.
	 *
	 * @requires extension null
	 * @ignore
	 * @link http://php.net/manual/en/language.constants.php
	 */
	function testCoreGlobalPluginDir() {
		define( 'NDS_SFI_DIR', '/some/file/path/' );
		$this->assertNotEmpty( NDS_SFI_DIR, 'Global NDS_SFI_DIR should not be empty if it is defined.' );
		$plugin = new Core();
		$this->assertSame( NDS_SFI_DIR, $plugin->get_plugin_dir() );
	}

	/**
	 * Test Core plugin URL method when a global has not been defined.
	 */
	function testCoreDefaultPluginUrl() {
		$this->assertNotEmpty( $this->plugin->get_plugin_url(), 'Plugin should have a default URL.' );
		$this->assertThat( $this->plugin->get_plugin_url(), $this->stringContains( $this->plugin_name ) );
		$this->assertThat( $this->plugin->get_plugin_url(), $this->stringContains( '/wp-content/plugins/' ) );
		$this->assertThat( $this->plugin->get_plugin_url(), $this->logicalNot( $this->stringContains( 'src' ) ) );
		$this->assertThat( $this->plugin->get_plugin_url(), $this->logicalNot( $this->stringContains( 'test' ) ) );
		$this->assertSame( '//example.org/wp-content/plugins/scheduled-featured-images/', $this->plugin->get_plugin_url() );
	}

	/**
	 * Test Core plugin URL method when a global is defined.
	 * NOTE: Cannot run constant tests without negatively affecting downstream tests.
	 *
	 * @requires extension null
	 * @ignore
	 * @link http://php.net/manual/en/language.constants.php
	 */
	function testCoreGlobalPluginUrl() {
		define( 'NDS_SFI_URL', '://example.org/wp-content/plugins/' . $this->plugin_name );
		$this->assertNotEmpty( NDS_SFI_URL, 'Global NDS_SFI_URL should not be empty if it is defined.' );
		$plugin = new Core();
		$this->assertSame( NDS_SFI_URL, $plugin->get_plugin_url() );
	}
}
