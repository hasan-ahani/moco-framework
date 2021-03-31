<?php
namespace MocoFramework\Helper;

use MocoFramework\Control\CodeEditor;
use MocoFramework\Control\Select;
use MocoFramework\Control\SwitchBox;
use MocoFramework\Control\Text;
use MocoFramework\Control\Textarea;
use MocoFramework\Control\WpEditor;
use MocoFramework\Control\Radio;
use MocoFramework\Control\Checkbox;
use MocoFramework\Control\Url;

/**
 * @package     moco-framework
 * @author      Hasan Ahani
 * @copyright   https://wpdv.ir
 * @license     GPL v3 or later
 * @version     1.0.0
 */
defined( 'ABSPATH' ) or exit();

class Controls
{
	const Text          = Text::class;
	const Textarea      = Textarea::class;
	const WpEditor      = WpEditor::class;
	const CodeEditor    = CodeEditor::class;
	const Radio         = Radio::class;
	const Checkbox      = Checkbox::class;
	const Switch        = SwitchBox::class;
	const Url           = Url::class;
	const Select        = Select::class;
}
