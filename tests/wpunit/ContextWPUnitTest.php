<?php

namespace NewfoldLabs\WP\Context;

/**
 * WPUnit tests for the Context class.
 *
 * @coversDefaultClass \NewfoldLabs\WP\Context\Context
 */
class ContextWPUnitTest extends \lucatume\WPBrowser\TestCase\WPTestCase {

	/**
	 * Clean up context after each test.
	 */
	public function tearDown(): void {
		Context::$context = array();
		parent::tearDown();
	}

	/**
	 * Test that all returns empty array by default.
	 *
	 * @covers ::all
	 */
	public function test_all_returns_empty_by_default() {
		$this->assertSame( array(), Context::all() );
	}

	/**
	 * Test that get returns default when key not set.
	 *
	 * @covers ::get
	 */
	public function test_get_returns_default_when_key_not_set() {
		$this->assertNull( Context::get( 'missing', null ) );
		$this->assertSame( 'default', Context::get( 'missing', 'default' ) );
	}

	/**
	 * Test that set and get work for simple key.
	 *
	 * @covers ::set
	 * @covers ::get
	 */
	public function test_set_and_get_simple_key() {
		Context::set( 'platform', 'atomic' );
		$this->assertSame( 'atomic', Context::get( 'platform' ) );
	}

	/**
	 * Test that set and get work for dot notation.
	 *
	 * @covers ::set
	 * @covers ::get
	 */
	public function test_set_and_get_dot_notation() {
		Context::set( 'brand.name', 'bluehost' );
		$this->assertSame( 'bluehost', Context::get( 'brand.name' ) );
	}

	/**
	 * Test that all returns the full context after sets.
	 *
	 * @covers ::set
	 * @covers ::all
	 */
	public function test_all_returns_set_context() {
		Context::set( 'platform', 'default' );
		Context::set( 'brand.name', 'bluehost' );
		$all = Context::all();
		$this->assertIsArray( $all );
		$this->assertArrayHasKey( 'platform', $all );
		$this->assertSame( 'default', $all['platform'] );
		$this->assertArrayHasKey( 'brand', $all );
		$this->assertSame( 'bluehost', $all['brand']['name'] );
	}
}
