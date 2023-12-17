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

class  roboGalleryModuleAssetsSlider extends roboGalleryModuleAssets{

	protected function initJsFilesListAlt(){
		$this->initJsFilesList();
	}

	protected function initJsFilesList(){

		$this->files['js']['robo-gallery-slider'] = array(
			'url' 		=> $this->moduleUrl.'assets/slider/slider.min.js',
			'depend' 	=> array()
		);
		
		$this->files['js']['robo-gallery-slider-script'] = array(
			'url' 		=> $this->moduleUrl.'assets/script.slider.js',
			'depend' 	=> array('robo-gallery-slider')
		);
	}

	protected function initCssFilesList(){

		$this->files['css']['robo-gallery-slider'] = array( 
			'url' 		=> $this->moduleUrl.'assets/slider.css', 
			'depend' 	=> array() 
		);		

		$this->files['css']['robo-gallery-slider-min'] = array( 
			'url' 		=> $this->moduleUrl.'assets/slider/slider.min.css', 
			'depend' 	=> array() 
		);
	}

}
