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

class Text extends Field
{
	
	/**
	 * @return string
	 */
	public function render()
	{
		$el = "<input id='{$this->id}' type='text' class='mc-control' name='moco-field[{$this->id}]'  />";
		return $this->controlWrapper($el);
	}
}
