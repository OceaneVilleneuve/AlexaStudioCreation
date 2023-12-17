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



return array(
	'active' => true,
	'order' => 3,
	'settings' => array(
		'id' => 'robo-gallery-slider-interface',
		'title' => __('Interface Options', 'robo-gallery'),
		'screen' => array(  ROBO_GALLERY_TYPE_POST ),
		'context' => 'normal',
		'priority' => 'high', //'default',
		'for' => array( 'gallery_type' => array( 'slider' ) ),		
		'callback_args' => null,
	),
	'view' => 'default',
	'state' => 'open',
	'fields' => array(

		array(
			'type' => 'radio',
			'view' => 'buttons-group',		
			'name' => 'nav_buttons',
			'default' => 'show',
			'label' => __('Navigation buttons', 'robo-gallery'),
			'options' => array(
				'values' => array(
					array(
						'value' => '',
						'label' => 'Hide',
					),
					array(
						'value' => 'show',
						'label' => 'Show',
					),
				),
			),
		),

		array(
			'type' => 'radio',
			'view' => 'buttons-group',		
			'name' => 'nav_scrollbar',
			'default' => 'show',
			'label' => __('Scrollbar', 'robo-gallery'),
			'options' => array(
				'values' => array(
					array(
						'value' => '',
						'label' => 'Hide',
					),
					array(
						'value' => 'show',
						'label' => 'Show',
					),
				),
			),
		),

	
	),
);
