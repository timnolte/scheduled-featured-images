<?php
/**
 * Class PluginTest
 *
 * @package NDS\ScheduledFeaturedImages
 * @subpackage NDS\ScheduledFeaturedImages\Tests
 */

namespace NDS\ScheduledFeaturedImages;

use PHPUnit\Framework\TestCase;
use WP_UnitTestCase;

/**
 * Plugin test case.
 */
class PluginTest extends WP_UnitTestCase {

	/**
	 * Test case setup method.
	 */
	public function setUp() {

		parent::setUp();

		$this->plugin = new Plugin();

		do_action( 'init' );

	}

	/**
	 * Test case cleanup method.
	 */
	public function tearDown() {

		parent::tearDown();

		$this->plugin = null;

	}

	/**
	 * Test plugin name/slug method.
	 * 
	 * @group PluginAttributes
	 */
	public function testPluginName() {

		$this->assertNotEmpty( $this->plugin->get_plugin_name(), 'Plugin should have a default name/slug define.' );
		$this->assertSame( Plugin::NAME, $this->plugin->get_plugin_name() );

	}

	/**
	 * Test plugin version method.
	 * 
	 * @group PluginAttributes
	 */
	public function testPluginVersion() {

		$this->assertNotEmpty( $this->plugin->get_version(), 'Plugin should have a default version number.' );
		$this->assertSame( Plugin::VERSION, $this->plugin->get_version() );

	}

	/**
	 * Test plugin version GLOBAL is defined.
	 * 
	 * @group PluginGlobalAttributes
	 */
	public function testPluginVersionGlobal() {

		$this->assertNotEmpty( NDS_SFI_VERSION, 'Global NDS_SFI_VERSION should not be empty after plugin initialization.' );
		$this->assertSame( NDS_SFI_VERSION, $this->plugin->get_version() );

	}

	/**
	 * Test plugin path method.
	 * 
	 * @group PluginAttributes
	 */
	public function testPluginPath() {

		$this->assertNotEmpty( $this->plugin->get_plugin_path(), 'Plugin should have a default path.' );
		$this->assertThat( $this->plugin->get_plugin_path(), $this->stringContains( Plugin::NAME ) );
		$this->assertThat( $this->plugin->get_plugin_path(), $this->logicalNot( $this->stringContains( 'src' ) ) );
		$this->assertThat( $this->plugin->get_plugin_path(), $this->logicalNot( $this->stringContains( 'test' ) ) );
		$this->assertSame( trailingslashit( Common\Util::dirname_r( __FILE__, 2 ) ), $this->plugin->get_plugin_path() );

	}

	/**
	 * Test plugin path GLOBAL is defined.
	 * 
	 * @group PluginGlobalAttributes
	 */
	public function testPluginPathGlobal() {

		$this->assertNotEmpty( NDS_SFI_PATH, 'Global NDS_SFI_PATH should not be empty after plugin initialization.' );
		$this->assertSame( NDS_SFI_PATH, $this->plugin->get_plugin_path() );

	}

	/**
	 * Test plugin base directory method.
	 * 
	 * @group PluginAttributes
	 */
	public function testPluginDirectory() {

		$this->assertNotEmpty( $this->plugin->get_plugin_dir(), 'Plugin should have a default directory.' );
		$this->assertThat( $this->plugin->get_plugin_dir(), $this->stringContains( Plugin::NAME ) );
		$this->assertThat( $this->plugin->get_plugin_dir(), $this->logicalNot( $this->stringContains( 'src' ) ) );
		$this->assertThat( $this->plugin->get_plugin_dir(), $this->logicalNot( $this->stringContains( 'test' ) ) );
		$this->assertSame( basename( $this->plugin->get_plugin_path() ), $this->plugin->get_plugin_dir() );

	}

	/**
	 * Test plugin base directory GLOBAL is defined.
	 * 
	 * @group PluginGlobalAttributes
	 */
	public function testPluginDirectoryGlobal() {

		$this->assertNotEmpty( NDS_SFI_DIR, 'Global NDS_SFI_DIR should not be empty after plugin initialization.' );
		$this->assertSame( NDS_SFI_DIR, $this->plugin->get_plugin_dir() );

	}

	/**
	 * Test plugin URL method.
	 * 
	 * @group PluginAttributes
	 */
	public function testPluginUrl() {

		$this->assertNotEmpty( $this->plugin->get_plugin_url(), 'Plugin should have a default URL.' );
		$this->assertThat( $this->plugin->get_plugin_url(), $this->stringContains( Plugin::NAME ) );
		$this->assertThat( $this->plugin->get_plugin_url(), $this->stringContains( '/wp-content/plugins/' ) );
		$this->assertThat( $this->plugin->get_plugin_url(), $this->logicalNot( $this->stringContains( 'src' ) ) );
		$this->assertThat( $this->plugin->get_plugin_url(), $this->logicalNot( $this->stringContains( 'test' ) ) );
		$this->assertSame( '//example.org/wp-content/plugins/scheduled-featured-images/', $this->plugin->get_plugin_url() );

	}

	/**
	 * Test plugin URL GLOBAL is defined.
	 * 
	 * @group PluginGlobalAttributes
	 */
	public function testPluginUrlGlobal() {

		$this->assertNotEmpty( NDS_SFI_URL, 'Global NDS_SFI_URL should not be empty after plugin initialization.' );
		$this->assertSame( NDS_SFI_URL, $this->plugin->get_plugin_url() );

	}

}
