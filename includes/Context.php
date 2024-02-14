<?php
namespace NewfoldLabs\WP\Context;

use NewfoldLabs\WP\ModuleLoader\Container;
use function NewfoldLabs\WP\ModuleLoader\container;
use function WP_Forge\Helpers\dataGet;
use function WP_Forge\Helpers\dataSet;

/**
 * This class adds click to buy functionality.
 **/
class Context {

	/**
	 * Dependency injection container.
	 *
	 * @var Container
	 */
	protected $container;

	public static $context = [];

    public static function all() {
		return self::$context;
	}

    public static function get( $name, $default = null ) {
		return dataGet( self::$context, $name, $default );
	}

	public static function set( $name, $value ) {
		dataSet( self::$context, $name, $value );
	}


}

function getContext( $name, $default = null) {
	return Context::get( $name, $default );
}

function setContext( $name, $value ) {
	Context::set( $name, $value );
}

do_action(
	'init',
	function () {
		do_action( 'newfold/context/set' );
        
        // TODO: register API
        // add_action( 'rest_api_init', array( ContextApi::class, 'registerRoutes' ) );
	}
);

add_action(
	'newfold/context/set',
	function () {
		setContext( 'brand.name', 'hostgator' );
		setContext( 'brand.region', 'BR' );
	}
);

class Brand {

	public function base() {
		return getContext( 'brand.name' );
	}
	
	public function region() {
		return getContext( 'brand.region' );
	}

}