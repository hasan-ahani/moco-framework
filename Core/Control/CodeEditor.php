<?php
namespace MocoFramework\Control;

use MocoFramework\Helper\Field;

/**
 * @package     moco-framework
 * @author      Hasan Ahani
 * @copyright   https://wptool.co
 * @license     ISC
 * @version     1.0.0
 */
defined( 'ABSPATH' ) or exit();

class CodeEditor extends Field
{
	
	/**
	 * @return string
	 */
	public function render()
	{
		
		$mode              = isset($this->mode) ?  $this->mode : 'text';
		
		$el = "<textarea
						id='{$this->id}'
						class='{$this->getClass('moco-code-editor')}'
						{$this->getName()}
						data-settings='{$this->core->getCodeEditorConfig(['type' => $mode], true)}'
						>{$this->value}</textarea>";
		
		return $el;

	}
}
