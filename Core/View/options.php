<?php
/**
 * @package     moco-framework
 * @author      Hasan Ahani
 * @copyright   https://wptool.co
 * @license     ISC
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
                <li>
                    <input type="text" class="mc-control" placeholder="search ...">
                </li>
                <li>
                    <input type="hidden" name="nonce" value="<?php echo wp_create_nonce($option->getAction());?>">
                    <input type="hidden" name="action" value="<?php echo $option->getAction();?>">
                    <button class="mc-btn btn-success btn-submit" type="submit">ذخیره</button>
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
    <!--                <div class="moco-tab-content show">-->
    <!--                    <div class="alert success">Moco Framework mtn test</div>-->
    <!--                    <div class="alert warning">Moco Framework mtn test</div>-->
    <!--                    <div class="alert danger">Moco Framework mtn test</div>-->
    <!--                    <div class="form-inline">-->
    <!--                        <div class="form-label">-->
    <!--                            <label for="test">input test</label>-->
    <!--                            <small>input test</small>-->
    <!--                        </div>-->
    <!--                        <div class="form-control-box">-->
    <!--                            <div class="form-control">-->
    <!--                                <input id="test" type="text" class="mc-control">-->
    <!--                            </div>-->
    <!--                            <small>input test</small>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="form-inline">-->
    <!--                        <div class="form-label">-->
    <!--                            <label for="testar">input textarea test admon goli asdw </label>-->
    <!--                            <small>input test</small>-->
    <!--                        </div>-->
    <!--                        <div class="form-control-box">-->
    <!--                            <div class="form-control">-->
    <!--                                <textarea id="testar"  rows="6" class="mc-control"></textarea>-->
    <!--                            </div>-->
    <!--                            <small>input textarea</small>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="form-inline">-->
    <!--                        <div class="form-label">-->
    <!--                            <label for="radio">radio button</label>-->
    <!--                            <small>input test</small>-->
    <!--                        </div>-->
    <!--                        <div class="form-control-box">-->
    <!--                            <div class="form-control" id="radio">-->
    <!--                                <label class="mc-radio">-->
    <!--                                    <input type="radio" name="test" value="test" class="mc-control">-->
    <!--                                    <span>test</span>-->
    <!--                                </label>-->
    <!--                                <label class="mc-radio">-->
    <!--                                    <input type="radio" name="test" value="admin" class="mc-control">-->
    <!--                                    <span>test</span>-->
    <!--                                </label>-->
    <!--                            </div>-->
    <!--                            <small>input textarea</small>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="form-inline">-->
    <!--                        <div class="form-label">-->
    <!--                            <label for="switch">switch</label>-->
    <!--                        </div>-->
    <!--                        <div class="form-control-box">-->
    <!--                            <div class="form-control">-->
    <!--                                <div class="mc-switch">-->
    <!--                                    <input id="switch" type="checkbox" class="mc-control">-->
    <!--                                    <label for="switch">Toggle this switch element</label>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="form-inline">-->
    <!--                        <div class="form-label">-->
    <!--                            <label for="switch">code editor</label>-->
    <!--                        </div>-->
    <!--                        <div class="form-control-box">-->
    <!--                            <div class="form-control">-->
    <!--                                <textarea class="moco-code-editor"-->
    <!--                                          data-settings='--><?php
    //                                          global $moco_framework;
    //                                          echo $moco_framework->getCodeEditorConfig(['type' => 'text/css'], true);
    //                                          ?><!--'-->
    <!--                                ></textarea>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="form-inline">-->
    <!--                        <div class="form-label">-->
    <!--                            <label for="checkbox">checkbox</label>-->
    <!--                            <small>input test</small>-->
    <!--                        </div>-->
    <!--                        <div class="form-control-box">-->
    <!--                            <div class="form-control inline" id="checkbox">-->
    <!--                                <label class="mc-checkbox">-->
    <!--                                    <input type="checkbox" name="test" value="test" class="mc-control">-->
    <!--                                    <span>test</span>-->
    <!--                                </label>-->
    <!--                                <label class="mc-checkbox">-->
    <!--                                    <input type="checkbox" name="test" value="admin" class="mc-control">-->
    <!--                                    <span>test</span>-->
    <!--                                </label>-->
    <!--                            </div>-->
    <!--                            <small>input textarea</small>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="form-inline">-->
    <!--                        <div class="form-label">-->
    <!--                            <label for="checkbox">button</label>-->
    <!--                            <small>input test</small>-->
    <!--                        </div>-->
    <!--                        <div class="form-control-box">-->
    <!--                            <div class="form-control" id="button">-->
    <!--                                <button class="mc-btn">Text Button</button>-->
    <!--                            </div>-->
    <!--                            <small>input textarea</small>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="form-inline">-->
    <!--                        <div class="form-label">-->
    <!--                            <label for="checkbox">image select</label>-->
    <!--                            <small>input test</small>-->
    <!--                        </div>-->
    <!--                        <div class="form-control-box">-->
    <!--                            <div class="form-control row" id="button">-->
    <!--                                <input type="url" class="mc-control">-->
    <!--                                <button class="mc-btn btn-danger btn-clear btn-icon" data-moco-clear="button">-->
    <!--                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">-->
    <!--                                        <path d="M3.35288 8.95043C4.00437 6.17301 6.17301 4.00437 8.95043 3.35288C10.9563 2.88237 13.0437 2.88237 15.0496 3.35288C17.827 4.00437 19.9956 6.17301 20.6471 8.95044C21.1176 10.9563 21.1176 13.0437 20.6471 15.0496C19.9956 17.827 17.827 19.9956 15.0496 20.6471C13.0437 21.1176 10.9563 21.1176 8.95044 20.6471C6.17301 19.9956 4.00437 17.827 3.35288 15.0496C2.88237 13.0437 2.88237 10.9563 3.35288 8.95043Z" stroke="currentColor" stroke-width="1.5"/>-->
    <!--                                        <path d="M13.7678 10.2322L10.2322 13.7677M13.7678 13.7677L10.2322 10.2322" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>-->
    <!--                                    </svg>-->
    <!--                                </button>-->
    <!--                                <button class="mc-btn" data-moco-selection="button">Text Button</button>-->
    <!--                            </div>-->
    <!--                            <small>input textarea</small>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="form-inline">-->
    <!--                        <div class="form-label">-->
    <!--                            <label for="checkbox">wp editor</label>-->
    <!--                            <small>test</small>-->
    <!--                        </div>-->
    <!--                        <div class="form-control-box">-->
    <!--                            <div class="form-control" id="button">-->
    <!--                                --><?php
    //                                    $content = "";
    //                                    $editor_id = "e_id";
    //                                    $editor_settings = array(
    //                                        'teeny' => false,
    //                                        'editor_height' => 160,
    //                                        'quicktags' => array( 'buttons' => 'strong,em,del,close' ),
    //                                        'media_buttons' => true );
    //
    //                                    wp_editor( $content, $editor_id ,$editor_settings );
    //                                ?>
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
                </div>
                
            </div>
        </main>
    </form>
</div>


