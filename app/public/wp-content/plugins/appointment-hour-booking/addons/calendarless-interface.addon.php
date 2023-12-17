<?php
/*
    SingleDaysSelection Addon
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

require_once dirname( __FILE__ ).'/base.addon.php';

if( !class_exists( 'CPAPPB_SingleDaysSelection' ) )
{
    class CPAPPB_SingleDaysSelection extends CPAPPB_BaseAddon
    {

        /************* ADDON SYSTEM - ATTRIBUTES AND METHODS *************/
		protected $addonID = "addon-SingleDaysSelection-20230817";
		protected $name = "Single Days Selection Interface";
		protected $description;
        public $category = ' Add-ons included in this plugin version';
        public $help = 'https://apphourbooking.dwbooster.com/customdownloads/single-days-selection-interface.png';

		public function get_addon_form_settings( $form_id )
		{
			global $wpdb, $cp_appb_plugin;

			// Insertion in database
			if(
				isset( $_REQUEST[ 'CPAPPB_SingleDaysSelection_id' ] )
			)
			{
			    $wpdb->delete( $wpdb->prefix.$this->form_table, array( 'formid' => $form_id ), array( '%d' ) );
				$wpdb->insert(
								$wpdb->prefix.$this->form_table,
								array(
									'formid' => $form_id,
                                    'autosel_enable'	 => sanitize_text_field($_REQUEST["sds_autosel_enable"]),
									'numberOfDays'	 => intval($_REQUEST["sds_numberOfDays"]),
                                    'numberOfSlots'	 => intval($_REQUEST["sds_numberOfSlots"]),

                                    'calendarCSSClass'	 => sanitize_text_field($_REQUEST["sds_calendarCSSClass"]),
                                    'formatDate'	 => sanitize_text_field($_REQUEST["sds_formatDate"]),
                                    'str_more_slots'	 => sanitize_text_field($_REQUEST["sds_str_more_slots"]),
                                    'str_more_days'	 => sanitize_text_field($_REQUEST["sds_str_more_days"]),

								),
								array( '%d', '%d', '%d', '%d',
                                       '%s', '%s', '%s', '%s')
							);
			}


			$rows = $wpdb->get_results(
						$wpdb->prepare( "SELECT * FROM ".$wpdb->prefix.$this->form_table." WHERE formid=%d", $form_id )
					);
			if (!count($rows))
			{
                $row["autosel_enable"] = 0;
			    $row["numberOfDays"] = 6;
			    $row["numberOfSlots"] = 6;
                $row["calendarCSSClass"] = "custom";
                $row["formatDate"] = "DD dd MM yy";
                $row["str_more_slots"] = "Show more slots";
                $row["str_more_days"] = "Show more days";
			} else {
                $row["autosel_enable"] = $rows[0]->autosel_enable;
			    $row["numberOfDays"] = $rows[0]->numberOfDays;
			    $row["numberOfSlots"] = $rows[0]->numberOfSlots;;
                $row["calendarCSSClass"] = $rows[0]->calendarCSSClass;
                $row["formatDate"] = $rows[0]->formatDate;
                $row["str_more_slots"] = $rows[0]->str_more_slots;
                $row["str_more_days"] = $rows[0]->str_more_days;
            }


			?>
			<div id="metabox_basic_settings" class="postbox" >
				<h3 class='hndle' style="padding:5px;"><span><?php print esc_html($this->name); ?></span></h3>
				<div class="inside">
				   <input type="hidden" name="CPAPPB_SingleDaysSelection_id" value="1" />
                     <?php _e('Enable alternative time slot selection interface for this booking form?','appointment-hour-booking'); ?>:<br />
                        <?php $option = $row['autosel_enable']; ?>
                        <select name="sds_autosel_enable" id="sds_autosel_enable" onchange="sds_autosel_display_option(this)">
                          <option value="0"<?php if ($option != '1') echo ' selected'; ?>><?php _e('No','appointment-hour-booking'); ?></option>
                          <option value="1"<?php if ($option == '1') echo ' selected'; ?>><?php _e('Yes','appointment-hour-booking'); ?></option>
                         </select><br /><br />

                   <div id="sds_autoselhide_yes" <?php if ($option != '1') echo ' style="display:none"'; ?>>

                     <div style="margin-bottom:10px;">
                        <?php _e('Number of days to display initially','appointment-hour-booking'); ?>:<br />
                        <input type="text" name="sds_numberOfDays" id="sds_numberOfDays" value="<?php echo esc_attr($row["numberOfDays"]); ?>" size="5"><br />
                     </div>

                     <div style="margin-bottom:10px;">
                     <?php _e('Number of slots to display initially','appointment-hour-booking'); ?>:<br />
                        <input type="text" name="sds_numberOfSlots" id="sds_numberOfSlots" value="<?php echo esc_attr($row["numberOfSlots"]); ?>" size="5"><br />
                     </div>

                     <div style="display:none">
                        <?php _e('CSS class for the calendar','appointment-hour-booking'); ?>:<br />
                        <input type="text" name="sds_calendarCSSClass" id="sds_calendarCSSClass" value="<?php echo esc_attr($row["calendarCSSClass"]); ?>"><br />
                     </div>

                     <div style="margin-bottom:10px;">
                        <?php _e('Date format','appointment-hour-booking'); ?>:<br />
                        <input type="text" name="sds_formatDate" id="sds_formatDate" value="<?php echo esc_attr($row["formatDate"]); ?>"><br />
                        <em><a href="https://api.jqueryui.com/datepicker/#:~:text=into%20a%20string%20value%20with%20a%20specified%20format.-,The%20format%20can%20be%20combinations%20of%20the%20following,-%3A" target="_blank"><?php _e('click for sample date formats'); ?></a></em><br>
                     </div>

                     <div style="margin-bottom:10px;">
                        <?php _e('Text for "more slots"','appointment-hour-booking'); ?>:<br />
                        <input type="text" name="sds_str_more_slots" id="sds_str_more_slots" value="<?php echo esc_attr($row["str_more_slots"]); ?>"><br />
                     </div>

                     <div style="margin-bottom:10px;">
                        <?php _e('Text for "more days"','appointment-hour-booking'); ?>:<br />
                        <input type="text" name="sds_str_more_days" id="sds_str_more_days" value="<?php echo esc_attr($row["str_more_days"]); ?>"><br />
                     </div>

                   </div>
                   <script type="text/javascript">
                       function sds_autosel_display_option(item)
                       {
                           if (item.selectedIndex == 1)
                               document.getElementById("sds_autoselhide_yes").style.display = '';
                           else
                               document.getElementById("sds_autoselhide_yes").style.display = 'none';
                       }
                   </script>
				</div>
			</div>
			<?php
		} // end get_addon_form_settings



		/************************ ADDON CODE *****************************/

        /************************ ATTRIBUTES *****************************/

        private $form_table = 'cpappbk_SingleDaysSelection';
        private $_inserted = false;

        /************************ CONSTRUCT *****************************/

        function __construct()
        {
			$this->description = __("Alternative time slot selection interface that does not display a calendar, but only available dates.", 'appointment-hour-booking' );
            // Check if the plugin is active
			if( !$this->addon_is_active() ) return;

            add_filter( 'cpappb_the_customjs', array( &$this, 'insert_script'), 99, 2 );
            add_filter( 'cpappb_the_form', array( &$this, 'insert_style'), 99, 2 );
            add_filter( 'ahb_csslayout', array( &$this, 'pp_ahb_csslayout' ), 10, 2);

            $this->update_database();

        } // End __construct


        /************************ PRIVATE METHODS *****************************/

		/**
         * Create the database tables
         */
        protected function update_database()
		{
			global $wpdb;

			$charset_collate = $wpdb->get_charset_collate();
			$sql = "CREATE TABLE IF NOT EXISTS ".$wpdb->prefix.$this->form_table." (
					id mediumint(9) NOT NULL AUTO_INCREMENT,
                    formid INT NOT NULL,
					autosel_enable INT NOT NULL,
                    numberOfDays INT NOT NULL,
                    numberOfSlots INT NOT NULL,
                    calendarCSSClass TEXT,
                    formatDate TEXT,
                    str_more_slots TEXT,
                    str_more_days TEXT,
					UNIQUE KEY id (id)
				) $charset_collate;";

			$wpdb->query($sql);

		} // end update_database


		/************************ PUBLIC METHODS  *****************************/



        public function pp_ahb_csslayout ($CSSClass, $formid)
        {
            global $wpdb, $cp_appb_plugin;



            $myrow = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix.$this->form_table." WHERE formid=%d AND autosel_enable=1", $formid ) );
            if (!count($myrow))
                return $CSSClass;

            return $myrow[0]->calendarCSSClass.' '.$CSSClass;
        }



		/**
         * Modify insert_script filter
         */
        public function	insert_script( $form_code, $id )
		{
            global $wpdb, $cp_appb_plugin;

            $myrow = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix.$this->form_table." WHERE formid=%d AND autosel_enable=1", $id ) );
            if (!count($myrow))
                return $form_code;

           ob_start();
