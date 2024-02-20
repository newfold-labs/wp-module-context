<?php
use NewfoldLabs\WP\ModuleLoader\Container;
// use NewfoldLabs\WP\Module\Context\Context;

require_once BLUEHOST_PLUGIN_DIR . 'vendor/newfold-labs/wp-module-context/includes/Context.php';

if ( function_exists( 'add_action' ) ) {

	// Add context to container on init
	add_action(
		'init',
		function () {

			// TODO: register API
			// add_action( 'rest_api_init', array( ContextApi::class, 'registerRoutes' ) );

			// Run any registered hooks to set context
			do_action( 'newfold/context/set' );

			// attach context to container
		}
	);

	// Add to container
	add_action(
		'newfold_container_set',
		function ( Container $container ) {

			// Set all context on container
			$container->set(
				'context',
				\NewfoldLabs\WP\Context\Context::all()
			);
			
			// TODO: Set up a service ?
			// $container->set( 'contextService', $container->service( function () { return new ContextService(); } ) );
		}
	);
}
