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

class  roboGalleryModuleGridColumnsV1 extends roboGalleryModuleAbstraction{
	
	private $resolutions = array();
	private $columns = array();
	private $defaultColumnCount = 0;

	public function init(){
		$this->initColumns();
	}


	private function initDefaultColumns(){
		if( isset($this->columns['autowidth']) ){

			$this->jsOptions->setValue( 'columnWidth', 'auto' );

			if( isset($this->columns['colums']) && $this->columns['colums']  ){
				$this->defaultColumnCount = $this->columns['colums'];
				$this->jsOptions->setValue( 'columns',  $this->columns['colums'] );
			}
			
		}elseif( isset($this->columns['width']) ){
			$this->jsOptions->setValue( 'columnWidth',  $this->columns['width'] );
		}
	}


	private function	initResolutions(){
		if( !is_array($this->resolutions) || !count($this->resolutions) ) return ;
		$this->jsOptions->setValue( 'resolutions', $this->resolutions );		
	}


	private function	initColumns(){
		$this->columns = $this->getMeta('colums');

		if( !is_array($this->columns) || !count($this->columns) ) return ;

		$this->initDefaultColumns();
		
		$this->addWidthRow( 1 );
		$this->addWidthRow( 2 );
		$this->addWidthRow( 3 );		

		$this->initResolutions();
	}


	private function addWidthRow( $index ){ 
		$ret = array();

		if( isset( $this->columns['autowidth'.$index]) ){
			$ret['columnWidth'] = 'auto';
			if( isset( $this->columns['colums'.$index]) && $this->columns['colums'.$index] )  $ret['columns'] =  $this->columns['colums'.$index];
		} elseif( isset( $this->columns['width'.$index]) && $this->columns['width'.$index] )  $ret['columnWidth'] = $this->columns['width'.$index];
		
		if( !count($ret) ) return ;
		
		switch ($index) {
			case '1': $r = '960'; break;
			case '2': $r = '650'; break;
			case '3': $r = '450'; break;
		}
		$ret['maxWidth'] = $r;

		$this->resolutions[] = $this->fixColumns($index, $ret);
	}


	private function fixColumnsSetColumnCount( $index, $ret ){
		if( $index==1 && isset($ret['columns']) ) $ret['columns'] = $this->defaultColumnCount ? $this->defaultColumnCount : 1 ;
		if( $index==2 && isset($ret['columns']) ) $ret['columns'] = 1;
		if( $index==3 && isset($ret['columns']) ) $ret['columns'] = 1;
		return $ret;
	}

	private function fixColumns( $index, $ret ){
		$galleryTypeSource = $this->getMeta('gallery_type_source');

		$needFixForType = array( 
			'mosaicpro-1', 'mosaicpro-2', 'mosaicpro-3', 'mosaicpro-4', 'mosaicpro-5', 'mosaicpro-6',
			'mosaicpro-1', 'mosaicpro-2', 'mosaicpro-3', 'mosaicpro-4', 'mosaicpro-5', 'mosaicpro-6', 'mosaicpro-7', 'mosaicpro-8',
		);

		if( in_array( $galleryTypeSource, $needFixForType)  ){
			$ret = $this->fixColumnsSetColumnCount( $index, $ret );
		}

		return $ret;
	}
}