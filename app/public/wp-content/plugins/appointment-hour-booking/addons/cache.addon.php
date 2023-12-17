<?php
/*
    Shared Availability Addon
*/
require_once dirname( __FILE__ ).'/base.addon.php';

if( !class_exists( 'CPAPPB_Cache' ) )
{
    class CPAPPB_Cache extends CPAPPB_BaseAddon
    {

        /************* ADDON SYSTEM - ATTRIBUTES AND METHODS *************/
		protected $addonID = "addon-Cache-20180607";
		protected $name = "Cache Booking Availability";
		protected $description;
        public $category = 'Improvements';
        public $help = 'https://apphourbooking.dwbooster.com/customdownloads/load-speed-cache.png';

        /************************ CONSTRUCT *****************************/

        function __construct()
        {
			$this->description = __("The add-on keeps a cache of the available times for faster booking form loading.", 'appointment-hour-booking' );
        } // End __construct



    } // End Class

    // Main add-on code
    $CPAPPB_Cache_obj = new CPAPPB_Cache();

	// Add addon object to the objects list
	global $cpappb_addons_objs_list;
	$cpappb_addons_objs_list[ $CPAPPB_Cache_obj->get_addon_id() ] = $CPAPPB_Cache_obj;
}

