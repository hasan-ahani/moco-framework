<?php
namespace MocoFramework\Control;

use MocoFramework\Helper\Field;

/**
 * @package     moco-framework
 * @author      Hasan Ahani
 * @copyright   https://wpdv.ir
 * @license     ISC
 * @version     1.0.0
 */
defined( 'ABSPATH' ) or exit();

class Text extends Field
{
	
	/**
	 * @return string
	 */
	public function render()
	{
		$min = isset($this->min) ? 'minlength="' . $this->min . '"' : null;
		$max = isset($this->max) ? 'maxlength="' . $this->max . '"' : null;
		$required = isset($this->required) ? 'required' : null;
		
		$el = "<input
				id='{$this->id}'
				class='{$this->getClass()}'
				{$this->getName()}
				{$this->placeholder()}
				type='text'
				value='{$this->value}'
				$min
				$max
				$required
				/>";
		return $el;
	}
}
