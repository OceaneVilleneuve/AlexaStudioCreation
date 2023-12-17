<?php
/* 
*      Robo Gallery     
*      Version: 3.2.14 - 40722
*      By Robosoft
*
*      Contact: https://robogallery.co/ 
*      Created: 2021
*      Licensed under the GPLv2 license - http://opensource.org/licenses/gpl-2.0.php

 */

if (! defined('WPINC')) {
    exit;
}

class RoboGallerySettings
{
    private $active_tab = '';

    public function __construct()
    {
        $this->init();
    }

    public function init()
    {
        $this->hooks();
    }

    public function hooks()
    {
        add_action('admin_init', array( $this, 'settings'));
        add_action('admin_menu', array( $this, 'menu')) ;
    }

    public function menu()
    {
        add_submenu_page('edit.php?post_type=robo_gallery_table', 'Settings Robo Gallery', 'Settings', 'manage_options', 'robo-gallery-settings', array( $this, 'page'));
    }

    public function settings()
    {
        register_setting('robo_gallery_settings_cache', ROBO_GALLERY_PREFIX.'cache');

        register_setting('robo_gallery_settings_comp', ROBO_GALLERY_PREFIX.'categoryShow');
        register_setting('robo_gallery_settings_comp', ROBO_GALLERY_PREFIX.'jqueryVersion');
        register_setting('robo_gallery_settings_comp', ROBO_GALLERY_PREFIX.'fontLoad');
        register_setting('robo_gallery_settings_comp', ROBO_GALLERY_PREFIX.'delay');
        register_setting('robo_gallery_settings_comp', ROBO_GALLERY_PREFIX.'debugEnable');
        register_setting('robo_gallery_settings_comp', ROBO_GALLERY_PREFIX.'expressPanel');

        register_setting('robo_gallery_settings_post', ROBO_GALLERY_PREFIX.'postShowText');
        register_setting('robo_gallery_settings_post', ROBO_GALLERY_PREFIX.'cloneBlock');
        
        register_setting('robo_gallery_settings_seo', ROBO_GALLERY_PREFIX.'seo');

        register_setting('robo_gallery_settings_assets', ROBO_GALLERY_PREFIX.'cssFiles');
        register_setting('robo_gallery_settings_assets', ROBO_GALLERY_PREFIX.'jsFiles');


        $args = array(
			'type' => 'string', 
			'sanitize_callback' => 'sanitize_key',
			'default' => NULL,
		);
        register_setting('robo_gallery_settings_youtube', ROBO_GALLERY_PREFIX.'youtubeApiKey', $args);
        register_setting('robo_gallery_settings_youtube', ROBO_GALLERY_PREFIX.'youtubeCacheTime');

        register_setting('robo_gallery_settings_protection', ROBO_GALLERY_PREFIX.'protectionEnable');

        register_setting('robo_gallery_settings_watermark', ROBO_GALLERY_PREFIX.'watermarkEnable');
        register_setting('robo_gallery_settings_watermark', ROBO_GALLERY_PREFIX.'watermarkPosition');
    }

    public function createTabs($name, $label)
    {
        echo '<a href="edit.php?post_type=robo_gallery_table&page=robo-gallery-settings&tab='.$name.'" class="nav-tab '.($this->active_tab == $name ? 'nav-tab-active' : '').'">'.$label.'</a>';
    }

    public function tabs()
    {
        echo '<h2 class="nav-tab-wrapper">';
        $this->createTabs('cache', __('Cache Settings', 'robo-gallery'));
        $this->createTabs('assets', __('Custom JS\CSS', 'robo-gallery'));
        $this->createTabs('comp', __('Compatibility Settings', 'robo-gallery'));
        $this->createTabs('post', __('Create Post Settings', 'robo-gallery'));
        $this->createTabs('seo', __('SEO Optimization', 'robo-gallery'));
        $this->createTabs('youtube', __('Youtube API', 'robo-gallery'));
        $this->createTabs('protection', __('Content Protection', 'robo-gallery'));
      //  $this->createTabs('watermark', __('Watermark', 'robo-gallery'));
        echo '</h2>';
    }


