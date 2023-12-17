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
	'order' => 1,
	'settings' => array(
		'id' => 'robo_gallery_field_images_ver2',
		'title' => __('Images', 'robo-gallery'),
		'screen' => array( ROBO_GALLERY_TYPE_POST ),
		'for' => array( 'gallery_type' => array(
			'grid',
			'gridpro',
				
			'masonry',
			'masonrypro',

			'mosaic',
			'mosaicpro',
			
			'polaroid', 
			'polaroidpro',
					
			'wallstylepro',

			'slider',
			
			'custom',

			''		
			) 
		),
		'context' => 'normal',
		'priority' => 'high',
		'callback_args' => null,
	),
	'view' => 'default',
	'state' => 'open',
	'style' => null,
	'fields' => array(
		array(
			'type' => 'text',
			'view' => 'images',
			'is_lock' => false,
			'prefix' => null,
			'name' => 'galleryImages',
			'default' => '',
		),
		
	)
);
