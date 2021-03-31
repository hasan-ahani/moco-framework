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
		
		$tiny              = isset($this->tinymce) ? (bool) $this->tinymce : true;
		$media_buttons      = isset($this->media_buttons) ? (bool) $this->media_buttons : true;
		$height             = isset($this->height) ? (int) $this->height : 160;
		
		

		ob_start();
		
		$settings = array(
			'tinymce'               => $tiny,
			'editor_height'         => $height,
			'media_buttons'         => $media_buttons
		);
		wp_editor($this->value, $this->getName(false), $settings);
		$editor_contents                = ob_get_contents();
		ob_get_clean();
		return $editor_contents;
	}
}
