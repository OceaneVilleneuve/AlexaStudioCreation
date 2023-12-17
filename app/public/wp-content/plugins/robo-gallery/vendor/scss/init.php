<?php

if ( ! defined( 'WPINC' ) )  die;

if( function_exists('rbsSCSS_init') ) return ;
	
function rbsSCSS_init() {

	if( rbsSCSS_isLegacyVersion() ){
		require_once ROBO_GALLERY_VENDOR_PATH.'scss/scssphp-0.12/scss.inc.php';
		return ;
	} 
		
	require_once ROBO_GALLERY_VENDOR_PATH.'scss/scssphp-1.10.0/scss.inc.php';
}

function rbsSCSS_isLegacyVersion(){
	if( !function_exists('version_compare') || !defined('PHP_VERSION') ) return true;
	if( version_compare(PHP_VERSION, '7.2') < 0 ) return true;

	return false;
}