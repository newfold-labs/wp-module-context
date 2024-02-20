<?php
// use NewfoldLabs\WP\Context\Context;

if ( function_exists( 'add_action' ) ) {

	// Add context to container on init
	add_action(
		'init',
		function () {
			// Instantiate a Context instance
			// $context = new Context();
			// Run any registered hooks to set context
			do_action( 'newfold/context/set' );
		}
	);
}