    public function page()
    {
        $this->active_tab =   isset($_GET[ 'tab' ]) ? sanitize_title($_GET[ 'tab' ]) : 'cache' ;

        echo '<div class="wrap">';
        echo '<h1>'.__('Robo Gallery Settings', 'robo-gallery').'</h1>';
        
        settings_errors();

        $this->tabs();

        echo '<form method="post" action="options.php?tab='.$this->active_tab.'">';
                
        echo '<table class="form-table">';

        if ($this->active_tab == 'cache') {
            settings_fields('robo_gallery_settings_cache');
            do_settings_sections('robo_gallery_settings_cache');
            $this->cacheOptions();
        } elseif ($this->active_tab == 'comp') {
            settings_fields('robo_gallery_settings_comp');
            do_settings_sections('robo_gallery_settings_comp');
            $this->compOptions();
        } elseif ($this->active_tab == 'assets') {
            settings_fields('robo_gallery_settings_assets');
            do_settings_sections('robo_gallery_settings_assets');
            $this->assetsOptions();
        } elseif ($this->active_tab == 'post') {
            settings_fields('robo_gallery_settings_post');
            do_settings_sections('robo_gallery_settings_post');
            $this->postOptions();
        } elseif ($this->active_tab == 'youtube') {
            settings_fields('robo_gallery_settings_youtube');
            do_settings_sections('robo_gallery_settings_youtube');
            $this->youtubeOptions();
        } elseif ($this->active_tab == 'protection') {
            settings_fields('robo_gallery_settings_protection');
            do_settings_sections('robo_gallery_settings_protection');
            $this->protectionOptions();
        } elseif ($this->active_tab == 'watermark') {
            settings_fields('robo_gallery_settings_watermark');
            do_settings_sections('robo_gallery_settings_watermark');
            $this->watermarkOptions();
        } else {
            settings_fields('robo_gallery_settings_seo');
            do_settings_sections('robo_gallery_settings_seo');
            $this->seoOptions();
        }
                
        echo '</table>';

        submit_button();

        echo '</form>';
        echo '</div>';
    }

