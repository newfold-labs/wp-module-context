<?php

namespace NewfoldLabs\WP\Context;

/**
 * Module loading tests for Context module.
 *
 * Verifies the Context module and its core classes are properly loaded.
 *
 * @coversDefaultClass \NewfoldLabs\WP\Context\Context
 */
class ModuleLoadingWPUnitTest extends \lucatume\WPBrowser\TestCase\WPTestCase {

	/**
	 * Test that WordPress factory is working.
	 *
	 * @coversNothing
	 */
	public function test_wordpress_factory_works() {
		$post = static::factory()->post->create_and_get();

		$this->assertInstanceOf( \WP_Post::class, $post );
	}

	/**
	 * Test that the Context class is loaded.
	 *
	 * @coversNothing
	 */
	public function test_context_class_loaded() {
		$this->assertTrue( class_exists( 'NewfoldLabs\WP\Context\Context' ) );
	}

	/**
	 * Test that the Brand class is loaded.
	 *
	 * @coversNothing
	 */
	public function test_brand_class_loaded() {
		$this->assertTrue( class_exists( 'NewfoldLabs\WP\Context\Brand' ) );
	}
}
