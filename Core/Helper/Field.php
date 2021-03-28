<?php
namespace MocoFramework\Helper;

/**
 * @package     moco-framework
 * @author      Hasan Ahani
 * @copyright   https://wptool.co
 * @license     ISC
 * @version     1.0.0
 */
defined( 'ABSPATH' ) or exit();

abstract class Field
{
	/**
	 * @var array
	 */
	private $data = array();
	
	/**
	 * @var \MocoFramework\Loader
	 */
	private $core;
	
	private $prefix = 'moco-field-';
	
	
	public function __construct()
	{
		global $moco_framework;
		$this->core = $moco_framework;
		
		if(isset($this->id)){
			$id = str_replace(' ', '', $this->id);
			$this->id =  $this->prefix . strtolower($id);
		}else{
			$this->id =  $this->prefix . $this->strGenerate();
		}
		
	}
	
	protected function strGenerate($length = 6) {
		return substr(str_shuffle(str_repeat($x='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
	}
	
	/**
	 * @return bool
	 */
	public function isDebug()
	{
		return isset($this->debug) && $this->debug == true;
	}
	
	
	/**
	 * @param $name
	 * @param $value
	 */
	public function __set($name, $value)
	{
		$this->data[$name] = $value;
	}
	
	
	/**
	 * @param string $name
	 *
	 * @return mixed
	 */
	public function __get($name)
	{
		If (isset($this->data[$name])) {
			return $this->data[$name];
		}
	}
	
	/**
	 * @param array $args
	 */
	public function set($args)
	{
		if(is_array($args) && !empty($args)){
			foreach ($args as $key => $val){
				$this->$key = $val;
			}
		}
	}
	
	/**
	 * @param string $name
	 *
	 * @return bool
	 */
	public function __isset($name)
	{
		return isset($this->data[$name]);
	}
	
	/**
	 * @return string
	 */
	public function __toString()
	{
		return $this->fieldSection();
	}
	
	
	/**
	 * debug
	 */
	public function __debugInfo()
	{
		foreach($this->data as $key => $value){
			
			echo "[" . $key . "]\t\t\t\t=> " . $value . PHP_EOL;
		}
	}
	
	/**
	 *
	 */
	private function fieldSection()
	{
		ob_start();
		$this->core->view('field', [
			'field'         => &$this,
			'control'       => $this->controlWrapper($this->render()),
			
		]);
		$html = ob_get_clean();
		return $html;
  
	}
	
	/**
	 * @param       $inside
	 * @param array $attr
	 *
	 * @return string
	 */
	public function controlWrapper($inside, $attr = array())
	{
		$attribute = '';
		$class = isset($attr['class']) ?  $attr['class'] : '';
		$attr['class'] = 'form-control ' . $class ;
		
		foreach ($attr as $key => $val){
			$attribute .= $key . '="' . $val . '" ';
		}
		return '<div '. $attribute . '>' . $inside . '</div>';
	}
	
	/**
	 * @param string $default
	 *
	 * @return string
	 */
	public function getClass($default = 'mc-control')
	{
		return isset($this->class) ? $default . ' ' . $this->class : $default;
	}
	
	/**
	 * @return string
	 */
	abstract public function render();
	
}
