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

if ( ! defined( 'WPINC' ) ) exit;

class rbs_widget_last extends WP_Widget {

  function __construct(){
    parent::__construct(
      'rbs_widget', 
      __( 'Robo Gallery Widget' , 'robo-gallery' ),
      array( 'description' => __( "Publish gallery on your website.", 'robo-gallery' ), ) 
    );
  }

  public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance['title'] );
    $galleryId = $instance['galleryId'];

    echo $args['before_widget'];
    if( ! empty( $title ) )     echo $args['before_title'] . $title . $args['after_title'];
    
    if( function_exists( 'rbs_pro_widget' ) ){
    	rbs_pro_widget($galleryId);
    }
    
    if(!ROBO_GALLERY_TYR) echo _e( 'This widget available in Pro version','robo-gallery');
    echo $args['after_widget'];
  }


  public function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) ) {
      $title = $instance[ 'title' ];
    } else {
      $title = __( 'New gallery', 'robo-gallery' );
    }
    
    if ( isset( $instance[ 'galleryId' ] ) ) {
        $galleryId = (int) $instance[ 'galleryId' ];
    }
    else {
        $galleryId = 0;
    }
    $args = array(
      'child_of'     => 0,
      'sort_order'   => 'ASC',
      'sort_column'  => 'post_title',
      'hierarchical' => 1,
      'selected'     => $galleryId,
      'name'         => $this->get_field_name( 'galleryId' ),
      'id'           => $this->get_field_id( 'galleryId' ),
      'echo'    	=> 1,
      'post_type' 	=> 'robo_gallery_table',
      'show_option_none' => 'Last gal'
    );
    ?>
	<?php 
	if(!ROBO_GALLERY_TYR){ ?>
    	<p><a href="https://robosoft.co/go.php?product=gallery&task=gopro" target="_blank"> <?php _e( 'This widget available in Pro version','robo-gallery');?> </a></p>     
	<?php } ?>
	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>">
	 		<?php _e( 'Title' ); ?>:
		</label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id( 'galleryId' ); ?>"><?php _e( 'Gallery:' ); ?></label> 
		<?php wp_dropdown_pages( $args ); ?>
	</p>
	<p><?php _e( 'Configure it in','robo-gallery');?> 
		<a href="edit.php?post_type=robo_gallery_table">
			<?php _e( 'Robo Gallery plugin','robo-gallery');?>
		</a>
	</p>
	<script type="text/javascript">jQuery(function(){ jQuery('#<?php echo $this->get_field_id( 'galleryId' ); ?>').addClass('widefat'); });</script>
    <?php 
  }

  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['galleryId'] = ( ! empty( $new_instance['galleryId'] ) ) ? (int) $new_instance['galleryId'] : 0;
    return $instance;
  }
}

function rbs_load_widget(){ register_widget( 'rbs_widget' );  }

add_action( 'widgets_init', 'rbs_load_widget' );