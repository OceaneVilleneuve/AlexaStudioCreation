<?php
/*
   Automatically cancel pending bookings Addon
*/

require_once dirname( __FILE__ ).'/base.addon.php';

if( !class_exists( 'CPAPPB_AutoCancelStatusManagement' ) )
{
    class CPAPPB_AutoCancelStatusManagement extends CPAPPB_BaseAddon
    {

        /************* ADDON SYSTEM - ATTRIBUTES AND METHODS *************/
		protected $addonID = "addon-AutoCancelStatusaddon-20220314";
		protected $name = "Automatically cancel pending bookings";
		protected $description;
        public $category = 'Improvements';
        public $help = 'https://apphourbooking.dwbooster.com/customdownloads/pending-status-expiration.png';



        function __construct()
        {

			$this->description = __("Automatically cancel pending bookings, expiration time for bookings with pending status.", 'appointment-hour-booking' );

        } // End __construct

    } // End Class

    // Main add-on code
    $CPAPPB_AutoCancelStatusManagement_obj = new CPAPPB_AutoCancelStatusManagement();

    global $cpappb_addons_objs_list;
	$cpappb_addons_objs_list[ $CPAPPB_AutoCancelStatusManagement_obj->get_addon_id() ] = $CPAPPB_AutoCancelStatusManagement_obj;

}


?>