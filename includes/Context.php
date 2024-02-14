<?php
namespace NewfoldLabs\WP\Context;

use NewfoldLabs\WP\ModuleLoader\Container;
use function NewfoldLabs\WP\ModuleLoader\container;
use function WP_Forge\Helpers\dataGet;
use function WP_Forge\Helpers\dataSet;

/**
 * This class adds context functionality.
 **/
class Context {

	/**
	 * Context array
	 */
	public static $context = array();

	/**
	 * All contexts
	 * 
	 * @return Array $context - all context
	 */
	public static function all() {
		return self::$context;
	}

	/**
	 * Get the context value
	 *
	 * @param String $name - the name of the context to get
	 * @param String $default - the default value if not defined
	 * @return Array $context - value of the named context
	 */
	public static function get( $name, $default = null ) {
		return dataGet( self::$context, $name, $default );
	}

	/**
	 * Set a context value
	 *
	 * @param String $name - the name of the context to set
	 * @param String $value - the value to set
	 */
	public static function set( $name, $value ) {
		dataSet( self::$context, $name, $value );
	}
}

/**
 * Helper Get Context Method
 *
 * @param String $name - the name of the context to get
 * @param String $default - the default value if not defined
 * @return Array $context - value of the named context
 */
function getContext( $name, $default = null) {
	return Context::get( $name, $default );
}

/**
 * Helper Set Context Method
 *
 * @param String $name - the name of the context to set
 * @param String $value - the value to set
 */
function setContext( $name, $value ) {
	Context::set( $name, $value );
}


do_action(
	'init',
	function () {
		do_action( 'newfold/context/set' );

		// Add to container
		add_action( 'newfold_container_set', 
			function ( Container $container ) {
				// Set all context on container
				$container->set(
					'context',
					Context:all()
				);

				// TODO: Set up a service
				// $container->set(
				// 	'contextService',
				// 	$container->service(
				// 		function () {
				// 			return new ContextService();
				// 		}
				// 	)
				// );
			}
		);

		// TODO: register API
		// add_action( 'rest_api_init', array( ContextApi::class, 'registerRoutes' ) );
	}
);

/**
 * This class adds brand helpers to the context with dot notation access.
 **/
class Brand {

	/**
	 * Helper to get the base brand name
	 */
	public function base() {
		return getContext( 'brand.name' );
	}

	/**
	 * Helper to get the sub brand name
	 */
	public function sub() {
		return getContext( 'brand.sub' );
	}
	
	/**
	 * Helper to get the brand region
	 */
	public function region() {
		return getContext( 'brand.region' );
	}

}