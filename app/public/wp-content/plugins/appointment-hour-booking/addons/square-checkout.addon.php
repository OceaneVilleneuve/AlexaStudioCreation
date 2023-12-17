<?php
/*


*/
require_once dirname( __FILE__ ).'/base.addon.php';

if( !class_exists( 'CPAPPB_SquareCheckout' ) )
{
    class CPAPPB_SquareCheckout extends CPAPPB_BaseAddon
    {

        /************* ADDON SYSTEM - ATTRIBUTES AND METHODS *************/
		protected $addonID = "addon-SquareCheckout-20170903";
		protected $name = "Square Checkout payments";
		protected $description;
        public $category = 'Payment Gateways Integration';
        public $help = 'https://apphourbooking.dwbooster.com/customdownloads/square-checkout-addon/square-checkout-configuration.png';


        /************************ CONSTRUCT *****************************/

        function __construct()
        {

			$this->description = __("Support for Square Checkout payment gateway (recommended squareup.com integration)", 'appointment-hour-booking' );
            // Check if the plugin is active

        } // End __construct


    } // End Class

    // Main add-on code
    $CPAPPB_SquareCheckout_obj = new CPAPPB_SquareCheckout();

    global $cpappb_addons_objs_list;
	$cpappb_addons_objs_list[ $CPAPPB_SquareCheckout_obj->get_addon_id() ] = $CPAPPB_SquareCheckout_obj;
}
?>