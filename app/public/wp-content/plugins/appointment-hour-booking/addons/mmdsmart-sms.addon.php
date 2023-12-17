<?php
/*
    Reference:
    https://apphourbooking.dwbooster.com/blog/2018/01/30/sms-with-mmdsmart/
    https://api-doc.messagewhiz.com/
*/
require_once dirname( __FILE__ ).'/base.addon.php';

if( !class_exists( 'CPAPPB_MMDSmartSMS' ) )
{
    class CPAPPB_MMDSmartSMS extends CPAPPB_BaseAddon
    {

        /************* ADDON SYSTEM - ATTRIBUTES AND METHODS *************/
		protected $addonID = "addon-MMDSmartSMS-20231128";
		protected $name = "MMD Smart SMS notifications for bookings";
		protected $description;
        public $category = 'SMS Delivery / Text Messaging';
        public $help = 'https://apphourbooking.dwbooster.com/blog/2018/01/30/sms-with-mmdsmart/';



        function __construct()
        {
			$this->description = __("The add-on adds support for MMD Smart (www.mmdsmart.com) SMS notifications", 'appointment-hour-booking' );

        } // End __construct



    } // End Class

    // Main add-on code
    $cpappb_MMDSmartSMS_obj = new CPAPPB_MMDSmartSMS();

	// Add addon object to the objects list
	global $cpappb_addons_objs_list;
	$cpappb_addons_objs_list[ $cpappb_MMDSmartSMS_obj->get_addon_id() ] = $cpappb_MMDSmartSMS_obj;
}

