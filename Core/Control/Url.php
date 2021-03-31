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

class Url extends Field
{
	
	/**
	 * @return string
	 */
	public function render()
	{
		$this->class = 'row '.$this->class;
		
		$required = isset($this->required) ? 'required' : null;
		
		$el = "<input
				id='{$this->id}'
				class='{$this->getClass()}'
				{$this->getName()}
				{$this->placeholder()}
				type='url'
				value='{$this->value}'
				$required
				/>";
		if(isset($this->clearButton) && $this->clearButton){
			$el .= "<button class='mc-btn btn-danger btn-clear btn-icon' data-moco-clear='{$this->id}'><i class='fa fa-times'></i> </button>";
		}
		if(isset($this->selectMedia) && $this->selectMedia){
			$text = isset($this->buttonText) ?  $this->buttonText : __('Select Media');
			$el .= "<button class='mc-btn' data-moco-selection='{$this->id}'>{$text}</button>";
		}
		return $el;
	}
}
