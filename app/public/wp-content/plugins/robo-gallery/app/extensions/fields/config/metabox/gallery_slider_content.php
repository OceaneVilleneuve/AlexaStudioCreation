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
	'order' => 6,
	'settings' => array(
		'id' => 'robo-gallery-slider-content',
		'title' => __('Content Panel Settings ', 'robo-gallery'),
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
			'name' => 'content',
			'default' => 'show',
			'label' => __('Content panel', 'robo-gallery'),
			'options' => array(
				'values' => array(
					array(
						'value' => 'hide',
						'label' => 'Hide',
					),
					array(
						'value' => 'show',
						'label' => 'Show',
					)					
				),
			),
		),

		array(
			'type' => 'radio',
			'view' => 'buttons-group',		
			'name' => 'content_source',
			'default' => 'title',
			'label' => __('Content panel source', 'robo-gallery'),
			'options' => array(
				'values' => array(
					array(
						'value' => 'title',
						'label' => 'Title',
					),
					array(
						'value' => 'caption',
						'label' => 'Caption',
					),
					array(
						'value' => 'desc',
						'label' => 'Description',
					)					
				),
			),
		),

		array(
			'type' => 'radio',
			'view' => 'buttons-group',		
			'name' => 'content_theme',
			'default' => 'light',
			'label' => __('Content panel theme', 'robo-gallery'),
			'options' => array(
				'values' => array(
					array(
						'value' => 'light',
						'label' => 'Light',
					),
					array(
						'value' => 'dark',
						'label' => 'Dark',
					)
				)
			)
		)
		
	)
);
