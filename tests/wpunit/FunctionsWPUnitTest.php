<?php

namespace NewfoldLabs\WP\Context;

use function NewfoldLabs\WP\Context\getContext;
use function NewfoldLabs\WP\Context\setContext;

/**
 * WPUnit tests for context helper functions.
 *
 * @covers \NewfoldLabs\WP\Context\getContext
 * @covers \NewfoldLabs\WP\Context\setContext
 */
class FunctionsWPUnitTest extends \lucatume\WPBrowser\TestCase\WPTestCase {

	/**
	 * Clean up context after each test.
	 */
	public function tearDown(): void {
		Context::$context = array();
		parent::tearDown();
	}

	/**
	 * Test that getContext returns default when key not set.
	 *
	 * @covers \NewfoldLabs\WP\Context\getContext
	 */
	public function test_get_context_returns_default_when_not_set() {
		$this->assertNull( getContext( 'missing', null ) );
		$this->assertSame( 'default', getContext( 'missing', 'default' ) );
	}

	/**
	 * Test that setContext and getContext work for simple key.
	 *
	 * @covers \NewfoldLabs\WP\Context\setContext
	 * @covers \NewfoldLabs\WP\Context\getContext
	 */
	public function test_set_context_and_get_context_simple_key() {
		setContext( 'platform', 'atomic' );
		$this->assertSame( 'atomic', getContext( 'platform' ) );
	}

	/**
	 * Test that setContext and getContext work for dot notation.
	 *
	 * @covers \NewfoldLabs\WP\Context\setContext
	 * @covers \NewfoldLabs\WP\Context\getContext
	 */
	public function test_set_context_and_get_context_dot_notation() {
		setContext( 'brand.name', 'bluehost' );
		$this->assertSame( 'bluehost', getContext( 'brand.name' ) );
	}
}
