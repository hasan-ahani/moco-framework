<?php
namespace MocoFramework;

/**
 * @package     moco-framwork
 * @author      Hasan Ahani
 * @copyright   https://wpdv.ir
 * @license     GPL v3 or later
 * @version     1.0.0
 */
defined( 'ABSPATH' ) or exit();

class Loader extends Core
{
	
	public function __construct()
	{
		add_action('admin_enqueue_scripts', array( $this , 'enqueue'));
		//add_action('wp_ajax_moco_option', array( $this , 'optionSave'));
	}
	
	
}