    public function watermarkOptions()
    {
        $watermarkEnable = get_option(ROBO_GALLERY_PREFIX.'watermarkEnable', 0);
        $watermarkPosition = get_option(ROBO_GALLERY_PREFIX.'watermarkPosition', 'bl');
        $watermarkText = get_option(ROBO_GALLERY_PREFIX.'watermarkText', '');
        ?>
            <tr>
                <th scope="row"><?php _e('Watermark', 'robo-gallery'); ?></th>
                <td>
                    <fieldset>
                        <legend class="screen-reader-text"><span><?php _e('Enable'); ?></span></legend>
                        <label title='<?php _e('Enable'); ?>'>
                            <input type='radio' name='<?php echo ROBO_GALLERY_PREFIX.'watermarkEnable'; ?>' value='1' <?php if ($watermarkEnable) {
            echo " checked='checked'";
        } ?> /> <?php _e('Enable'); ?>
                        </label><br />
                        <label title='<?php _e('Disable'); ?>'>
                            <input type='radio' name='<?php echo ROBO_GALLERY_PREFIX.'watermarkEnable'; ?>' value='0' <?php if (!$watermarkEnable) {
            echo " checked='checked'";
        } ?>  /> <?php _e('Disable'); ?>
                        </label><br />			
                    </fieldset>
                </td>
            </tr>        

            
            <tr>
                <th scope="row"><?php _e('Watermark Text', 'robo-gallery'); ?></th>
                <td>
                    <fieldset>
                        <input name="<?php echo ROBO_GALLERY_PREFIX.'watermarkText'; ?>" id="<?php echo ROBO_GALLERY_PREFIX.'watermarkText'; ?>" value="<?php echo $watermarkText; ?>" class="regular-text code" type="text">
                        <span id="robo-watermark-text-preview"></span>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <th scope="row"><?php _e('Watermark alignment', 'robo-gallery'); ?></th>
                <td>
                    <fieldset>              
                        <table style="border: 1px solid silver ;">
                            <tr>
                                <td><input type='radio' name='<?php echo ROBO_GALLERY_PREFIX.'watermarkPosition'; ?>' value='tr' <?php if ($watermarkPosition=='tr') { echo " checked='checked'"; } ?> /></td>
                                <td><input type='radio' name='<?php echo ROBO_GALLERY_PREFIX.'watermarkPosition'; ?>' value='tc' <?php if ($watermarkPosition=='tc') { echo " checked='checked'"; } ?> /></td>
                                <td><input type='radio' name='<?php echo ROBO_GALLERY_PREFIX.'watermarkPosition'; ?>' value='tl' <?php if ($watermarkPosition=='tl') { echo " checked='checked'"; } ?> /></td>
                            </tr>
                            <tr>
                                <td><input type='radio' name='<?php echo ROBO_GALLERY_PREFIX.'watermarkPosition'; ?>' value='cr' <?php if ($watermarkPosition=='cr') { echo " checked='checked'"; } ?> /></td>
                                <td><input type='radio' name='<?php echo ROBO_GALLERY_PREFIX.'watermarkPosition'; ?>' value='cc' <?php if ($watermarkPosition=='cc') { echo " checked='checked'"; } ?> /></td>
                                <td><input type='radio' name='<?php echo ROBO_GALLERY_PREFIX.'watermarkPosition'; ?>' value='cl' <?php if ($watermarkPosition=='cl') { echo " checked='checked'"; } ?> /></td>
                            </tr>
                            <tr>
                                <td><input type='radio' name='<?php echo ROBO_GALLERY_PREFIX.'watermarkPosition'; ?>' value='br' <?php if ($watermarkPosition=='br') { echo " checked='checked'"; } ?> /></td>
                                <td><input type='radio' name='<?php echo ROBO_GALLERY_PREFIX.'watermarkPosition'; ?>' value='bc' <?php if ($watermarkPosition=='bc') { echo " checked='checked'"; } ?> /></td>
                                <td><input type='radio' name='<?php echo ROBO_GALLERY_PREFIX.'watermarkPosition'; ?>' value='bl' <?php if ($watermarkPosition=='bl') { echo " checked='checked'"; } ?> /></td>
                            </tr>
                        </table>          
                    </fieldset>
                    <p class="description">
                        <?php _e("Select the watermark alignment.", 'robo-gallery'); ?>
                    </p>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    
                </td>
            </tr>
        <?php
    }

    public function protectionOptions()
    {
        $option_protection = get_option(ROBO_GALLERY_PREFIX.'protectionEnable', 0); ?>
            <tr>
                <th scope="row"><?php _e('Right click', 'robo-gallery'); ?></th>
                <td>
                    <fieldset>
                        <legend class="screen-reader-text"><span><?php _e('Enable'); ?></span></legend>
                        <label title='<?php _e('Enable'); ?>'>
                            <input type='radio' name='<?php echo ROBO_GALLERY_PREFIX.'protectionEnable'; ?>' value='1' <?php if ($option_protection) {
            echo " checked='checked'";
        } ?> /> <?php _e('Enable'); ?>
                        </label><br />
                        <label title='<?php _e('Disable'); ?>'>
                            <input type='radio' name='<?php echo ROBO_GALLERY_PREFIX.'protectionEnable'; ?>' value='0' <?php if (!$option_protection) {
            echo " checked='checked'";
        } ?>  /> <?php _e('Disable'); ?>
                        </label><br />			
                    </fieldset>
                </td>
            </tr>
        <?php
    }

