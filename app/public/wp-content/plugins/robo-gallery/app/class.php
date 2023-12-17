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


class roboGalleryClass{

	public function __construct(  ){ 
		$this->hooks();
		$this->ajaxHooks();
	}

	public function hooks(){
		add_action( 'init', array($this, 'init') );
	}

	public function ajaxHooks(){

	}

	public function init(){
		
	}
}