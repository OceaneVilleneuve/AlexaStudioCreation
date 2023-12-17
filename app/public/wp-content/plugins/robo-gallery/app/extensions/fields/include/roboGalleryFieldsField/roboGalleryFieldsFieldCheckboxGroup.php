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


class roboGalleryFieldsFieldCheckboxGroup extends roboGalleryFieldsField{

	protected function normalize($values){
		if (!is_array($values)) {
			$values = array();
		}
		
		foreach ($values as $name => $value) {
			$value = parent::normalize($value);
			$values[$name] = $value ? 1 : 0;
		}

		return $values;
	}
}
