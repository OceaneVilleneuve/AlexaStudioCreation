<?php
/**
 * A CMBRE2 object instance registry for storing every CMBRE2 instance.
 *
 * @category  WordPress_Plugin
 * @package   CMBRE2
 * @author    WebDevStudios
 * @license   GPL-2.0+
 * @link      http://webdevstudios.com
 */
if ( ! defined( 'WPINC' ) ) exit;
class CMBRE2_Boxes {

	/**
	 * Array of all metabox objects
	 * @var   array
	 * @since 2.0.0
	 */
	protected static $cmbre2_instances = array();

	/**
	 * Add a CMBRE2 instance object to the registry
	 * @since 1.X.X
	 * @param CMBRE2  $cmb_instance CMBRE2 instance
	 */
	public static function add( CMBRE2 $cmb_instance ) {
		self::$cmbre2_instances[ $cmb_instance->cmb_id ] = $cmb_instance;
	}

	/**
	 * Remove a CMBRE2 instance object to the registry
	 * @since  1.X.X
	 * @param  string $cmb_id A CMBRE2 instance id
	 */
	public static function remove( $cmb_id ) {
		if ( array_key_exists( $cmb_id, self::$cmbre2_instances ) ) {
			unset( self::$cmbre2_instances[ $cmb_id ] );
		}
	}

	/**
	 * Retrieve a CMBRE2 instance by cmb id
	 * @since  1.X.X
	 * @param  string $cmb_id A CMBRE2 instance id
	 *
	 * @return mixed          False or CMBRE2 object instance
	 */
	public static function get( $cmb_id ) {
		if ( empty( self::$cmbre2_instances ) || empty( self::$cmbre2_instances[ $cmb_id ] ) ) {
			return false;
		}

		return self::$cmbre2_instances[ $cmb_id ];
	}

	/**
	 * Retrieve all CMBRE2 instances registered
	 * @since  1.X.X
	 * @return array Array of all registered metaboxes
	 */
	public static function get_all() {
		return self::$cmbre2_instances;
	}

}
