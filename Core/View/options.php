<?php
/**
 * @package     moco-framework
 * @author      Hasan Ahani
 * @copyright   https://wpdv.ir
 * @license     GPL v3 or later
 * @version     1.0.0
 *
 * @var \MocoFramework\Option $option
 */
defined( 'ABSPATH' ) or exit();

$options = $option->getOptions();
?>

<div id="moco-framework">
    <form>
        <header id="moco-header">
            <div class="brand">
                <h1>
                    <?php
                        echo $option->getTitle();
                    ?>
                </h1>
                <small>
                    <?php
                    echo $option->getSubTitle();
                    ?>
                </small>
            </div>
            <ul class="header-actions">
<!--                <li>-->
<!--                    <input id="search-controls" type="text" class="mc-control" placeholder="--><?php //_e('search ...');?><!--">-->
<!--                </li>-->
                <li>
                    <input type="hidden" name="nonce" value="<?php echo wp_create_nonce($option->getAction());?>">
                    <input type="hidden" name="action" value="<?php echo $option->getAction();?>">
                    <button class="mc-btn btn-success btn-submit moco-loader" type="submit"><i class="fa fa-save"></i> <?php _e('Save');?></button>
                </li>
            </ul>
        </header>
        <main>
            <?php
                if($option->hasTab()):
            ?>
            <div id="moco-sidebar" class="bg-warning">
                <ul class="moco-nav">
                    <?php
                        foreach ($options as $index => $option):
                            $class = [];
	                        if(isset($option['submenu'])){
		                        $class[] = 'is-sub-menu';
                            }
                            if( $index == 0 ){
	                            $class[] = 'active';
                            }
	
	                        $class = !empty($class) ? 'class="' . implode(" " ,$class ) . '"' : null;
                    ?>
                    
                    <li id="moco-tab-<?php echo $option['id']; ?>" data-target="<?php echo $option['id']; ?>"  <?php echo $class;?>>
                        <a  <?php echo isset($option['link']) ?  sprintf('href="%s" target="_blank"', $option['link'] ) : null;?>>
                            <span class="icon">
                                <i class="fa <?php echo $option['icon'] ?? 'fa-dashboard';?>"></i>
                            </span>
                            <span class="name"><?php echo $option['title'] ?? 'undefined';?></span>
                            <?php
                                if(isset($option['submenu'])):
                            ?>
                                <span class="chevron"> <i class="fa fa-chevron-down"></i></span>
                            <?php
                                endif;
                            ?>
                        </a>
                        <?php if(isset($option['submenu'])) :?>
                            <ul class="moco-tab-sub">
	                            <?php
	                            foreach ($option['submenu'] as $subIndex => $subOption) :
		                            ?>
                                    <li id="moco-tab-<?php echo $subOption['id']; ?>" data-target="<?php echo $subOption['id']; ?>"  class="<?php echo $index == 0 && $subIndex == 0 ? 'active' : null;?>">
                                        <a  <?php echo isset($subOption['link']) ?  sprintf('href="%s" target="_blank"', $subOption['link'] ) : null;?>>
                                            <span class="icon">
                                                <i class="fa <?php echo $option['icon'] ?? 'fa-dashboard';?>"></i>
                                            </span>
                                            <span class="name"><?php echo $subOption['title'] ?? 'undefined';?></span>
                                        </a>
                                    </li>
	                            <?php endforeach; ?>
                            </ul>
                        <?php endif;?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php
                endif;
            ?>
            <div id="moco-content">
                <div class="moco-content">
                
                    <?php
                    foreach ($options as $index => $option):
	                    if(isset($option['submenu']) && !empty($option['submenu'])):
                            foreach ($option['submenu'] as $subIndex => $subOption):?>
                            
                                <div id="moco-content-<?php echo $subOption['id']; ?>" class="moco-tab-content <?php echo $subIndex == 0 ? 'show' : null;?>">
		                            <?php
		                            if(isset($subOption['controls']) && !empty($subOption['controls'])){
			
			                            foreach ($subOption['controls'] as $control){
				                            if(isset($control['render'])){
					                            echo $control['render'];
				                            }
			                            }
		                            }
		                            ?>
                                </div>
                            <?php endforeach;
                        else:?>
                            <div id="moco-content-<?php echo $option['id']; ?>" class="moco-tab-content <?php echo $index == 0 ? 'show' : null;?>">
		                        <?php
		                        if(isset($option['controls']) && !empty($option['controls'])){
			
			                        foreach ($option['controls'] as $control){
				                        if(isset($control['render'])){
					                        echo $control['render'];
				                        }
			                        }
		                        }
		                        ?>
                            </div>
	                    <?php
                        endif;
                        ?>
                        
                        
                    <?php endforeach; ?>
                </div>
                
            </div>
        </main>
    </form>
</div>


