<?php
/**
 * Bootstraps the CMBRE2 process
 *
 * @category  WordPress_Plugin
 * @package   CMBRE2
 * @author    WebDevStudios
 * @license   GPL-2.0+
 * @link      http://webdevstudios.com
 */
if ( ! defined( 'WPINC' ) ) exit;
/**
 * Fires when CMBRE2 is included/loaded
 *
 * Should be used to to add metaboxes. See example-functions.php
 */
do_action( 'cmbre2_init' );

/**
 * For back-compat. Does the dirtywork of instantiatiating all the
 * CMBRE2 instances for the cmbre2_meta_boxes filter
 * @since  2.0.2
 */
$all_meta_boxes_config = apply_filters( 'cmbre2_meta_boxes', array() );
foreach ( (array) $all_meta_boxes_config as $meta_box_config ) {
	new CMBRE2( $meta_box_config );
}

/**
 * Fires after all CMBRE2 instances are created
 */
do_action( 'cmbre2_init_before_hookup' );

/**
 * Get all created metaboxes, and instantiate CMBRE2_hookup
 * on metaboxes which require it.
 * @since  2.0.2
 */
foreach ( CMBRE2_Boxes::get_all() as $cmb ) {
	if ( $cmb->prop( 'hookup' ) ) {
		$hookup = new CMBRE2_hookup( $cmb );
	}
}

/**
 * Fires after CMBRE2 initiation process has been completed
 */
do_action( 'cmbre2_after_init' );

// End. That's it, folks! //
