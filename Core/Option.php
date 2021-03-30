<?php
namespace MocoFramework;

use MocoFramework\Helper\Field;
use MocoFramework\Helper\Section;

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
	 * @var string
	 */
	private $title;
	
	/**
	 * @var string
	 */
	private $subTitle;
	/**
	 * @var string
	 */
	private $menu;
	
	/**
	 * @var string
	 */
	private $slug;
	
	/**
	 * @var string
	 */
	private $icon;
	
	/**
	 * @var int
	 */
	private $position;
	
	/**
	 * @var array
	 */
	private $options = array();
	
	/**
	 * @var Loader
	 */
	private $core;
	
	
	
	private $prefix = 'moco_option';
	
	/**
	 * controls values
	 * @var array
	 */
	private $_options = [];
	
	/**
	 * default controls values
	 * @var array
	 */
	private $_default = [];
	
	
	/**
	 * Option constructor.
	 *
	 */
	public function __construct()
	{
		global $moco_framework;
		
		$this->core         = $moco_framework;
		$this->title        = __('Moco Settings');
		$this->subTitle     = __('Moco Framework Wordpress Development Easy');
		$this->menu         = __('Moco Settings');
		$this->position     = 99;
		$this->slug         = 'moco-options';

		add_action( 'admin_menu', array( $this , 'setupPage') );
		
		if(isset($_GET['page']) && $_GET['page'] == $this->slug){
			add_action( 'admin_enqueue_scripts', array( $this , 'enqueue') );
			add_filter( 'admin_body_class', array( $this , 'bodyClass') );
		}
		
		
		add_action('wp_ajax_' . $this->getAction(), function(){
			$this->save();
		});
		
		$options = $this->getWpOption();
		if ($options){
			$this->_options = $options;
		}
	}
	
	/**
	 * @return mixed|void
	 */
	protected function getWpOption()
	{
		return get_option($this->getAction());
	}
	
	/**
	 * get ajax action id
	 * @return string
	 */
	public function getAction()
	{
		return 'moco_option_' . $this->slug;
	}
	
	/**
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
	}
	
	/**
	 * @return string
	 */
	public function getSubTitle()
	{
		return $this->subTitle;
	}
	
	/**
	 * @return int
	 */
	public function getPosition()
	{
		return $this->position;
	}
	
	/**
	 * @return array
	 */
	public function getOptions()
	{
		return $this->options;
	}
	
	/**
	 * @return string
	 */
	public function getSlug()
	{
		return $this->slug;
	}
	
	/**
	 * @return string
	 */
	public function getMenu()
	{
		return $this->menu;
	}
	
	/**
	 * @return string
	 */
	public function getIcon()
	{
		return $this->icon;
	}
	
	/**
	 * @param string $title
	 *
	 * @return Option
	 */
	public function setTitle($title)
	{
		$this->title = $title;
		return $this;
	}
	
	
	/**
	 * @param string $subTitle
	 *
	 * @return Option
	 */
	public function setSubTitle(string $subTitle)
	{
		$this->subTitle = $subTitle;
		return $this;
	}
	
	/**
	 * @param string $icon
	 *
	 * @return Option
	 */
	public function setIcon($icon)
	{
		$this->icon = $icon;
		return $this;
	}
	
	/**
	 * @param string $menu
	 *
	 * @return Option
	 */
	public function setMenu($menu)
	{
		$this->menu = $menu;
		return $this;
	}
	
	/**
	 * @param int $position
	 *
	 * @return Option
	 */
	public function setPosition($position)
	{
		$this->position = $position;
		return $this;
	}
	
	/**
	 * @param string $slug
	 *
	 * @return Option
	 */
	public function setSlug($slug)
	{
		$this->slug = $slug;
		return $this;
	}
	
	/**
	 * @param array $options
	 *
	 * @return $this
	 */
	public function options( $options )
	{
		$this->options = $options;
		$this->initOptions();
		return $this;
	}
	
	
	/**
	 * check valid options
	 */
	private function initOptions()
	{
		if(!empty($this->options)){
			$ids = [];
			$controlsDefault = [];
			foreach ($this->options as $index => $option){
				if(isset($option['controls'])){
					foreach ( $option['controls']  as $key => $control )
					{
						if(!isset($control['id'])){
							$this->options[$index]['controls'][$key]['error'] = __('the id is not registered!');
							continue;
						}
						if(in_array($control['id'] , $ids)){
							$this->options[$index]['controls'][$key]['error'] = __('id is not unique!');
							continue;
						}
						if(isset($this->_options[$control['id']])){
							$this->options[$index]['controls'][$key]['value'] = $this->_options[$control['id']];
						}
						if(isset($control['default'])){
							$controlsDefault[$control['id']] = $control['default'];
						}
						array_push($ids, $control['id']);
					}
				}
			}
			
			$this->_default = $controlsDefault;
			if(!$this->getWpOption()){
				add_option( $this->getAction() , $controlsDefault, '',  'yes' );
			}
		}
		
		
	}
	
	/**
	 * @param $class
	 *
	 * @return string
	 */
	public function bodyClass($class)
	{
		$class = explode(' ', $class);
		$class = array_merge($class, [
			'has-moco-framework'
		]);
		
		return implode(' ', array_unique($class));
	}
	
	public function enqueue()
	{
		wp_enqueue_media();
		
		wp_enqueue_script('wp-theme-plugin-editor');
		wp_enqueue_style('wp-codemirror');
		
//		wp_enqueue_script( 'csslint' );
//		wp_enqueue_script( 'jshint' );
//		wp_enqueue_script( 'jsonlint' );
		
		wp_enqueue_style( 'moco-framework' );
		wp_enqueue_script( 'moco-framework' );
	}
	
	
	/**
	 * setup
	 */
	public function setupPage()
	{
		add_menu_page(
			$this->title,
			$this->menu,
			'manage_options',
			$this->slug,
			function(){
				$this->render();
			},
			$this->icon,
			$this->position
		);
	}
	
	
	/**
	 * @return bool
	 */
	public function hasTab()
	{
		$controls = array_column($this->options, 'controls');
		return !empty($controls);
	}
	
	public function hasOption()
	{
		return !empty($this->options);
	}
	
	private function initControls()
	{
		if($this->hasOption()){
			foreach ($this->options as $opKey => $option){
				if(isset($option['controls']) && !empty($option['controls'])){
					foreach ($option['controls'] as $key =>  $control){
						if(isset($control['type'])){
							if(class_exists($control['type'])){
								/**
								 * @var Field $class
								 */
								$class = new $control['type']();
								$class->set($control);
								$this->options[$opKey]['controls'][$key]['render'] = $class;
							}
							
						}
					}
				}
			}
		}
	}
	
	
	/**
	 * render options
	 */
	private function render()
	{
		global $moco_framework;
		
		$this->initControls();
		$moco_framework->view('options',
			[
				'option' => $this
			]
		);
	}
	
	public function save()
	{
		if ( !wp_verify_nonce( $_REQUEST['nonce'], $this->getAction())) {
			exit("invalid access request!");
		}
	
		$res = [
			'success' => false,
			'message' => '',
		];
		
		if(!isset($_REQUEST['moco-option'])){
			$res['message'] = __('invalid request');
		}else{
			update_option($this->getAction(), $_REQUEST['moco-option']);
			$res['success'] = true;
			$res['message'] = __('Settings saved successfully ');
		}
		
		echo wp_json_encode($res);
		die();
	}
}
