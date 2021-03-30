<?php
/**
 * @package     moco-framework
 * @author      Hasan Ahani
 * @copyright   https://wpdv.ir
 * @license     ISC
 * @version     1.0.0
 */
defined( 'ABSPATH' ) or exit();


define('MOCO_FRAMEWORK_VER', '1.0.0');
define('MOCO_FRAMEWORK_DIR', dirname( __FILE__ ) . '/');
define('MOCO_FRAMEWORK_CORE', MOCO_FRAMEWORK_DIR . 'Core');


spl_autoload_register(
	function( $class ) {
		if ( strpos( $class,  'MocoFramework' ) === 0 ){
			$class = str_replace( 'MocoFramework\\', MOCO_FRAMEWORK_DIR . '/Core/',  $class );
			$class = str_replace( '\\' , '/',  $class );
			$class.= '.php';
			if(file_exists($class)) {
				include $class;
			}
		}
	}
);

global $moco_framework;
$moco_framework = new \MocoFramework\Loader();
