<?php
if( !class_exists( 'bookingpress_growth_tools') ){
    class bookingpress_growth_tools Extends BookingPress_Core{
        function __construct() {

            global $BookingPress;

            add_action('bookingpress_growth_tools_dynamic_view_load', array( $this, 'bookingpress_load_growth_tools_view_func'), 10 );
            add_action('bookingpress_growth_tools_dynamic_vue_methods', array( $this, 'bookingpress_growth_tools_dynamic_vue_methods_func' ), 10);
            add_action('bookingpress_growth_tools_dynamic_data_fields', array( $this, 'bookingpress_growth_tools_dynamic_data_fields_func' ), 10);
            add_action('wp_ajax_bookingpress_get_armember', array( $this, 'bookingpress_get_armember_func'));         
            add_action('wp_ajax_bookingpress_get_arforms', array( $this, 'bookingpress_get_arforms_func'));         
            add_action('wp_ajax_bookingpress_get_arprice', array( $this, 'bookingpress_get_arprice_func'));         


        }

        function bookingpress_get_armember_func(){

            $bpa_check_authorization = $this->bpa_check_authentication( 'retrieve_plugin', true, 'bpa_wp_nonce' );
            
            if( preg_match( '/error/', $bpa_check_authorization ) ){
                
                $bpa_auth_error = explode( '^|^', $bpa_check_authorization );
                $bpa_error_msg = !empty( $bpa_auth_error[1] ) ? $bpa_auth_error[1] : esc_html__( 'Sorry. Something went wrong while processing the request', 'bookingpress-appointment-booking');

                $response['variant'] = 'error';
                $response['title'] = esc_html__( 'Error', 'bookingpress-appointment-booking');
                $response['msg'] = $bpa_error_msg;

                wp_send_json( $response );
                die;
            }

            if ( ! file_exists( WP_PLUGIN_DIR . '/armember-membership/armember-membership.php' ) ) {
        
                if ( ! function_exists( 'plugins_api' ) ) {
                    require_once ABSPATH . 'wp-admin/includes/plugin-install.php';
                }
                $response = plugins_api(
                    'plugin_information',
                    array(
                        'slug'   => 'armember-membership',
                        'fields' => array(
                            'sections' => false,
                            'versions' => true,
                        ),
                    )
                );
                if ( ! is_wp_error( $response ) && property_exists( $response, 'versions' ) ) {
                    if ( ! class_exists( 'Plugin_Upgrader', false ) ) {
                        require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
                    }
                    $upgrader = new \Plugin_Upgrader( new \Automatic_Upgrader_Skin() );
                    $source   = ! empty( $response->download_link ) ? $response->download_link : '';
                    
                    if ( ! empty( $source ) ) {
                        if ( $upgrader->install( $source ) === true ) {
                            activate_plugin( 'armember-membership/armember-membership.php' );
                            $arm_install_activate = 1; 
                        }
                    }
                } else {
                    $source_url = 'https://www.armemberplugin.com/armember_lite_version/lite_plugin_install_api.php';
                    $get_custom_response = wp_remote_get( $source_url, array( 'method' => 'GET') );
                    if(!is_wp_error($get_custom_response)) {
                        $get_custom_response_body = json_decode(wp_remote_retrieve_body($get_custom_response));
                        if(is_object($get_custom_response_body) && !empty($get_custom_response_body))
                        {
                            if ( ! class_exists( 'Plugin_Upgrader', false ) ) {
                                require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
                            }
                            $upgrader = new \Plugin_Upgrader( new \Automatic_Upgrader_Skin() );
                            $source   = !empty( $get_custom_response_body->download_link ) ? $get_custom_response_body->download_link : '';
                            
                            if ( ! empty( $source ) ) {
                                if ( $upgrader->install( $source ) === true ) {
                                    activate_plugin( 'armember-membership/armember-membership.php' );
                                    $arm_install_activate = 1;
                                }
                            }
                        }
                    }
                }
            }
            if( $arm_install_activate = 1 ){

                $response_data['variant']               = 'success';
                $response_data['title']                 = esc_html__('Success', 'bookingpress-appointment-booking');
                $response_data['msg']                   = esc_html__('ARMember Successfully installed.', 'bookingpress-appointment-booking');
            } else {

                $response_data['variant']               = 'error';
                $response_data['title']                 = esc_html__('error', 'bookingpress-appointment-booking');
                $response_data['msg']                   = esc_html__('Somthing went wrong please try again later.', 'bookingpress-appointment-booking');
            }
            wp_send_json($response_data);
            die;
        }

        function bookingpress_get_arforms_func() {

            $bpa_check_authorization = $this->bpa_check_authentication( 'retrieve_plugin', true, 'bpa_wp_nonce' );
            
            if( preg_match( '/error/', $bpa_check_authorization ) ){
                
                $bpa_auth_error = explode( '^|^', $bpa_check_authorization );
                $bpa_error_msg = !empty( $bpa_auth_error[1] ) ? $bpa_auth_error[1] : esc_html__( 'Sorry. Something went wrong while processing the request', 'bookingpress-appointment-booking');

                $response['variant'] = 'error';
                $response['title'] = esc_html__( 'Error', 'bookingpress-appointment-booking');
                $response['msg'] = $bpa_error_msg;

                wp_send_json( $response );
                die;
            }

            if ( ! file_exists( WP_PLUGIN_DIR . '/arforms-form-builder/arforms-form-builder.php' ) ) {
        
                if ( ! function_exists( 'plugins_api' ) ) {
                    require_once ABSPATH . 'wp-admin/includes/plugin-install.php';
                }
                $response = plugins_api(
                    'plugin_information',
                    array(
                        'slug'   => 'arforms-form-builder',
                        'fields' => array(
                            'sections' => false,
                            'versions' => true,
                        ),
                    )
                );
                if ( ! is_wp_error( $response ) && property_exists( $response, 'versions' ) ) {
                    if ( ! class_exists( 'Plugin_Upgrader', false ) ) {
                        require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
                    }
                    $upgrader = new \Plugin_Upgrader( new \Automatic_Upgrader_Skin() );
                    $source   = ! empty( $response->download_link ) ? $response->download_link : '';
                    
                    if ( ! empty( $source ) ) {
                        if ( $upgrader->install( $source ) === true ) {
                            activate_plugin( 'arforms-form-builder/arforms-form-builder.php' );
                            $arf_install_activate = 1; 
                        }
                    }
                } else {
                    $source_url = 'https://www.arformsplugin.com/arf_misc/arforms-form-builder/arforms-form-builder-latest.zip';
                    $get_custom_response = wp_remote_get( $source_url, array( 'method' => 'GET') );
                    if(!is_wp_error($get_custom_response)) {
                        $get_custom_response_body = json_decode(wp_remote_retrieve_body($get_custom_response));
                        if(is_object($get_custom_response_body) && !empty($get_custom_response_body))
                        {
                            if ( ! class_exists( 'Plugin_Upgrader', false ) ) {
                                require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
                            }
                            $upgrader = new \Plugin_Upgrader( new \Automatic_Upgrader_Skin() );
                            $source   = !empty( $get_custom_response_body->download_link ) ? $get_custom_response_body->download_link : '';
                            
                            if ( ! empty( $source ) ) {
                                if ( $upgrader->install( $source ) === true ) {
                                    activate_plugin( 'arforms-form-builder/arforms-form-builder.php' );
                                    $arf_install_activate = 1;
                                }
                            }
                        }
                    }
                }
            }
            if( $arf_install_activate = 1 ){

                $response_data['variant']               = 'success';
                $response_data['title']                 = esc_html__('Success', 'bookingpress-appointment-booking');
                $response_data['msg']                   = esc_html__('ARForms Successfully installed.', 'bookingpress-appointment-booking');
            } else {

                $response_data['variant']               = 'error';
                $response_data['title']                 = esc_html__('error', 'bookingpress-appointment-booking');
                $response_data['msg']                   = esc_html__('Somthing went wrong please try again later.', 'bookingpress-appointment-booking');
            }
            wp_send_json($response_data);
            die;
        }
        function bookingpress_get_arprice_func() {

            $bpa_check_authorization = $this->bpa_check_authentication( 'retrieve_plugin', true, 'bpa_wp_nonce' );
            
            if( preg_match( '/error/', $bpa_check_authorization ) ){
                
                $bpa_auth_error = explode( '^|^', $bpa_check_authorization );
                $bpa_error_msg = !empty( $bpa_auth_error[1] ) ? $bpa_auth_error[1] : esc_html__( 'Sorry. Something went wrong while processing the request', 'bookingpress-appointment-booking');

                $response['variant'] = 'error';
                $response['title'] = esc_html__( 'Error', 'bookingpress-appointment-booking');
                $response['msg'] = $bpa_error_msg;

                wp_send_json( $response );
                die;
            }

            if ( ! file_exists( WP_PLUGIN_DIR . '/arprice-responsive-pricing-table/arprice-responsive-pricing-table.php' ) ) {
        
                if ( ! function_exists( 'plugins_api' ) ) {
                    require_once ABSPATH . 'wp-admin/includes/plugin-install.php';
                }
                $response = plugins_api(
                    'plugin_information',
                    array(
                        'slug'   => 'arprice-responsive-pricing-table',
                        'fields' => array(
                            'sections' => false,
                            'versions' => true,
                        ),
                    )
                );
                if ( ! is_wp_error( $response ) && property_exists( $response, 'versions' ) ) {
                    if ( ! class_exists( 'Plugin_Upgrader', false ) ) {
                        require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
                    }
                    $upgrader = new \Plugin_Upgrader( new \Automatic_Upgrader_Skin() );
                    $source   = ! empty( $response->download_link ) ? $response->download_link : '';
                    
                    if ( ! empty( $source ) ) {
                        if ( $upgrader->install( $source ) === true ) {
                            activate_plugin( 'arprice-responsive-pricing-table/arprice-responsive-pricing-table.php' );
                            $arp_install_activate = 1; 
                        }
                    }
                } else {
                    $source_url = 'https://www.arpriceplugin.com/arp_misc/arprice-pricing-table/arprice-pricing-table-latest.zip';
                    $get_custom_response = wp_remote_get( $source_url, array( 'method' => 'GET') );
                    if(!is_wp_error($get_custom_response)) {
                        $get_custom_response_body = json_decode(wp_remote_retrieve_body($get_custom_response));
                        if(is_object($get_custom_response_body) && !empty($get_custom_response_body))
                        {
                            if ( ! class_exists( 'Plugin_Upgrader', false ) ) {
                                require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
                            }
                            $upgrader = new \Plugin_Upgrader( new \Automatic_Upgrader_Skin() );
                            $source   = !empty( $get_custom_response_body->download_link ) ? $get_custom_response_body->download_link : '';
                            
                            if ( ! empty( $source ) ) {
                                if ( $upgrader->install( $source ) === true ) {
                                    activate_plugin( 'arprice-responsive-pricing-table/arprice-responsive-pricing-table.php' );
                                    $arp_install_activate = 1;
                                }
                            }
                        }
                    }
                }
            }
            if( $arp_install_activate = 1 ){

                $response_data['variant']               = 'success';
                $response_data['title']                 = esc_html__('Success', 'bookingpress-appointment-booking');
                $response_data['msg']                   = esc_html__('ARPrice Successfully installed.', 'bookingpress-appointment-booking');
            } else {

                $response_data['variant']               = 'error';
                $response_data['title']                 = esc_html__('error', 'bookingpress-appointment-booking');
                $response_data['msg']                   = esc_html__('Somthing went wrong please try again later.', 'bookingpress-appointment-booking');
            }
            wp_send_json($response_data);
            die;
        }





        function bookingpress_growth_tools_dynamic_data_fields_func() {

            global $bookingpress_growth_tools_vue_data_fields;

            $bookingpress_growth_tools_vue_data_fields = array ( 
                /* ['bpa_growth_tools'] = array(); */
                'is_display_loader'          => '0',
                'is_disabled'                => false,
                'is_display_save_loader'     => '0',
                'is_display_arforms_save_loader' => '0',
                'is_display_arprice_save_loader' => '0',
            );


            echo wp_json_encode( $bookingpress_growth_tools_vue_data_fields );

        }

        function bookingpress_growth_tools_dynamic_vue_methods_func(){ 
                global $BookingPress,$bookingpress_notification_duration; ?>

                bpa_download_plugins( plugin_data ){
                    
                    if( plugin_data == 'arforms'){
                        const vm = this;
                        vm.is_disabled = true
                        vm.is_display_arforms_save_loader = '1'
						vm.savebtnloading = true

                        var postData = { action:'bookingpress_get_arforms',_wpnonce:'<?php echo esc_html(wp_create_nonce('bpa_wp_nonce')); ?>' };
                        axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( postData ) )
                        .then( function (response) {
                            if(  response.data.variant == 'success' ){
                                vm.$notify({
                                    title: response.data.title,
                                    message: response.data.msg,
                                    type: response.data.variant,
                                    duration:<?php echo intval($bookingpress_notification_duration); ?>,
                                });
                                location.reload();
                            }

                            vm.is_disabled = false
                            vm.is_display_arforms_save_loader = '0'
                        }.bind(this) )
                        .catch( function (error) {
                            console.log(error);
                        });
                    }

                    if( plugin_data == 'armember' ){

                        const vm = this;
                        vm.is_disabled = true
						vm.is_display_save_loader = '1'
						vm.savebtnloading = true

                        var postData = { action:'bookingpress_get_armember',_wpnonce:'<?php echo esc_html(wp_create_nonce('bpa_wp_nonce')); ?>' };
                        axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( postData ) )
                        .then( function (response) {
                            if(  response.data.variant == 'success' ){
                                vm.$notify({
                                    title: response.data.title,
                                    message: response.data.msg,
                                    type: response.data.variant,
                                    duration:<?php echo intval($bookingpress_notification_duration); ?>,
                                });
                                location.reload();
                            }

                            vm.is_disabled = false
                            vm.is_display_save_loader = '0'
                        }.bind(this) )
                        .catch( function (error) {
                            console.log(error);
                        });
                    }

                    if( plugin_data == 'arprice' ){

                        const vm = this;
                        vm.is_disabled = true
                        vm.is_display_arprice_save_loader = '1'
                        vm.savebtnloading = true

                        var postData = { action:'bookingpress_get_arprice',_wpnonce:'<?php echo esc_html(wp_create_nonce('bpa_wp_nonce')); ?>' };
                        axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( postData ) )
                        .then( function (response) {
                            if(  response.data.variant == 'success' ){
                                vm.$notify({
                                    title: response.data.title,
                                    message: response.data.msg,
                                    type: response.data.variant,
                                    duration:<?php echo intval($bookingpress_notification_duration); ?>,
                                });
                                location.reload();
                            }

                            vm.is_disabled = false
                            vm.is_display_arprice_save_loader = '0'
                        }.bind(this) )
                        .catch( function (error) {
                            console.log(error);
                        });
                    }
                },
        <?php }

            

        /**
         * Load Growth tools view file
         *
         * @return void
         */
        function bookingpress_load_growth_tools_view_func(){
            $bookingpress_growth_tools_view_path = BOOKINGPRESS_VIEWS_DIR . '/growth_tools/bpa_growth_tools.php';
			require $bookingpress_growth_tools_view_path;
        }
    }
    global $bookingpress_growth_tools;
    $bookingpress_growth_tools = new bookingpress_growth_tools();
}
