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

class WpEditor extends Field
{
	
	/**
	 * @return string
	 */
	public function render()
	{
		
		$teeny              = isset($this->teeny) ? (bool) $this->teeny : false;
		$media_buttons      = isset($this->media_buttons) ? (bool) $this->media_buttons : false;
		$height             = isset($this->height) ? (int) $this->height : 160;
		
		$settings = array(
            'teeny'                 => $teeny,
            'editor_height'         => $height,
            'quicktags'             => array( 'buttons' => 'strong,em,del,close' ),
            'media_buttons'         => $media_buttons
		);

		ob_start();
		wp_editor($this->value, $this->getName(false), $settings);
		return ob_get_clean();
	}
}
