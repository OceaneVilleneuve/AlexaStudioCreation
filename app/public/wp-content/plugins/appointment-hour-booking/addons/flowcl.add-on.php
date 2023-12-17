<?php
/*

*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

require_once dirname( __FILE__ ).'/base.addon.php';

if( !class_exists( 'CPAPPB_FlowCL' ) && class_exists( 'CPAPPB_BaseAddon' ))
{

    class CPAPPB_FlowCL extends CPAPPB_BaseAddon
    {

        /************* ADDON SYSTEM - ATTRIBUTES AND METHODS *************/
		protected $addonID = "addon-FlowCL-20230707";
		protected $name = "Flow.cl Payments Integration";
		protected $description;
        public $category = 'Payment Gateways Integration';
        public $help = 'https://apphourbooking.dwbooster.com/customdownloads/flow-payment-gateway-chile.png';
        protected $default_label = 'Pay with Flow.cl';



        /************************ CONSTRUCT *****************************/

        function __construct()
        {
			$this->description = __("The add-on adds support for Flow.cl payments", 'appointment-hour-booking' );
            // Check if the plugin is active

        } // End __construct





    } // End Class

    // Main add-on code
    $cpappb_FlowCL_obj = new CPAPPB_FlowCL();

	// Add addon object to the objects list
	global $cpappb_addons_objs_list;
	$cpappb_addons_objs_list[ $cpappb_FlowCL_obj->get_addon_id() ] = $cpappb_FlowCL_obj;

}
