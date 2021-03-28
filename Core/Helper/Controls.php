<?php
namespace MocoFramework\Helper;

use MocoFramework\Control\Text;

/**
 * @package     moco-framework
 * @author      Hasan Ahani
 * @copyright   https://wptool.co
 * @license     ISC
 * @version     1.0.0
 */
defined( 'ABSPATH' ) or exit();

class Controls
{
	const Text          = Text::class;
	const Textarea      = 'Textarea';
	const Radio         = 'radio';
	const Checkbox      = 'checkbox';
	const Switch        = 'switch';
	const Url           = 'url';
	const CodeEditor    = 'codeEditor';
	const WpEditor      = 'wpEditor';
	const Notice        = 'notice';
}
