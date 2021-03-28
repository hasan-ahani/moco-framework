<?php
/**
 * @package     moco-framework
 * @author      Hasan Ahani
 * @copyright   https://wptool.co
 * @license     ISC
 * @version     1.0.0
 *
 * @var \MocoFramework\Helper\Field $field
 * @var $control
 */
defined( 'ABSPATH' ) or exit();

?>
<?php
if(isset($field->error)) :
    echo "<div class='alert danger'>". $field->error ."</div>";
else :
?>
<div class="form-inline">
	<div class="form-label">
	        <label for="<?php echo $field->id;?>"><?php echo isset($field->title) ? $field->title : null;?></label>
	        <small><?php echo isset($field->desc) ? $field->desc : null; ?></small>
	
	</div>
	<div class="form-control-box">
		<?php
		do_action('moco_before_control');
		if($field->isDebug()){
            var_dump($field);
        }
		echo $control;
	
		if(isset($field->detail)) :
		?>
	    <small><?php echo $field->detail ?></small>
		<?php endif; ?>
		<?php do_action('moco_after_control');?>
	</div>
</div>
<?php
endif;
