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

class  roboGalleryModuleSeoV1 extends roboGalleryModuleAbstraction{
	
	public $seoContent = '';

	public function init(){		
		$this->core->addEvent('gallery.init', array($this, 'initGrid'));
	}

	public function initGrid(){		

		$seo = get_option( ROBO_GALLERY_PREFIX.'seo', '' );
		if( $seo ){
				$this->seoContent .= 	($seo==1 ? '<a href="'.$link.'" alt="'.$lightboxText.'" title="'.$lightboxText.'">' : '')
						.'<img src="'.$img['thumb'].'" title="'.$lightboxText.'" alt="'.$lightboxText.'" >'
						.($seo==1 ? '</a>' : '' );
		}

		if($this->seoContent){
			$this->seoContent = '<div style="display:none;">'.$this->seoContent.'</div>';
		}
	}

}
