<?php
namespace MocoFramework;

/**
 * @package     moco-framwork
 * @author      Hasan Ahani
 * @copyright   https://wptool.co
 * @license     ISC
 * @version     1.0.0
 */
defined( 'ABSPATH' ) or exit();

class Core
{
	
	public function option($option)
	{
		return new Option($option);
	}
	
	public function view($slug, $params = array())
	{
		$file = MOCO_FRAMEWORK_DIR . '/Core/View/' . $slug . '.php';
		
		if( file_exists( $file ) ){
			if( is_array( $params ) && ! empty( $params ) ){
				extract( $params );
			}
			ob_start();
			
			if ( file_exists( $file ) ){
				include $file;
			}
			
			return ob_get_clean();
		}
	}
	
	public function enqueue()
	{
		if(is_rtl()){
			wp_register_style( 'moco-framework', MOCO_FRAMEWORK_DIR . 'assets/css/app-rtl.css', false, MOCO_FRAMEWORK_VER);
		}else{
			wp_register_style( 'moco-framework', MOCO_FRAMEWORK_DIR . 'assets/css/app.css', false, MOCO_FRAMEWORK_VER);
		}
		
		wp_register_script( 'moco-framework', MOCO_FRAMEWORK_DIR . 'assets/js/app.bundle.js', array('jquery'), MOCO_FRAMEWORK_VER);
	}
}
