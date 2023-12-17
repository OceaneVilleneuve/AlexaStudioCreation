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

class  roboGalleryModuleAddTexts extends roboGalleryModuleAbstraction{
	
	public function init(){
		if( $pretext = $this->getMetaCur('pretext') ) $this->core->setContent( '<div>'.$pretext.'</div>', 'Begin');
		
		if( $aftertext = $this->getMetaCur('aftertext') ) $this->core->setContent( '<div>'.$aftertext.'</div>', 'End');	
	}
}