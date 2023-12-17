<?php
/*
Documentation: https://apphourbooking.dwbooster.com/documentation
*/
require_once dirname( __FILE__ ).'/base.addon.php';

if( !class_exists( 'CPAPPB_EmailBlacklistaddon' ) )
{
    class CPAPPB_EmailBlacklistaddon extends CPAPPB_BaseAddon
    {

        /************* ADDON SYSTEM - ATTRIBUTES AND METHODS *************/
		protected $addonID = "addon-EmailBlacklistaddon-20230328";
		protected $name = "Email Blacklist";
		protected $description;
        public $category = 'Improvements';
        public $help = 'https://apphourbooking.dwbooster.com/customdownloads/email-blacklist.png';



        /************************ CONSTRUCT *****************************/

        function __construct()
        {

			$this->description = __("The add-on is for preventing bookings from blacklisted emails.", 'appointment-hour-booking' );
        } // End __construct


    } // End Class

    // Main add-on code
    $CPAPPB_EmailBlacklistaddon_obj = new CPAPPB_EmailBlacklistaddon();

    global $cpappb_addons_objs_list;
	$cpappb_addons_objs_list[ $CPAPPB_EmailBlacklistaddon_obj->get_addon_id() ] = $CPAPPB_EmailBlacklistaddon_obj;
}
?>