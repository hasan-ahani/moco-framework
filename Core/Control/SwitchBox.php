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

class SwitchBox extends Field
{
	
	/**
	 * @return string
	 */
	public function render()
	{
		$checked = null;
		if(isset($this->value)){
			$checked = 'checked';
		}
		$el = "<div class='mc-switch'>";
		$el .= "<input id='{$this->id}' type='checkbox' class='mc-control' value='true' {$this->getName()} {$checked}>";
		$el .= "<label for='{$this->id}'>{$this->label}</label>";
		$el .= "</div>";
  
		return $el;
	}
}
