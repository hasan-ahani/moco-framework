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
			wp_register_style( 'moco-framework', $this->getPath()['uri'] . 'assets/css/app-rtl.css', false, MOCO_FRAMEWORK_VER);
		}else{
			wp_register_style( 'moco-framework', $this->getPath()['uri'] . 'assets/css/app.css', false, MOCO_FRAMEWORK_VER);
		}
		
		wp_register_script( 'moco-framework', $this->getPath()['uri'] . 'assets/js/app.bundle.js', array('jquery'), MOCO_FRAMEWORK_VER);

	}
	
	public function getPath()
	{
		$dirname        = wp_normalize_path( MOCO_FRAMEWORK_DIR );
		$plugin_dir     = wp_normalize_path( WP_PLUGIN_DIR );
		$located_plugin = ( preg_match( '#'. $plugin_dir .'#', $dirname ) ) ? true : false;
		$directory      = ( $located_plugin ) ? $plugin_dir : get_template_directory();
		$directory_uri  = ( $located_plugin ) ? WP_PLUGIN_URL : get_template_directory_uri();
		$basename       = str_replace( wp_normalize_path( $directory ), '', $dirname );
		$dir            = $directory . $basename;
		$uri            = $directory_uri . $basename;
		
		return apply_filters( 'moco_get_path', array(
			'basename' => wp_normalize_path( $basename ),
			'dir'      => wp_normalize_path( $dir ),
			'uri'      => $uri
		) );
	}
}
