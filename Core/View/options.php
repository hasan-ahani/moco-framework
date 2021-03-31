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
                    <button class="mc-btn btn-success btn-submit" type="submit"><?php _e('Save');?></button>
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
                    ?>
                    <li id="moco-tab-<?php echo $option['id']; ?>" data-target="<?php echo $option['id']; ?>" <?php echo $index == 0 ? 'class="active"' : null;?>>
                        <a  <?php echo isset($option['link']) ?  sprintf('href="%s" target="_blank"', $option['link'] ) : null;?>>
                            <span class="icon">
                                <i class="fa <?php echo $option['icon'] ?? 'fa-dashboard';?>"></i>
                            </span>
                            <span class="name"><?php echo $option['title'] ?? 'undefined';?></span>
                        </a>
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
                        ?>
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
                        
                    <?php endforeach; ?>
                </div>
                
            </div>
        </main>
    </form>
</div>