    public function youtubeOptions()
    {
        $option_youtube = sanitize_key( get_option(ROBO_GALLERY_PREFIX.'youtubeApiKey', '') );
        ?>
            <tr>
                <th scope="row"><?php _e('Youtube Api Key', 'robo-gallery'); ?></th>
                <td>
                    <fieldset>
                        <input name="<?php echo ROBO_GALLERY_PREFIX.'youtubeApiKey'; ?>" id="<?php echo ROBO_GALLERY_PREFIX.'youtubeApiKey'; ?>" value="<?php echo $option_youtube; ?>" class="regular-text code" type="text">
                        <span id="robo-youtube-api-resultcheck"></span>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p class="description">
                        <?php
                            echo sprintf(
                                '%s <a href="%s" target="_black">%s</a> %s',
                                __("If you don't know how to create Youtube API key please follow ", 'robo-gallery'),
                                'https://developers.google.com/youtube/v3/getting-started',
                                __("this official instruction ", 'robo-gallery'),
                                __("for the google developers console", 'robo-gallery')
                            ); ?>
                    </p>
                </td>
            </tr>
        <?php

        $option_youtube_cache = (int) get_option(ROBO_GALLERY_PREFIX.'youtubeCacheTime', '12');

        if (!$option_youtube_cache) {
            $option_youtube_cache = 12;
        } ?>
            <tr id="robo-options-block-youtube-api">
                <th scope="row"><?php _e('Clear cache timeout', 'robo-gallery'); ?></th>
                <td>
                    <fieldset>
                        <input name="<?php echo ROBO_GALLERY_PREFIX.'youtubeCacheTime'; ?>" id="<?php echo ROBO_GALLERY_PREFIX.'youtubeCacheTime'; ?>" value="<?php echo $option_youtube_cache; ?>" class="small-text" type="text"> hours
                    </fieldset>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p class="description">
                        <?php _e("This is timeout for the clear youtube gallery cache option. Value in hours for the cleaning period of the cached resources.", 'robo-gallery'); ?>
                    </p>
                </td>
            </tr>
        <?php
    }

    public function cacheOptions()
    {
        $option_cache = (int) get_option(ROBO_GALLERY_PREFIX.'cache', '12');

        if (!$option_cache) {
            $option_cache = 12;
        } ?>
            <tr>
                <th scope="row"><?php _e('Clear cache timeout', 'robo-gallery'); ?></th>
                <td>
                    <fieldset>
                        <input name="<?php echo ROBO_GALLERY_PREFIX.'cache'; ?>" id="<?php echo ROBO_GALLERY_PREFIX.'cache'; ?>" value="<?php echo $option_cache; ?>" class="small-text" type="text"> hours
                    </fieldset>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p class="description">
                        <?php _e("This is timeout for the clear gallery cache option. Value in hours for the cleaning period of the cached resources.", 'robo-gallery'); ?>
                    </p>
                </td>
            </tr>
        <?php
    }

    public function assetsOptions()
    {
        $cssFiles = trim(get_option(ROBO_GALLERY_PREFIX.'cssFiles', ''));
        $jsFiles = trim(get_option(ROBO_GALLERY_PREFIX.'jsFiles', '')); ?>
            <tr>
                <th scope="row"><?php _e('Css Files', 'robo-gallery'); ?></th>
                <td>
                    <p>
                        <label>
                            <?php _e('Just add custom CSS files to this field.', 'robo-gallery'); ?>		
                        </label>
                    </p>
                    <textarea 
                        name="<?php echo ROBO_GALLERY_PREFIX.'cssFiles'; ?>" 
                        id="<?php echo ROBO_GALLERY_PREFIX.'cssFiles'; ?>" 
                        class="large-text code" 
                        cols="50" 
                        rows="5"><?php echo $cssFiles; ?></textarea>
                    <p class="description">
                        <?php _e('Path for included files from the WordPress Root Directory', 'robo-gallery'); ?><br/>
                        <?php _e('Sample path:', 'robo-gallery'); ?> <code>wp-content/plugins/robo-gallery/css/custom.css</code>							
                    </p>
                </td>
            </tr>
            <tr>
                <th scope="row"><?php _e('JS Files', 'robo-gallery'); ?></th>
                <td>
                    <p>
                        <label>
                            <?php _e('Just add custom JS files to this field.', 'robo-gallery'); ?>
                        </label>
                    </p>
                    <textarea 
                        name="<?php echo ROBO_GALLERY_PREFIX.'jsFiles'; ?>" 
                        id="<?php echo ROBO_GALLERY_PREFIX.'jsFiles'; ?>"  
                        class="large-text code" 
                        cols="50" 
                        rows="5"><?php echo $jsFiles; ?></textarea>
                    <p class="description">
                        <?php _e('Path for included files from the WordPress Root Directory', 'robo-gallery'); ?><br/>
                        <?php _e('Sample path:', 'robo-gallery'); ?> <code>wp-content/plugins/robo-gallery/js/custom.js</code>							
                    </p>
                </td>
            </tr>
            
        <?php
    }


