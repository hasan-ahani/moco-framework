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

class Textarea extends Field
{
	
	/**
	 * @return string
	 */
	public function render()
	{
		$min = isset($this->min) ? 'minlength="' . $this->min . '"' : null;
		$max = isset($this->max) ? 'maxlength="' . $this->max . '"' : null;
		$row = isset($this->rows) ? 'rows="' . $this->rows . '"' : null;
		
		
		$el = "<textarea
						id='{$this->id}'
						class='{$this->getClass()}'
						{$min}
						{$max}
						{$this->required()}
						{$row}
						{$this->getName()}
						{$this->placeholder()}
						>{$this->value}</textarea>";
		
		return $el;
		
	}
}
