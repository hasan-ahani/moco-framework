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

class Checkbox extends Field
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
			$el .= '<label class="mc-checkbox">';
			$checked = null;
			if(isset($this->value) && is_array($this->value)){
				$checked = in_array($key, $this->value) ? 'checked' : null;
			}elseif(isset($this->default) && is_array($this->default)){
				$checked = in_array($key, $this->default) ? 'checked' : null;
			}
			$el .= "<input
						type='checkbox'
						{$this->getName(true, '[]')}
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