    public function compOptions()
    {
        ?>
            <tr>
                <th scope="row"><?php _e('Categories Manager', 'robo-gallery'); ?></th>
                <td>
                    <fieldset>
                        <legend class="screen-reader-text"><span><?php _e('Show'); ?></span></legend>
                        <label title='<?php _e('Show'); ?>'>
                            <input type='radio' name='<?php echo ROBO_GALLERY_PREFIX.'categoryShow'; ?>' value='0' <?php if (!get_option(ROBO_GALLERY_PREFIX.'categoryShow', '')) {
            echo " checked='checked'";
        } ?> /> <?php _e('Show'); ?>
                        </label><br />
                        <label title='<?php _e('Hide'); ?>'>
                            <input type='radio' name='<?php echo ROBO_GALLERY_PREFIX.'categoryShow'; ?>' value='1' <?php if (get_option(ROBO_GALLERY_PREFIX.'categoryShow')==1) {
            echo " checked='checked'";
        } ?>  /> <?php _e('Hide'); ?>
                        </label><br />			
                    </fieldset>
                </td>
            </tr>
            <tr>
                <th scope="row"><?php _e('jQuery Version', 'robo-gallery'); ?></th>
                <?php 
                    $jqueryVersion = get_option(ROBO_GALLERY_PREFIX.'jqueryVersion', 'robo'); 
                ?>
                <td>
                    <fieldset>
                        <legend class="screen-reader-text"><span><?php _e('jQuery Version', 'robo-gallery'); ?></span></legend>
                        <label title='<?php _e('Default'); ?>'>
                            <input type='radio' name='<?php echo ROBO_GALLERY_PREFIX.'jqueryVersion'; ?>' value='build' <?php if ( $jqueryVersion=='build') {
            echo " checked='checked'";
        } ?> /> <?php _e('Default'); ?>
                        </label><br />
                        <label title='<?php _e('Alternative', 'robo-gallery'); ?>'>
                            <input type='radio' name='<?php echo ROBO_GALLERY_PREFIX.'jqueryVersion'; ?>' value='robo' <?php if ( $jqueryVersion =='robo') {
            echo " checked='checked'";
        } ?>  /> <?php _e('Alternative', 'robo-gallery'); ?>
                        </label>
                        <p class="description">[for the case if you have jQuery version conflicts on page]</p>
                        <br />
                        <label title='<?php _e('Forced include', 'robo-gallery'); ?>'>
                            <input type='radio' name='<?php echo ROBO_GALLERY_PREFIX.'jqueryVersion'; ?>' value='forced' <?php if ($jqueryVersion =='forced') {
            echo " checked='checked'";
        } ?>  /> <?php _e('Forced include', 'robo-gallery'); ?>
                        </label>
                        <p class="description">[ for the case when Your theme do not use WordPress API ]</p>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <th scope="row"><?php _e('Font Awesome', 'robo-gallery'); ?></th>
                <td>
                    <fieldset>
                        <legend class="screen-reader-text"><span><?php _e('Font Awesome', 'robo-gallery'); ?></span></legend>
                        <label title='<?php _e('Load'); ?>'>
                            <input type='radio' name='<?php echo ROBO_GALLERY_PREFIX.'fontLoad'; ?>' value='on' <?php if (get_option(ROBO_GALLERY_PREFIX.'fontLoad', 'on')=='on') {
            echo " checked='checked'";
        } ?> /> <?php _e('Load'); ?>
                        </label><br />
                        <label title='<?php _e('Don\'t load', 'robo-gallery'); ?>'>
                            <input type='radio' name='<?php echo ROBO_GALLERY_PREFIX.'fontLoad'; ?>' value='off' <?php if (get_option(ROBO_GALLERY_PREFIX.'fontLoad')=='off') {
            echo " checked='checked'";
        } ?>  /> <?php _e('Don\'t load', 'robo-gallery'); ?>
                        </label>
                        <p class="description">[ <?php _e('for the case if Your theme already have awesome fonts loaded', 'robo-gallery'); ?>' ]</p>
                    </fieldset>
                </td>
            </tr>
            
            <tr>
                <th scope="row"><?php _e('Size Calculations Delay', 'robo-gallery'); ?></th>
                <td>
                    <input name="<?php echo ROBO_GALLERY_PREFIX.'delay'; ?>" id="<?php echo ROBO_GALLERY_PREFIX.'delay'; ?>" value="<?php echo (int) get_option(ROBO_GALLERY_PREFIX.'delay', '1000'); ?>" class="small-text" type="text"> ms.
                </td>
            </tr>
            <tr>
                <th scope="row"><?php _e('Debug'); ?></th>
                <td>
                    <fieldset>
                        <legend class="screen-reader-text"><span><?php _e('Enable'); ?></span></legend>
                        <label title='<?php _e('Enable'); ?>'>
                            <input type='radio' name='<?php echo ROBO_GALLERY_PREFIX.'debugEnable'; ?>' value='1' <?php if (get_option(ROBO_GALLERY_PREFIX.'debugEnable')==1) {
            echo " checked='checked'";
        } ?> /> <?php _e('Enable'); ?>
                        </label><br />
                        <label title='<?php _e('Disable'); ?>'>
                            <input type='radio' name='<?php echo ROBO_GALLERY_PREFIX.'debugEnable'; ?>' value='0' <?php if (!get_option(ROBO_GALLERY_PREFIX.'debugEnable', '')) {
            echo " checked='checked'";
        } ?>  /> <?php _e('Disable'); ?>
                        </label><br />			
                    </fieldset>
                </td>
            </tr>

            <tr>
                <th scope="row"><?php _e('Express panel', 'robo-gallery'); ?></th>
                <td>
                    <fieldset>
                        <legend class="screen-reader-text"><span><?php _e('Enable'); ?></span></legend>
                        <label title='<?php _e('Enable'); ?>'>
                            <input type='radio' name='<?php echo ROBO_GALLERY_PREFIX.'expressPanel'; ?>' value='1' <?php if (get_option(ROBO_GALLERY_PREFIX.'expressPanel')==1) {
            echo " checked='checked'";
        } ?> /> <?php _e('Enable'); ?>
                        </label><br />
                        <label title='<?php _e('Disable'); ?>'>
                            <input type='radio' name='<?php echo ROBO_GALLERY_PREFIX.'expressPanel'; ?>' value='0' <?php if (!get_option(ROBO_GALLERY_PREFIX.'expressPanel', '')) {
            echo " checked='checked'";
        } ?>  /> <?php _e('Disable'); ?>
                        </label><br />			
                    </fieldset>
                </td>
            </tr>
        <?php
    }


