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
			'menu_slug'     => 'moco-options',
			'position'      => 99,
			'sections'      => []
		];
		$this->option = array_merge($option , $defaultOption);

		add_action( 'admin_menu', array( $this , 'setupPage') );
		add_action( 'admin_enqueue_scripts', array( $this , 'enqueue') );
		add_filter( 'admin_body_class', array( $this , 'bodyClass') );
	}
	
	public function bodyClass($class)
	{
		$class = explode(' ', $class);
		
		$class = array_merge($class, [
			'has-moco-framework',
		]);
		
		return implode(' ', array_unique($class));
	}
	
	public function enqueue()
	{
		wp_enqueue_style( 'moco-framework' );
		wp_enqueue_script( 'moco-framework' );
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
