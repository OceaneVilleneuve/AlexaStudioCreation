<?php
/*
*      Robo Gallery     
*      Version: 1.0
*      By Robosoft
*
*      Contact: https://robosoft.co/robogallery/ 
*      Created: 2015
*      Licensed under the GPLv2 license - http://opensource.org/licenses/gpl-2.0.php
*
*      Copyright (c) 2014-2019, Robosoft. All rights reserved.
*      Available only in  https://robosoft.co/robogallery/ 
*/


function jt_cmbre2_loading_field( $metakey, $post_id = 0 ) {
	echo jt_cmbre2_get_loading_field( $metakey, $post_id );
}


function jt_cmbre2_get_loading_field( $metakey, $post_id = 0 ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	$loading = get_post_meta( $post_id, $metakey, 1 );

	$loading = wp_parse_args( $loading, array(
		'boxesToLoadStart' 		=> '8',
		'boxesToLoad' 			=> '4',
		'lazyLoad' 				=> 'true',
		'waitUntilThumbLoads' 	=> 'true',
		'waitForAllThumbsNoMatterWhat' 	=> 'false',
		'LoadingWord' 			=> 'Loading...', 
		'loadMoreWord' 			=> 'Load More', 
		'noMoreEntriesWord' 	=> 'No More Entries' 
	) );

	$loading = '<div class="cmbre2-loading">';
	$loading .= '<p><strong>Width:</strong> '.esc_html( $loading['boxesToLoadStart'] ).'</p>';
	$loading .= '<p><strong>Width:</strong> '.esc_html( $loading['boxesToLoad'] ).'</p>';
	$loading .= '<p><strong>Width:</strong> '.esc_html( $loading['waitUntilThumbLoads'] ).'</p>';
	$loading .= '<p><strong>Width:</strong> '.esc_html( $loading['waitForAllThumbsNoMatterWhat'] ).'</p>';
	$loading .= '<p><strong>Width:</strong> '.esc_html( $loading['LoadingWord'] ).'</p>';
	$loading .= '<p><strong>Width:</strong> '.esc_html( $loading['loadMoreWord'] ).'</p>';
	$loading .= '<p><strong>Width:</strong> '.esc_html( $loading['noMoreEntriesWord'] ).'</p>';
	$loading = '</div>';

	return apply_filters( 'jt_cmbre2_get_loading_field', $loading );
}

function jt_cmbre2_render_loading_field_callback( $field, $value, $object_id, $object_type, $field_type_object ) {


	$value = wp_parse_args( $value, array(
		'boxesToLoadStart' 				=> '8',
		'boxesToLoad' 					=> '4',
		'lazyLoad' 						=> 'true',
		'waitUntilThumbLoads' 			=> 'true',
		'waitForAllThumbsNoMatterWhat' 	=> 'false',
		'LoadingWord' 					=> 'Loading...', 
		'loadMoreWord' 					=> 'Load More', 
		'noMoreEntriesWord' 			=> 'No More Entries' 
	) );

	?>
	<div>
		<div class="alignleft">
			<label for="<?php echo $field_type_object->_id( 'boxesToLoadStart' ); ?>">
				<strong><?php echo esc_html( $field_type_object->_text( 'loading_width_text', 'boxesToLoadStart' ) ); ?></strong>
			</label>
		
			<?php echo $field_type_object->input( array(
				'name'  => $field_type_object->_name( '[boxesToLoadStart]' ),
				'id'    => $field_type_object->_id( '_boxesToLoadStart' ),
				'value' => ( $value['boxesToLoadStart'] ? (int)  $value['boxesToLoadStart'] : 240) ,
				'type'  => 'number',
				'class' => 'small-text'
			) ); ?> 
		</div>

		<div class="alignleft">
 		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</div>

		<div class="alignleft">
			<label for="<?php echo $field_type_object->_id( '_height' ); ?>'">
				<strong><?php echo esc_html( $field_type_object->_text( 'loading_height_text', 'Height' ) ); ?></strong>
			</label>
			<?php echo $field_type_object->input( array(
				'name'  => $field_type_object->_name( '[height]' ),
				'id'    => $field_type_object->_id( '_height' ),
				'value' => ( $value['height'] ? (int) $value['height'] : 140) ,
				'type'  => 'number',
				'class' => 'small-text'
			) ); ?> px
		</div>
	</div>
	<?php
	echo $field_type_object->_desc( true );

}
add_filter( 'cmbre2_render_loading', 'jt_cmbre2_render_loading_field_callback', 10, 5 );

function cmbre2_sanitize_loading_field( $check, $meta_value, $object_id, $field_args, $sanitize_object ) {

	if ( ! is_array( $meta_value ) || ! $field_args['repeatable'] ) {
		return $check;
	}

	foreach ( $meta_value as $key => $val ) {
		$meta_value[ $key ] = array_map( 'sanitize_text_field', $val );
	}

	return $meta_value;
}
add_filter( 'cmbre2_sanitize_loading', 'cmbre2_sanitize_loading_field', 10, 5 );

function cmbre2_types_esc_loading_field( $check, $meta_value, $field_args, $field_object ) {

	if ( ! is_array( $meta_value ) || ! $field_args['repeatable'] ) {
		return $check;
	}

	foreach ( $meta_value as $key => $val ) {
		$meta_value[ $key ] = array_map( 'esc_attr', $val );
	}

	return $meta_value;
}
add_filter( 'cmbre2_types_esc_loading', 'cmbre2_types_esc_loading_field', 10, 4 );
