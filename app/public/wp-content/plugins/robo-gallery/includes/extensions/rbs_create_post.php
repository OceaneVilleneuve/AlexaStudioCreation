<?php
if ( ! defined( 'WPINC' ) )  die;

if(!function_exists('rbs_create_article_button')){
	add_action( 'admin_footer', 'rbs_create_article_button' ); 
	function rbs_create_article_button(){ 
		wp_enqueue_script( 'rbs_create_post', ROBO_GALLERY_URL.'js/admin/extensions/create_post.js', array('jquery'), ROBO_GALLERY_VERSION, false);
			
		echo ' <div id="rbs_actionWindow" class="hidden" '
			.'data-title="'.__('Post manager', 'robo-gallery').'" '
			.'data-close="'.__('Close', 'robo-gallery').'" '
			.'data-button="'.__('Create post', 'robo-gallery').'" '
			.'>';
			?>
			<div id="rbs_actionWindowContent">
				<h3> <span class="dashicons dashicons-update"></span> 
				<?php echo __('Loading', 'robo-gallery'); ?> . . . . </h3>
			</div>
		<?php
		echo '</div>';
	}
}


