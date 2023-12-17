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
if ( ! defined( 'WPINC' ) ) exit;

if( class_exists('RoboGalleryConfig')  ){
	$guide = RoboGalleryConfig::guides();
	if( isset($guide) && count($guide) ){ 

		$guides_group = new_cmbre2_box( array(
		    'id'            => ROBO_GALLERY_PREFIX . 'guides_metabox',
		    'title'         => __( 'Video Guides', 'robo-gallery' ),
		    'object_types'  => array( ROBO_GALLERY_TYPE_POST ),
		    'context'       => 'side',
		    'priority'      => 'high',
		    'show_names'	=> false,
		));

		$guides_group->add_field( array(
		    'id'            => ROBO_GALLERY_PREFIX.'guide_desc',
		    'type'          => 'title',
		    'before_row'    => '<a href="'.$guide['link'].'" target="_blank" class="rbs_guide rbs_guide_'.$guide['class'].'">'.$guide['text'].'</a>',
		    'after_row'     => '',
		));
	}
}