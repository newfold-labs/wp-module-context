<?php
/**
 * Context Boostrap
 */

if ( function_exists( 'add_action' ) ) {

	// Add context to container on init
	add_action(
		'init',
		function () {
			// Run any registered hooks to set context
			do_action( 'newfold/context/set' );
		}
	);
}
