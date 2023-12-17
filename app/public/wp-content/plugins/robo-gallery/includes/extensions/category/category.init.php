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

if(!function_exists('rbs_gallery_category_init')){
	function rbs_gallery_category_init(){
		rbs_gallery_include('category.class.php',  plugin_dir_path( __FILE__ ) );
		new ROBO_GALLERY_CATEGORY( ROBO_GALLERY_TYPE_POST );
	}
	add_action( 'init', 'rbs_gallery_category_init' );
}