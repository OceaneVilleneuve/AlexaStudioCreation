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

if ( ! defined( 'WPINC' ) )  die;

$config = array(
	"preview_click" => true,
);

do_action( 'robogallery_field_gallery_init', $config );
$config = apply_filters( 'robogallery_field_gallery_config', $config );

wp_enqueue_media();
wp_enqueue_style('wp-jquery-ui-dialog');
wp_enqueue_script('jquery-ui-dialog');


if(ROBO_GALLERY_DEV){
	wp_enqueue_script(  ROBO_GALLERY_ASSETS_PREFIX.'-field-type-gallery-lib', ROBO_GALLERY_FIELDS_URL.'asset/fields/gallery/gallery.lib.js', array('jquery'), false, true);

	wp_enqueue_script(  ROBO_GALLERY_ASSETS_PREFIX.'-field-sortedjs-lib', ROBO_GALLERY_FIELDS_URL.'asset/sortablejs/sortable.js', array(), false, true);

	wp_register_script( ROBO_GALLERY_ASSETS_PREFIX.'-field-type-gallery', ROBO_GALLERY_FIELDS_URL.'asset/fields/gallery/script.js', array('jquery', ROBO_GALLERY_ASSETS_PREFIX.'-field-sortedjs-lib'), false, true); //.min
} else {
	wp_enqueue_script(  ROBO_GALLERY_ASSETS_PREFIX.'-field-type-gallery-lib', ROBO_GALLERY_FIELDS_URL.'asset/fields/gallery/js/gallery.lib.min.js', array('jquery'), false, true);

	wp_enqueue_script(  ROBO_GALLERY_ASSETS_PREFIX.'-field-sortedjs-lib', ROBO_GALLERY_FIELDS_URL.'asset/sortablejs/sortable.min.js', array(), false, true);

	wp_register_script( ROBO_GALLERY_ASSETS_PREFIX.'-field-type-gallery', ROBO_GALLERY_FIELDS_URL.'asset/fields/gallery/js/script.min.js', array('jquery', ROBO_GALLERY_ASSETS_PREFIX.'-field-sortedjs-lib'), false, true); //.min	
}


wp_enqueue_script(  ROBO_GALLERY_ASSETS_PREFIX.'-field-type-gallery' );


$translation_array = array( 
	'iconUrl' => admin_url('/images/spinner.gif'),		
	'endpoint' => get_rest_url(null, 'robogallery/v1'),
	'preview_click' => $config['preview_click']
);

wp_localize_script( ROBO_GALLERY_ASSETS_PREFIX.'-field-type-gallery', 'roboGalleryFieldGallery', $translation_array );

wp_enqueue_style ( ROBO_GALLERY_ASSETS_PREFIX.'-field-type-gallery', ROBO_GALLERY_FIELDS_URL.'asset/fields/gallery/style.css', array( ), '' );

if ( $value == null || empty( $value ) || $value == ' ' || $value == '' ) $value = '';
?>

<?php if ($label) : ?>
	<div class="field small-12 columns">
		<label>
			<?php echo $label; ?>
		</label>
	</div>
<?php endif; ?>

<div class="content small-12 columns small-centered text-center">

	<button type="button" data-id="<?php echo $id; ?>" class="success large button expanded roboGalleryFieldImagesButton">
		<?php _e('Manage Images', 'robo-gallery'); ?>
	</button>
	<?php $value = is_array($value) ? implode(',', $value) : $value; ?>
	<input id="<?php echo $id; ?>" <?php echo $attributes; ?> type="hidden" name="<?php echo $name; ?>" value="<?php echo $value; ?>">
</div>

<?php if ($description) : ?>
	<div class="content small-12 columns">
		<p class="help-text"><?php echo $description; ?></p>
	</div>
<?php endif; ?>
	
<div class="content small-12 columns">
	<p class="help-text">
		<?php _e('Open images manager and configure <strong>Link</strong>, <strong>Tags</strong> and <strong>Video</strong> (YouTube, Vimeo) for every gallery image.', 'robo-gallery'); ?>
	</p>		
</div>

<div class="content small-12 columns small-centered text-center" style="margin-bottom: 7px; font-size: 16px;font-weight: 600;">
	<span><?php _e('Drag and drop thumbnails to sort the gallery images', 'robo-gallery'); ?></span>
</div>


<div class="content small-12 columns small-centered text-center">
	<div id="robo_gallery_images_preview" class="text-center">
		<span class="spinner is-active" style="margin-right: 50%; margin-bottom: -25px;"></span>
	</div>
</div>


<?php if (!ROBO_GALLERY_TYR) : ?>
	<div class="content small-12 columns text-center" style="margin: 25px 0 -6px;">				
		<?php echo rbsGalleryUtils::getProButton( __('Add All Pro Features + Gallery Images Links', 'robo-gallery') ); ?>		
	</div>
	<br>
	<div class="rb-pro-block">
  		<h5>Advantages of the PRO Version</h5>
  		<div class="rb-pro-desc"><span class="dashicons dashicons-video-alt3"></span> Youtube Playlists and Channels</div>
  		<div class="rb-pro-desc"><span class="dashicons dashicons-format-gallery"></span> 50+ Premium Customizable Gallery Views</div>
		<div class="rb-pro-desc"><span class="dashicons dashicons-admin-settings"></span> 150+ Advanced Configuration Options</div>
		<div class="rb-pro-desc"><span class="dashicons dashicons-insert"></span> Multilevel Menu and Gallery Search</div>
		<div class="rb-pro-desc"><span class="dashicons dashicons-smartphone"></span> Mobile Friendly Lightbox  </div>
		<div class="rb-pro-desc"><span class="dashicons dashicons-smartphone"></span> Customizable Mobile Friendly Grid </div>
		<div class="rb-pro-desc"><span class="dashicons dashicons-insert"></span> Social Sharing in LightBox </div>
		<div class="rb-pro-desc"><span class="dashicons dashicons-insert"></span> Mixed Gallery (Photos/Videos/Linked Images)</div>
	</div>
<?php endif; 

do_action( 'robogallery_field_gallery_end', $config );