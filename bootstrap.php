<?php
use NewfoldLabs\WP\ModuleLoader\Container;
use NewfoldLabs\WP\Module\Context\Context;

if ( function_exists( 'do_action' ) && function_exists( 'add_action' ) ) {
	
	// Add context to container on init
	do_action(
		'init',
		function () {

			// Run any registered hooks to set context
			do_action( 'newfold/context/set' );

			// Add to container
			add_action(
				'newfold_container_set',
				function ( Container $container ) {

					// Set all context on container
					$container->set(
						'context',
						Context::all()
					);

					// TODO: Set up a service ?
					// $container->set( 'contextService', $container->service( function () { return new ContextService(); } ) );
				}
			);

			// TODO: register API
			// add_action( 'rest_api_init', array( ContextApi::class, 'registerRoutes' ) );
		}
	);

}
