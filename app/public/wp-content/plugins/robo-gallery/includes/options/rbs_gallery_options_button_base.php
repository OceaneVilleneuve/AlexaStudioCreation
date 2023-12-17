<?php

if ( ! defined( 'WPINC' ) ) exit;

$button_group = new_cmbre2_box( array(
    'id' 			=> ROBO_GALLERY_PREFIX . 'button_metabox',
    'title' 		=> __( 'Menu Options', 'robo-gallery' ),
    'object_types' 	=> array( ROBO_GALLERY_TYPE_POST ),
    'show_names' 	=> false,
    'context' 		=> 'normal',
));


$button_group->add_field( array(
	 'id'            => ROBO_GALLERY_PREFIX.'menuUpdate',
    'type'          => 'title',    
    'before_row'    => 
    '<div class="roboGalleryFields">
    	<div class="row">
    		<div class="content small-12 columns text-center" style="margin: 14px 0 -7px;"> '.
				rbsGalleryUtils::getProButton( __('Add All Pro Features + Advanced Menu + Tags Mode + Gallery Search', 'robo-gallery') ).'
			</div>
		</div>
    </div>
	',    
));




$button_group->add_field( array(
	'name' 			=> __('Menu', 'robo-gallery' ),
	'id' 			=> ROBO_GALLERY_PREFIX . 'menu',
	'type' 			=> 'switch',
	'default'		=> rbs_gallery_set_checkbox_default_for_new_post(1),
	'bootstrap_style'=> 1,
	'showhide'		=> 1,
	'depends' 		=> 	'.rbs_menu_options',
	'before_row'	=> '
	<div class="rbs_block">
	<a id="rbs_menu_options_link"></a>
',
	'after_row'		=> '
	
		<div class="rbs_menu_options">
	',
));


$button_group->add_field( array(
	'name' 			=> __('Root Label', 'robo-gallery' ),
	'id' 			=> ROBO_GALLERY_PREFIX . 'menuRoot',
	'default'		=> rbs_gallery_set_checkbox_default_for_new_post(1),
	'type' 			=> 'switch',
	'bootstrap_style'=> 1,
	'depends' 		=> 	'.rbs_menu_root_text',
	'showhide'		=> 1,
	'before_row'	=>'
	<div role="tabpanel">
			<ul class="nav nav-tabs robo-menu-tabs" role="tablist">
				<li role="presentation" class="active">
					<a href="#menu_label" aria-controls="menu_label" role="tab" data-toggle="tab">'.__('Menu Labels', 'robo-gallery' ).'</a>
				</li>
				<li role="presentation"   class="disabled">
					<a   >'.__('Menu Style', 'robo-gallery' ).'</a>
					<span class="robo-pro-label">pro</span>
				</li>
				<li role="presentation"  class="disabled">
					<a >'.__('Search', 'robo-gallery' ).'</a>
					<span class="robo-pro-label">pro</span>
				</li>
			</ul>
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="menu_label"><br/>',
	'after_row'		=>'
					<div class="rbs_menu_root_text">',
));

$button_group->add_field( array(
    'name'    => __('Root Label Text','robo-gallery'),
    'default' => __('All', 'robo-gallery' ),
    'id'	  => ROBO_GALLERY_PREFIX .'menuRootLabel',
    'type'    => 'rbstext',
    'after_row'		=> '
					</div>
				</div>
			</div>
		</div>
	</div>
</div>',
));


$button_group->add_field( array(
	'id' 			=> 	ROBO_GALLERY_PREFIX . 'menuSelfImages',
	'type' 			=> 	'hidden',	
	'default'		=> 	rbs_gallery_set_checkbox_default_for_new_post(1),	
));

$button_group->add_field( array(
	'id' 			=> 	ROBO_GALLERY_PREFIX . 'menuTag',
	'type' 			=> 	'hidden',	
	'default'		=> 	'offText',	
));

$button_group->add_field( array(
	'id' 			=> 	ROBO_GALLERY_PREFIX . 'menuTagSort',
	'type' 			=> 	'hidden',	
	'default'		=> 	'',	
));



$button_group->add_field( array(
	'id' 			=> 	ROBO_GALLERY_PREFIX . 'menuSelf',
	'type' 			=> 	'hidden',	
	'default'		=> 	rbs_gallery_set_checkbox_default_for_new_post(1),
));


$button_group->add_field( array(
	'id' 			=> 	ROBO_GALLERY_PREFIX . 'buttonFill',
	'type' 			=> 	'hidden',	
	'default'		=> 	'flat',
));

$button_group->add_field( array(
	'id' 			=> 	ROBO_GALLERY_PREFIX . 'buttonColor',
	'type' 			=> 	'hidden',	
	'default'		=> 	'blue',
));

$button_group->add_field( array(
	'id' 			=> 	ROBO_GALLERY_PREFIX . 'buttonType',
	'type' 			=> 	'hidden',	
	'default'		=> 	'normal',
));

$button_group->add_field( array(
	'id' 			=> 	ROBO_GALLERY_PREFIX . 'buttonSize',
	'type' 			=> 	'hidden',	
	'default'		=> 	'large',
));

$button_group->add_field( array(
	'id' 			=> 	ROBO_GALLERY_PREFIX . 'buttonAlign',
	'type' 			=> 	'hidden',	
	'default'		=> 	'left',
));

$button_group->add_field( array(
	'id' 			=> 	ROBO_GALLERY_PREFIX . 'paddingLeft',
	'type' 			=> 	'hidden',	
	'default'		=> 	rbs_gallery_set_checkbox_default_for_new_post(5),
));

$button_group->add_field( array(
	'id' 			=> 	ROBO_GALLERY_PREFIX . 'paddingBottom',
	'type' 			=> 	'hidden',	
	'default'		=> 	rbs_gallery_set_checkbox_default_for_new_post(10),
));


$button_group->add_field( array(
	'id' 			=> 	ROBO_GALLERY_PREFIX . 'searchEnable',
	'type' 			=> 	'hidden',	
	'default'		=> 	rbs_gallery_set_checkbox_default_for_new_post(0),
));

$button_group->add_field( array(
	'id' 			=> 	ROBO_GALLERY_PREFIX . 'searchColor',
	'type' 			=> 	'hidden',	
	'default'		=> 	'rgba(0, 0, 0)',
));

$button_group->add_field( array(
	'id' 			=> 	ROBO_GALLERY_PREFIX . 'searchLabel',
	'type' 			=> 	'hidden',	
	'default'		=> 	__('search', 'robo-gallery' ),
));