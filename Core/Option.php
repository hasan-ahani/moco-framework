<?php
namespace MocoFramework;

/**
 * @package     moco-framework
 * @author      Hasan Ahani
 * @copyright   https://wptool.co
 * @license     ISC
 * @version     1.0.0
 */
defined( 'ABSPATH' ) or exit();

class Option
{
	/**
	 * @var array $option
	 */
	private $option;
	
	
	/**
	 * Option constructor.
	 *
	 * @param $option
	 */
	public function __construct($option)
	{
		$defaultOption = [
			'page_title'    => __('Moco Setting'),
			'menu_title'    => __('Moco Setting'),
			'capability'    => 'manage_options',
			'menu_slug'     => 'factshop-options',
			'position'      => 99,
			'sections'      => []
		];
		$this->option = array_merge($option , $defaultOption);

		add_action( 'admin_menu', array( $this , 'setupPage') );
		add_action( 'admin_enqueue_scripts', array( $this , 'enqueue') );
	}
	
	public function enqueue()
	{
		wp_enqueue_style( 'custom_wp_admin_css' );
	}
	
	
	/**
	 * setup
	 */
	public function setupPage()
	{
		add_menu_page(
			$this->option['page_title'],
			$this->option['menu_title'],
			$this->option['capability'],
			$this->option['menu_slug'],
			array( __CLASS__ , 'render')
		);
	}
	
	public function render()
	{
		global $moco_framework;
		echo $moco_framework->view('options');
	}
}
