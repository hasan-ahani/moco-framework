<?php
namespace MocoFramework;

/**
 * @package     moco-framwork
 * @author      Hasan Ahani
 * @copyright   https://wpdv.ir
 * @license     GPL v3 or later
 * @version     1.0.0
 */
defined( 'ABSPATH' ) or exit();

class Core
{
	
	/**
	 * @return Option
	 */
	public function option()
	{
		return new Option();
	}
	
	/**
	 * @param       $slug
	 * @param array $params
	 */
	public function view($slug, $params = array())
	{
		$file = MOCO_FRAMEWORK_DIR . '/Core/View/' . $slug . '.php';
		
		if( file_exists( $file ) ){
			
			if( is_array( $params ) && ! empty( $params ) ){
				extract( $params );
			}
			
			if ( file_exists( $file ) ){
				include $file;
			}
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
		wp_localize_script( 'moco-framework', 'moco',
			[
				'ajax_url' => admin_url( 'admin-ajax.php')
			]
		);
		
		
	}
	
	/**
	 * @param array $args
	 * @param bool  $json
	 *
	 * @return array
	 */
	public function getCodeEditorConfig($args = [], $json = false)
	{
		$arr =  [ 'codeEditor' => wp_enqueue_code_editor($args) ];
		if($json){
			return wp_json_encode($arr);
		}
		return $arr;
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
