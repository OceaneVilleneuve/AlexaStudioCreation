<?php
/*
....
*/
require_once dirname( __FILE__ ).'/base.addon.php';

if( !class_exists( 'CPAPPB_WooCommerceAutoBInfo' ))
{

    class CPAPPB_WooCommerceAutoBInfo extends CPAPPB_BaseAddon
    {

        /************* ADDON SYSTEM - ATTRIBUTES AND METHODS *************/
		protected $addonID = "addon-WooCommerceautobinfo-20220209";
		protected $name = "WooCommerce Billing Info Auto-fill";
		protected $description;
        public $category = 'Integration with other plugins';
        public $help = 'https://apphourbooking.dwbooster.com/customdownloads/woocommerce-billing-autofill.png';



        /************************ CONSTRUCT *****************************/

        function __construct()
        {
			$this->description = __("The add-on adds support for autofilling WooCommerce billing", 'appointment-hour-booking' );
            // Check if the plugin is active


        } // End __construct


    } // End Class

    // Main add-on code
    $CPAPPB_WooCommerceAutoBInfo_obj = new CPAPPB_WooCommerceAutoBInfo();

	// Add addon object to the objects list
	global $cpappb_addons_objs_list;
	$cpappb_addons_objs_list[ $CPAPPB_WooCommerceAutoBInfo_obj->get_addon_id() ] = $CPAPPB_WooCommerceAutoBInfo_obj;

}