    public function postOptions()
    {
        ?>
            <tr>
                <th scope="row"><?php _e('Text Block', 'robo-gallery'); ?></th>
                <td>
                    <fieldset>
                        <legend class="screen-reader-text"><span><?php _e('Show Text', 'robo-gallery'); ?></span></legend>
                        <label title='<?php _e('Show'); ?>'>
                            <input type='radio' name='<?php echo ROBO_GALLERY_PREFIX.'postShowText'; ?>' value='0' <?php if (!get_option(ROBO_GALLERY_PREFIX.'postShowText', '')) {
            echo " checked='checked'";
        } ?> /> <?php _e('Show'); ?>
                        </label><br />
                        <label title='<?php _e('Hide'); ?>'>
                            <input type='radio' name='<?php echo ROBO_GALLERY_PREFIX.'postShowText'; ?>' value='1' <?php if (get_option(ROBO_GALLERY_PREFIX.'postShowText')=='1') {
            echo " checked='checked'";
        } ?>  /> <?php _e('Hide'); ?>
                        </label><br />			
                    </fieldset>
                </td>
            </tr>

            <tr>
                <th scope="row"><?php _e('Clone Block', 'robo-gallery'); ?></th>
                <td>
                    <fieldset>
                        <legend class="screen-reader-text"><span><?php _e('Show Clone Block', 'robo-gallery'); ?></span></legend>
                        <label title='<?php _e('Show'); ?>'>
                            <input type='radio' name='<?php echo ROBO_GALLERY_PREFIX.'cloneBlock'; ?>' value='0' <?php if (!get_option(ROBO_GALLERY_PREFIX.'cloneBlock', '')) {
            echo " checked='checked'";
        } ?> /> <?php _e('Show'); ?>
                        </label><br />
                        <label title='<?php _e('Hide'); ?>'>
                            <input type='radio' name='<?php echo ROBO_GALLERY_PREFIX.'cloneBlock'; ?>' value='1' <?php if (get_option(ROBO_GALLERY_PREFIX.'cloneBlock')=='1') {
            echo " checked='checked'";
        } ?>  /> <?php _e('Hide'); ?>
                        </label><br />			
                    </fieldset>
                </td>
            </tr>
        <?php
    }


