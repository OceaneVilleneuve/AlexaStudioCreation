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

class roboGalleryFieldsFieldCheckbox extends roboGalleryFieldsField{

	protected function normalize($value){
		$value = parent::normalize($value);
		return $value ? 1 : 0;
	}

	protected function getDefaultOptions(){
		return array(
			'size' 		=> 'large',
			'onLabel' 	=> __('On', 'robo-gallery'),
			'offLabel' 	=> __('Off', 'robo-gallery'),
		);
	}
}