?>

var numberOfDays = <?php echo intval($myrow[0]->numberOfDays); ?>;
var numberOfSlots = <?php echo intval($myrow[0]->numberOfSlots); ?>;
var calendarCSSClass = "<?php echo esc_js($myrow[0]->calendarCSSClass); ?>";
var formatDate = "<?php echo esc_js($myrow[0]->formatDate); ?>";
var str_more_slots = "<?php echo esc_js($myrow[0]->str_more_slots); ?>";
var str_more_days = "<?php echo esc_js($myrow[0]->str_more_days); ?>";
jQuery(document).one('showHideDepEvent', function(){
    (function($) {
        function initLinks(cal)
        {
            var newFields = '<div id="ahb_links_'+cal+'"></div>';
            $("."+cal).find(".dfield .fieldCalendar").css("display","none");
            $("."+cal).find(".slotsCalendar").css("flex-wrap","wrap");
            $("."+cal).find(".dfield .fieldCalendar").after(newFields);
            $(document).on("click","#ahb_links_"+cal+" div",function(){
                var monthSelected = $(this).attr("m");
                var daySelected = $(this).attr("d");
                if (daySelected * 1 < 10) daySelected = "0"+daySelected;
                if ($("."+cal+" .ui-datepicker-calendar td[class*='d"+monthSelected+"-"+daySelected+"'] a").length > 0)
                    $("."+cal+" .ui-datepicker-calendar td[class*='d"+monthSelected+"-"+daySelected+"'] a").click();
                $("#ahb_links_"+cal+" div").removeClass("activelink");
                $(this).addClass("activelink");
                return false;
            });
        }
        function reloadSlots(cal)
        {
            if ($("."+cal).find(".slots").length==0)
                setTimeout(function(){return reloadSlots(cal);},100);
            else
            {
                var opts = '';
                var i = 0;
                $("."+cal+" .ui-datepicker-calendar td").not(".nonworking,.ui-state-disabled").each(function(){
                    var mm = new Date(parseInt($(this).attr("data-year")),parseInt($(this).attr("data-month")),1);
                    var monthSelected = $.datepicker.formatDate("yy-mm",mm);
                    mm.setDate($(this).text()*1);
                    opts += '<div class="datelink hide" n="0" href="" d="'+$(this).text()+'" m="'+monthSelected+'" i="'+i+'"><a>'+$.datepicker.formatDate(formatDate,mm)+'</a></div>';
                    i++;
                });
                opts += '<div class="more_days" i="0"><a>'+str_more_days+'</a></div>';
                $("#ahb_links_"+cal).html(opts);
                showLinkDay();
                function showLinkDay()
                {
                    var start = parseInt($("."+cal).find(".more_days").attr("i"));
                    for (var i = 0; i < numberOfDays; i++)
                    {
                        $("#ahb_links_"+cal+">div[i='"+(start+i)+"']").removeClass("hide");
                    }
                    $("."+cal).find(".more_days").attr("i",start+i);
                    if ($("#ahb_links_"+cal+">.hide").length==0)
                        $("."+cal).find(".more_days").addClass("hide");
                }
                $(document).off("click",".more_days").on("click",".more_days",function(){
                    showLinkDay();
                    return false;
                });
                moveSlots(calendarCSSClass);
                $(document).on("afterOnChange", function(e,obj){
                   moveSlots(calendarCSSClass);
                });
            }
        }
        function moveSlots(cal)
        {
            var c = $("."+cal);
            var f = c.find(".slots").attr("d").split("-");
            c.find("#ahb_links_"+calendarCSSClass+" div").removeClass("activelink");
            var selectedDate = c.find("#ahb_links_"+calendarCSSClass+" div[d='"+f[2]+"'][m='"+f[0]+"-"+f[1]+"']");
            selectedDate.addClass("activelink");
            var element = c.find('.slotsCalendar');
            selectedDate.append(element);
            if (element.find(".more_slots").length == 0)
            {
                var i = 0;
                element.find(".availableslot").each(function(){
                    $(this).attr("i",i).addClass("hide");
                    i++;
                });
                element.append('<div class="more_slots" i="0"><a>'+str_more_slots+'</a></div>');
                showSlots(false);
            }
            function showSlots(if_click)
            {
                var start = parseInt(selectedDate.attr("n"));
                var more = 0
                if (if_click || (start==0))
                    more = numberOfSlots;
                for (var i = 0; i < start+more; i++)
                    element.find(".availableslot[i='"+(i)+"']").removeClass("hide");
                selectedDate.attr("n",start+more);
                if (element.find(".availableslot.hide").length==0)
                    element.find(".more_slots").addClass("hide");
            }
            $(document).off("click",".more_slots").on("click",".more_slots",function(){
                    showSlots(true);
                    return false;
                });

        }
        initLinks(calendarCSSClass);
        reloadSlots(calendarCSSClass);

    })(jQuery);
});
<?php
            $custom_script = ob_get_contents();
            ob_end_clean();

			return $form_code.$custom_script;
		} // end insert_script


		/**
         * Check if the add-on is used in the form, and inserts the insert_style tag
         */
        public function	insert_style( $form_code, $id )
		{
            global $wpdb, $cp_appb_plugin;

            $is_enable = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix.$this->form_table." WHERE formid=%d AND autosel_enable=1", $id ) );
            if (!count($is_enable))
                return $form_code;
            ob_start();
