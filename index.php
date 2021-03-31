<?php
/**
 * Plugin Name
 *
 * @package     moco-framework
 * @author      Hasan Ahani
 * @copyright   https://wpdv.ir
 * @license     GPL v3 or later
 * @version     1.0.0
 *
 * @wordpress-plugin
 * Plugin Name:       Moco Framework
 * Plugin URI:        https://wpdv.ir/moco-framework
 * Description:       Wordpress Development Framework Theme & Plugin Options
 * Version:           0.1.0
 * Requires at least: 5.2
 * Requires PHP:      7.0
 * Author:            Hasan Ahani
 * Author URI:        https://wpdv.ir/author
 * Text Domain:       moco-framework
 * License:           GPL v3 or later
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 */
defined( 'ABSPATH' ) or exit();


define('MOCO_FRAMEWORK_VER', '1.0.0');
define('MOCO_FRAMEWORK_DIR', dirname( __FILE__ ) . '/');
define('MOCO_FRAMEWORK_CORE', MOCO_FRAMEWORK_DIR . 'Core');
define('MOCO_PREFIX', 'moco_option_');


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
