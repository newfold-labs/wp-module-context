<?php
/**
 * Context Boostrap
 */
use NewfoldLabs\WP\Context\Context;
use function NewfoldLabs\WP\Context\setContext;
use function NewfoldLabs\WP\Context\getContext;

if ( function_exists( 'add_action' ) ) {

	// Add context to container on plugins_loaded
	// Using higher priority than default to ensure 
	// context is set before any module registration
	add_action(
		'plugins_loaded',
		function () {
			// Run any registered hooks to set context
			do_action( 'newfold/context/set' );
		},
		9
	);

	// Platform detection
	add_action(
		'newfold/context/set',
		function () {
			// set platform
			$platform = 'default';
			if (
				defined( 'IS_ATOMIC' ) &&
				IS_ATOMIC &&
				defined( 'ATOMIC_CLIENT_ID' ) &&
				'2' === ATOMIC_CLIENT_ID
			) {
				$platform = 'atomic';
			}
			setContext( 'platform', $platform );
		}
	);
}

if ( function_exists( 'add_filter' ) ) {

	// Add context to runtime
	add_filter(
		'newfold_runtime',
		function ( $runtime ) {
			return array_merge(
				$runtime,
				array( 'context' => Context::all() )
			);
		}
	);

}
