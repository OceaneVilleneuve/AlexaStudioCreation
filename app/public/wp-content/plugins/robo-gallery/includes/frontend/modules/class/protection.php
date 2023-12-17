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

class  roboGalleryModuleProtection extends roboGalleryModuleAbstraction{
	
	public function init(){
		if(!get_option( ROBO_GALLERY_PREFIX.'protectionEnable', 0 )) return ;
		$this->core->addEvent('gallery.init', array($this, 'addProtection'));	
	}

	public function addProtection( ){
		if(!$this->id) return ;
		$this->core->element->setElementAttr('robo-gallery-wrap', 'oncontextmenu', 'return false');
		$this->core->element->setElementAttr('robo-gallery-wrap', 'onselectstart', 'return false');
		$this->core->element->setElementAttr('robo-gallery-wrap', 'ondragstart', 'return false');

		$this->jsOptions->setValue( 'protectionEnable', true );		

	}
}