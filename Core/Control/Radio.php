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

class Radio extends Field
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
		$el = '';
		foreach ($this->options as $key => $val){
			$el .= '<label class="mc-radio">';
			$checked = null;
			if(isset($this->value) && $this->value == $key){
				$checked =  'checked';
			}elseif(isset($this->default) && $this->default == $key){
				$checked =  'checked';
			}
			$el .= "<input
						type='radio'
						{$this->getName()}
						value='{$key}'
						{$checked}
						class='mc-control'>";
			
			if(!is_array($val)){
				$el .= '<span>'. $val .'</span>';
			}
			$el .= '</label>';
		}
		return $el;
	}
}
