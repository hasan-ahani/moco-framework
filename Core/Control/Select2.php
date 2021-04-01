<?php
namespace MocoFramework\Control;

use MocoFramework\Helper\Field;

/**
 * @package     moco-framework
 * @author      Hasan Ahani
 * @copyright   https://wpdv.ir
 * @license     GPL v3 or later
 * @version     1.0.0
 */
defined( 'ABSPATH' ) or exit();

class Select2 extends Field
{
	
	/**
	 * @return string
	 */
	public function render()
	{
		if(empty($this->options)){
			$this->error = __('options is not set!');
			return null;
		}
		if(!is_array($this->options)){
			$this->error = __('options must be array!');
			return null;
		}
		
		$el = "<select class='mc-select2' {$this->getName()}>";
			foreach ($this->options as $key => $val){
				$selected = null;
				if(isset($this->value) && $this->value == $key){
					$selected =  'selected';
				}elseif(isset($this->default) && $this->default == $key){
					$selected = 'selected';
				}
				$el .= "<option value='{$key}' {$selected}>{$val}</option>";
			}
		$el .= "</select>";
		
		return $el;
	}
}
