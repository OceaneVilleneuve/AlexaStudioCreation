<?php 
/*
*      Robo Gallery By Robosoft    
*      Version: 2.6.18
*      Contact: https://robosoft.co/robogallery/ 
*      Available only in  https://robosoft.co/robogallery/ 
*/
if ( ! defined( 'WPINC' ) ) exit;

$voting_box = new_cmbre2_box( array(
    'id'            => ROBO_GALLERY_PREFIX . 'voting_metabox',
    'title'         => __( 'Additional Services', 'robo-gallery' ),
    'object_types'  => array( ROBO_GALLERY_TYPE_POST ),
    'context'       => 'side',
    'priority'      => 'low',
    'show_names'	=> false,
));

$voting_box->add_field( array(
    'id'            => ROBO_GALLERY_PREFIX.'voting_desc',
    'type'          => 'title',
    'before_row'    => '
	    <div class="rbs_voting">
	    	<div class="bottom_space">
	    		<a href="https://app.upzilla.co/create-ticket" target="_blank" class="btn btn-info">
	    			'.__("Customization of the plugins. Development from scratch, fixing any WordPress conflicts, security issues, and security audit", 'robo-gallery').'
	    		</a> <br />
	    		
	    	</div>
	    	<div class="rbs_block">
	    		<a href="https://app.upzilla.co/create-ticket" target="_blank" class="btn btn-info">'.__( 'Custom software development', 'robo-gallery' ).'</a>
	    	</div>
	    </div>
    ',
    'after_row'     => '',
));