?>
.datelink{border:1px solid #bbbbbb;border-radius: 15px;margin:5px 0px}
.more_slots{width:100%;text-align:center;padding:5px;border-top:1px solid #bbbbbb !important}
.more_slots a{color:#1278C7;cursor:pointer;display:block}
.datelink > a{text-align:center;display:block;padding:5px;cursor:pointer;}
#fbuilder .slots{border-top:1px solid #bbbbbb !important;}
.datelink.activelink>a{font-weight:bold}
.more_days{border:2px solid #1278C7;border-radius: 15px;padding:5px;margin:5px 0px;text-align:center}
.more_days a{color:#1278C7;cursor:pointer;display:block}
.datelink>a:before{content:"";position:absolute;right:0px;width: 10px;height: 10px;border: none;border-top: 2px solid #1278C7; !important;border-right: 2px solid #1278C7;;background: none;margin: 10px 20px;transform: rotate(135deg);}
.datelink.activelink>a:before {transform: rotate(-45deg) !important;margin: 15px 20px;}
.slots>span{display:none !important}
.slots>br {content: "";}
.slots{padding:10px !important}
#fbuilder .slotsCalendar{display:block}
<?php
            $buffered_contents = ob_get_contents();
            ob_end_clean();


            $form_code = preg_replace( '/<!-- rcadon -->/i', '<style>'.$buffered_contents.'</style><!-- rcadon -->', $form_code );
			return $form_code;
		} // End insert_recaptcha


		/**
		 * mark the item as paid
		 */
		private function _log($adarray = array())
		{
			$h = fopen( __DIR__.'/logs.txt', 'a' );
			$log = "";
			foreach( $_REQUEST as $KEY => $VAL )
			{
				$log .= $KEY.": ".$VAL."\n";
			}
			foreach( $adarray as $KEY => $VAL )
			{
				$log .= $KEY.": ".$VAL."\n";
			}
			$log .= "================================================\n";
			fwrite( $h, $log );
			fclose( $h );
		}



    } // End Class

    // Main add-on code
    $CPAPPB_SingleDaysSelection_obj = new CPAPPB_SingleDaysSelection();

	// Add addon object to the objects list
	global $cpappb_addons_objs_list;
	$cpappb_addons_objs_list[ $CPAPPB_SingleDaysSelection_obj->get_addon_id() ] = $CPAPPB_SingleDaysSelection_obj;
}

