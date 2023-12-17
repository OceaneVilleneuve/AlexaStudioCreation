<?php

if( !class_exists('BookingPress_Core') ){
    
    /**
     * BookingPress_Core
     */
    class BookingPress_Core{
        
        var $action_name;
        var $nonce_action;
        var $nonce_field;
        /**
         * bpa_check_authentication
         *
         * @param  mixed $action_name
         * @param  mixed $check_nonce
         * @param  mixed $nonce_action
         * @return void
         */
        protected function bpa_check_authentication( $action_name = '', $check_nonce = false, $nonce_action = '' ){

            if( '' == $action_name && is_user_logged_in() ){
                return 'error^|^' . esc_html__( "Sorry! You do not have enough permission to perform this action", "bookingpress-appointment-booking");
            }

            $this->action_name = $action_name;
            $has_capability_for_action = $this->bpa_retrieve_capabilities();

            if( false == $has_capability_for_action ){
                return 'error^|^' . esc_html__( "Sorry! You do not have enough permission to perform this action", "bookingpress-appointment-booking");
            }

            if( $check_nonce ){
                $this->nonce_action = $nonce_action;
                $this->nonce_field = !empty( $_REQUEST['_wpnonce'] ) ? sanitize_text_field( $_REQUEST['_wpnonce'] ) : ''; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.MissingUnslash
                $bpa_valid_nonce = $this->bpa_check_nonce();

                if( false == $bpa_valid_nonce ){
                    return 'error^|^' . esc_html__('Sorry, Your request can not be processed due to security reason.', 'bookingpress-appointment-booking');
                }
            }

            return 'success';

        }
                
        /**
         * bpa_retrieve_capabilities
         *
         * @return void
         */
        private function bpa_retrieve_capabilities(){

            if( '' == trim( $this->action_name ) ){
                return false;
            }

            $bpa_caps = array(
                'bookingpress_appointments' => array(
                    'retrieve_appointments',
                    'add_appointments',
                    'edit_appointments',
                    'approve_appointments',
                    'delete_appointments',
                    'search_appointment',
                    'retrieve_customers',
                    'search_customer',
                    'search_user',
                    'get_share_url_generated',
                    'share_generated_url',
                    'retrieve_wp_page_list',
                ),
                'bookingpress_calendar' => array(
                    'retrieve_calendar_appointments',
                    'add_calendar_appointments',
                    'approve_appointments',
                    'edit_appointments',
                    'delete_appointments',
                    'search_appointments',
                    'search_customer',
                    'retrieve_customers',
                    'search_user'
                ),
                'bookingpress_customers' => array(
                    'retrieve_customers',
                    'add_customer',
                    'edit_customer',
                    'delete_customer',
                    'search_customer',
                    'search_user',
                    'upload_customer_avatar',
                    'remove_customer_avatar'
                ),
                'bookingpress_customize' => array(
                    'save_form_fields',
                    'save_mybooking_settings',
                    'retrieve_form_fields',
                    'update_field_position',
                    'save_form_settings',
                    'load_customization'
                ),
                'bookingpress' => array(
                    'retrieve_upcoming_appointments',
                    'retrieve_dashboard_summary',
                    'retrieve_dashboard_chart',
                    'update_upcoming_appointments',
                    'set_dashboard_redirection'
                ),
                'bookingpress_notifications' => array(
                    'save_email_notification',
                    'retrieve_email_notification',
                    'retrieve_email_notification_status',
                    'remove_google_api_account'
                ),
                'bookingpress_payments' => array(
                    'retrieve_payments',
                    'approve_appointments',
                    'add_payments',
                    'edit_payments',
                    'delete_payments',
                    'search_payments',
                    'change_payment_status'
                ),
                'bookingpress_services' => array(
                    'retrieve_categories',
                    'add_categories',
                    'edit_categories',
                    'delete_categories',
                    'search_categories',
                    'retrieve_services',
                    'add_services',
                    'edit_services',
                    'delete_services',
                    'search_services',
                    'update_category_position',
                    'manage_service_position',
                    'upload_service_avatar',
                    'remove_service_avatar'
                ),
                'bookingpress_settings' => array(
                    'save_settings',
                    'retrieve_settings',
                    'delete_holidays',
                    'remove_company_avatar',
                    'save_workhours',
                    'retrieve_workhours',
                    'save_default_daysoff',
                    'retrieve_default_daysoff',
                    'upload_company_avatar',
                    'send_test_email',
                    'save_default_holidays',
                    'retrieve_holidays',
                    'retrieve_currency_status',
                    'view_debug_payment_logs',
                    'clear_debug_payment_logs',
                    'download_debug_payment_logs',
                    'send_test_gmail_email',
                ),
                'bookingpress_addons' => array(
                    'retrieve_addons',
                ),
                'bookingpress_growth_tools' => array(
                    'retrieve_plugin',
                ),
                
            );

            $bpa_caps = apply_filters( 'bookingpress_modify_capability_data', $bpa_caps );

            if( empty( $bpa_caps ) ){
                return false;
            }

            $bpa_user_cap = false;
            foreach( $bpa_caps as $capability => $bpa_action ){
                if( !empty( $bpa_action ) && in_array( $this->action_name, $bpa_action ) && current_user_can( $capability ) ){
                    $bpa_user_cap = true;
                    break;
                }
            }

            return $bpa_user_cap;

        }
        
        /**
         * bpa_check_nonce
         *
         * @return void
         */
        private function bpa_check_nonce(){

            if( empty( $this->nonce_action ) || empty( $this->nonce_field )){
                return false;
            }

            return wp_verify_nonce( $this->nonce_field, $this->nonce_action );

        }
        
        /**
         * core function for the boolean type cast
         *
         * @param  mixed $data_array
         * @return void
         */ 
        public function bookingpress_boolean_type_cast( $data_array ) {

            if (is_array($data_array) ) {
                return array_map(array( $this, __FUNCTION__ ), $data_array);
            } else {
                if(gettype($data_array) == 'boolean') {
                    if($data_array == true) {
                        $data_array = 'true';
                    } else {
                        $data_array = 'false';
                    }
			        return $data_array;
                } else {
                    return $data_array;
                }
            }
        }
        
        /**
         * function to check if the current logged in user is associated with the appointment
         *
         * @param  mixed $appointment_id
         * @return void
         */
        public function bookingpress_check_user_connection_with_appointment( $appointment_id ){

            if( !is_user_logged_in() || empty( $appointment_id ) ){
                return;
            }

            global $tbl_bookingpress_appointment_bookings, $wpdb, $tbl_bookingpress_customers;

            $current_user_id = get_current_user_id();

            $bookingpress_appointment_log_data = $wpdb->get_row($wpdb->prepare("SELECT bookingpress_customer_id FROM {$tbl_bookingpress_appointment_bookings} WHERE bookingpress_appointment_booking_id = %d", $appointment_id), ARRAY_A); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Reason: $tbl_bookingpress_appointment_bookings is table name defined globally.
            $customer_id = $bookingpress_appointment_log_data['bookingpress_customer_id'];

            if( empty( $customer_id ) ){
                return false;
            }

            $bookingpress_get_customer_details = $wpdb->get_row($wpdb->prepare("SELECT bookingpress_customer_id FROM {$tbl_bookingpress_customers} WHERE bookingpress_wpuser_id =%d AND bookingpress_user_status = %d ORDER BY bookingpress_customer_id DESC", $current_user_id, 1), ARRAY_A); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Reason: $tbl_bookingpress_customers is table name defined globally.

            $bpa_appointment_customer_id = $bookingpress_get_customer_details['bookingpress_customer_id'];

            if( $bpa_appointment_customer_id != $customer_id ){
                return false;
            }

            return true;
        }
        
        /**
         * Core function to check capabilities of the user while cancelling the appointment
         *
         * @param  mixed $appointment_id
         * @return void
         */
        public function bookingpress_check_cancel_appointment_permission_func( $appointment_id ){

            /** Prevent further process if the action is performed by non-logged in users or the appointment_id is empty */
            if( !is_user_logged_in() || empty( $appointment_id ) ){
                return false;
            }

            $is_user_connected = $this->bookingpress_check_user_connection_with_appointment( $appointment_id );

            if( false == $is_user_connected ){
                return false;
            }

            global $wpdb, $tbl_bookingpress_appointment_bookings;

            $bookingpress_appointment_log_data = $wpdb->get_row($wpdb->prepare("SELECT bookingpress_service_id,bookingpress_appointment_date,bookingpress_appointment_time FROM {$tbl_bookingpress_appointment_bookings} WHERE bookingpress_appointment_booking_id = %d", $appointment_id), ARRAY_A); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Reason: $tbl_bookingpress_appointment_bookings is table name defined globally.
            
            $allow_cancel_appointment = true;
            $bookingpress_appointment_date = $bookingpress_appointment_log_data['bookingpress_appointment_date'];
            $bookingpress_appointment_time = $bookingpress_appointment_log_data['bookingpress_appointment_time'];

            $bookingpress_appointment_datetime = $bookingpress_appointment_date." ".$bookingpress_appointment_time;                        
            $current_datetime = date( 'Y-m-d H:i:s', current_time('timestamp') );
            $allow_cancel_appointment = true;
            
            if( $bookingpress_appointment_datetime <= $current_datetime ){
                return false;
            }

            $allow_cancel_appointment = apply_filters( 'bookingpress_modify_cancel_appointment_flag', $allow_cancel_appointment, $bookingpress_appointment_log_data );

            if( false == $allow_cancel_appointment ){
                return false;
            }

            return true;
        }

    }
}