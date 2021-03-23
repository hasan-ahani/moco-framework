<?php
namespace MocoFramework;

/**
 * @package     moco-framwork
 * @author      Hasan Ahani
 * @copyright   https://wptool.co
 * @license     ISC
 * @version     1.0.0
 */
defined( 'ABSPATH' ) or exit();

class Loader extends Core
{
	
	public function __construct()
	{
		add_action('admin_enqueue_scripts', array( $this , 'enqueue'));
	}
	
	
}