    public function seoOptions()
    {
    ?>
        <tr>
        <th scope="row"><?php _e('Add SEO content', 'robo-gallery'); ?></th>
            <td>
                <fieldset>
                    <legend class="screen-reader-text"><span><?php _e('Enable [thumbs]', 'robo-gallery'); ?></span></legend>
                    <label title='<?php _e('Enable [thumbs]', 'robo-gallery'); ?>'>
                        <input type='radio' name='<?php echo ROBO_GALLERY_PREFIX.'seo'; ?>' value='2' <?php
                            echo get_option(ROBO_GALLERY_PREFIX.'seo')=='2' ?  " checked='checked'" : '';
                        ?> /> <?php _e('Enable [thumbs]', 'robo-gallery'); ?>
                    </label><br />

                    <legend class="screen-reader-text"><span><?php _e('Enable [thumbs + link]', 'robo-gallery'); ?></span></legend>
                    <label title='<?php _e('Enable [thumbs + link]', 'robo-gallery'); ?>'>
                        <input type='radio' name='<?php echo ROBO_GALLERY_PREFIX.'seo'; ?>' value='1' <?php
                        echo get_option(ROBO_GALLERY_PREFIX.'seo')=='1' ?  " checked='checked'" : ''; ?> /> 
                        <?php _e('Enable [thumbs + link]', 'robo-gallery'); ?>
                    </label><br />
                    <label title='<?php _e('Disable'); ?>'>
                        <input type='radio' name='<?php echo ROBO_GALLERY_PREFIX.'seo'; ?>' value='0' <?php
                        echo !get_option(ROBO_GALLERY_PREFIX.'seo') ?  " checked='checked'" : ''; ?> />
                        <?php _e('Disable', 'robo-gallery'); ?>
                    </label><br />			
                </fieldset>
            </td>
        </tr>
    <?php
    }
}
        
$settings = new RoboGallerySettings();
