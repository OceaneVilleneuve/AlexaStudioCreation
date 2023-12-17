<nav class="bpa-header-navbar bpa-header-navbar--v2">
    <div class="bpa-header-navbar-wrap bpa-growth-tools">
        <div class="bpa-navbar-brand">
        <?php if (current_user_can('bookingpress') ) {
            ?>
            <a href="<?php echo esc_url(admin_url() . 'admin.php?page=bookingpress'); ?>" class="bpa_bookingpress_logo"> </a>
        <?php } ?>
            <span class="bpa_growth_tools_heading"> Growth Plugins </span> 
        </div>
    </div>
</nav>
<el-main class="bpa-main-listing-card-container bpa-default-card bpa--is-page-scrollable-tablet bpa-growth-tools" id="all-page-main-container">	
	<div class="bpa-back-loader-container" id="bpa-page-loading-loader">
		<div class="bpa-back-loader"></div>
	</div>	
	<div id="bpa-main-container">		
		<el-container class="bpa-growth-tools-container">
			<div class="bpa-growth-tools-sub-list-wrapper">
            <?php  
                global $BookingPress;
                if( ! $BookingPress->bpa_is_pro_active() ){ ?>
                <div class="bpa_set_bg_image">
                    <el-row type="flex" class="bpa-mlc-head-wrap">
                        <el-col :xs="24" :sm="24" :md="24" :lg="24" :xl="24" class="bpa-mlc-left-heading">
                            <div class="bpa-gt-heading-cls">
                                <div class="bpa-gt-page-heading">BookingPress: Top-rated Premium <span class="bpa-gt-page-heading bpa-page-heading-highlight">Appointment Booking Plugin</div>
                            </div>
                        </el-col>
                    </el-row>
                    <el-row type="flex" class="bpa-mlc-head-wrap">
                        <el-col :xs="24" :sm="24" :md="24" :lg="24" :xl="24" class="bpa-mlc-left-heading">
                            <div class="bpa-gt-heading-inner-cls">
                                <div class="bpa-gt-page-inner-contain">
                                    Upgrade to BookingPress Premium and revolutionize your booking experience! With our Premium package, you can effortlessly streamline the booking process for your customers and automate various employee tasks. Don't wait any longer - take the leap to unlock the full potential of the BookingPress Plugin, and enjoy a more efficient, user-friendly, and feature-rich solution that will help your business thrive. Upgrade today and experience the difference!
                                </div>
                            </div>
                            <div class="bpa-gt-heading-inner-heading"> 1,00,000+ Users ❤️ BookingPress </div>
                        </el-col>
                    </el-row>
                </div>
                <el-row type="flex" class="bpa-mlc-head-wrap">
					<el-col :xs="24" :sm="24" :md="24" :lg="24" :xl="24" class="bpa-mlc-left-heading">
                        <div class="bpa-pre-features-box">
                            <div class="bpa-feature-list-head"> <span class="bpa-page-heading-highlight"> Premium </span> Features Highlight </div>
                            <ul class="bpa-feature-list-cls">
                                <li class="bpa-feature-list-li"> 17+ payment gateways free to use </li>
                                <li class="bpa-feature-list-li"> Manage Unlimited Business Location </li>
                                <li class="bpa-feature-list-li"> Recurring Appointments </li>
                                <li class="bpa-feature-list-li"> Separate Staff Member Panel </li>
                                <li class="bpa-feature-list-li"> WhatsApp, SMS & Email Notifications </li>
                                <li class="bpa-feature-list-li"> Reports & Conversion Tracking facility </li>
                            </ul>
                        </div> 
					</el-col>
				</el-row>
                <el-row type="flex" class="bpa-mlc-head-wrap">
					<el-col :xs="24" :sm="24" :md="24" :lg="24" :xl="24" class="bpa-mlc-left-heading">
                        <div class="bpa-upgrade-premium-cls">
                            <a href="https://www.bookingpressplugin.com/pricing/?utm_source=liteversion&utm_medium=plugin&utm_campaign=Upgrade+to+Premium&utm_id=bookingpress_2" class="bpa-upgrade-premium-btn" target="_blank"> Upgrade to Premium </a>
                        </div> 
					</el-col>
				</el-row>
                <el-row type="flex" class="bpa-mlc-head-wrap">
					<el-col :xs="24" :sm="24" :md="24" :lg="24" :xl="24" class="bpa-mlc-left-heading">
                        <span class="bpa-growth-tools-spacer"></span>
					</el-col>
				</el-row>
            <?php } ?>
                <el-row type="flex" class="bpa-mlc-head-wrap">
					<el-col :xs="24" :sm="24" :md="24" :lg="24" :xl="24" class="bpa-mlc-left-heading">
                        <div class="bpa-gt-page-inner-block-heading"> Our <span class="bpa-page-heading-highlight"> Family WordPress Plugins </span> </div>
					</el-col>
				</el-row>
                <el-row type="flex" class="bpa-mlc-head-wrap">
					<el-col :xs="24" :sm="24" :md="24" :lg="24" :xl="24" class="bpa-mlc-left-heading">
                        <div class="bpa-gt-heading-main-inner-cls">
						    <div class="bpa-gt-page-inner-contain">
                            You will get the same user-friendly experience throughout all of our plugins. Enjoy single-window 24/7 support for all our plugins. All of our plugins are compatible with each other.
                            </div>
                        </div>
					</el-col>
				</el-row>
                <div class="bpa-sec-space"> </div>
                <el-row type="flex" class="bpa-mlc-head-wrap">
					<el-col :xs="24" :sm="24" :md="24" :lg="24" :xl="24" class="bpa-mlc-left-heading">
                        <div class="bpa-plugin-details-cls">
                            <div class="bpa-gt-plugin-icon">
                                <span class="bpa-plugin-icon bpa-arm-icon"></span>
                            </div>
                            <div class="bpa-gt-plugin-dec">
                                <div class="bpa-plugin-heading"> ARMember <span class="bpa-plugin-heading-cls">- WordPress Membership Plugin </span> </div>
                                <div class="bpa-plugin-heading-desc"> Can you imagine a WordPress Membership Plugin that is ridiculously easy to operate, offers a wide range of features, excels in performance, and boasts a modern user interface? It's very different and much better than even the most popular membership plugins available here. </div>
                                <div class="bpa-plugin-key-feature"> Key Features: </div>
                                <ul class="bpa-feature-list-cls-plugin-dec">
                                    <li class="bpa-feature-list-li-plugin"> Membership Setup Wizard </li>
                                    <li class="bpa-feature-list-li-plugin"> Email Notification Templates </li>
                                    <li class="bpa-feature-list-li-plugin"> Unlimited Membership Levels </li>
                                    <li class="bpa-feature-list-li-plugin"> Live form Editor </li>
                                    <li class="bpa-feature-list-li-plugin"> Create Free & Paid Memberships </li>
                                    <li class="bpa-feature-list-li-plugin"> Captcha Free Anti-spam Facility </li>
                                </ul>
                                <div style="margin-top:40px;">
                                    <a href="https://wordpress.org/plugins/armember-membership/" target="_blank" class="bpa-learnmore-btn"> Learn More </a>
                                    <?php if ( (is_plugin_active('armember-membership/armember-membership.php')) || file_exists( WP_PLUGIN_DIR . '/armember-membership/armember-membership.php')  ) { ?>
                                        <el-button class="el-button bpa-btn bpa-install-btn arm-plugin" disabled="is_disabled">
                                            <span class="bpa-btn__label"> Installed </span> 
                                        <?php } else { ?>
                                            <el-button class="el-button bpa-btn bpa-install-btn arm-plugin" @click="bpa_download_plugins('armember')" :class="(is_display_save_loader == '1') ? 'bpa-btn--is-loader' : ''" :disabled="is_disabled">
                                            <span class="bpa-btn__label"> Install </span> 
                                        <?php }  ?>
                                        <div class="bpa-btn--loader__circles">                    
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                    </el-button>
                                </div>
                            </div>
                        </div>
					</el-col>
				</el-row>
                <hr class="bpa-section-line"> 
                <el-row type="flex" class="bpa-mlc-head-wrap">
					<el-col :xs="24" :sm="24" :md="24" :lg="24" :xl="24" class="bpa-mlc-left-heading">
                        <div class="bpa-plugin-details-cls">
                            <div class="bpa-gt-plugin-icon">
                                <span class="bpa-plugin-icon bpa-arf-icon"></span>
                            </div>
                            <div class="bpa-gt-plugin-dec">
                                <div class="bpa-plugin-heading arf-heading"> ARForms <span class="bpa-plugin-heading-cls">- WordPress Membership Plugin </span> </div>
                                <div class="bpa-plugin-heading-desc"> ARForms is an all-in-one WordPress form builder plugin. It not only allows you to create contact forms for your site but also empowers you to build WordPress forms such as feedback forms, survey forms, and various other types of forms with responsive designs. </div>
                                <div class="bpa-plugin-key-feature"> Key Features: </div>
                                <ul class="bpa-feature-list-cls-plugin-dec">
                                    <li class="bpa-feature-list-li-plugin"> Real-Time Form Editor </li>
                                    <li class="bpa-feature-list-li-plugin"> Multi-Column Option </li>
                                    <li class="bpa-feature-list-li-plugin"> Styling & Unlimited Color Option </li>
                                    <li class="bpa-feature-list-li-plugin"> Built-In Anti Spam Protection </li>
                                    <li class="bpa-feature-list-li-plugin"> Material & Rounded Style Forms </li>
                                    <li class="bpa-feature-list-li-plugin"> Popular Page Builders Support </li>
                                </ul>
                                <div style="margin-top:40px;">
                                    <a href="https://wordpress.org/plugins/arforms-form-builder/" target="_blank"  class="bpa-learnmore-btn arf-plugin"> Learn More </a>
                                        <?php if ( (is_plugin_active('arforms-form-builder/arforms-form-builder.php')) || file_exists( WP_PLUGIN_DIR . '/arforms-form-builder/arforms-form-builder.php') ) { ?>
                                        <el-button class="el-button bpa-btn bpa-install-btn arf-plugin" disabled="is_disabled">
                                            <span class="bpa-btn__label"> Installed </span> 
                                        <?php } else { ?>
                                            <el-button class="el-button bpa-btn bpa-install-btn arf-plugin" @click="bpa_download_plugins('arforms')" :class="(is_display_arforms_save_loader == '1') ? 'bpa-btn--is-loader' : ''" :disabled="is_disabled">
                                            <span class="bpa-btn__label"> Install </span> 
                                        <?php }  ?>
                                        <div class="bpa-btn--loader__circles">                    
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                    </el-button>
                                </div>
                            </div>
                        </div>
					</el-col>
				</el-row>
                <hr class="bpa-section-line">
                <el-row type="flex" class="bpa-mlc-head-wrap">
					<el-col :xs="24" :sm="24" :md="24" :lg="24" :xl="24" class="bpa-mlc-left-heading">
                        <div class="bpa-plugin-details-cls">
                            <div class="bpa-gt-plugin-icon">
                                <span class="bpa-plugin-icon bpa-arp-icon"></span>
                            </div>
                            <div class="bpa-gt-plugin-dec">
                                <div class="bpa-plugin-heading arp-heading"> ARPrice <span class="bpa-plugin-heading-cls">- WordPress Membership Plugin </span> </div>
                                <div class="bpa-plugin-heading-desc">ARPrice is a WordPress pricing table plugin that enables you to effortlessly craft responsive pricing tables and plan comparison tables. With its powerful and flexible real-time editor, you can swiftly design pricing tables, using multiple templates, to suit various WordPress themes. </div>
                                <div class="bpa-plugin-key-feature"> Key Features: </div>
                                <ul class="bpa-feature-list-cls-plugin-dec">
                                    <li class="bpa-feature-list-li-plugin"> Real-time Pricing Table Editor </li>
                                    <li class="bpa-feature-list-li-plugin"> Unlimited Color Options </li>
                                    <li class="bpa-feature-list-li-plugin"> Create Team Showcases </li>
                                    <li class="bpa-feature-list-li-plugin"> Translation Ready </li>
                                    <li class="bpa-feature-list-li-plugin"> Responsive Pricing Tables </li>
                                    <li class="bpa-feature-list-li-plugin"> Multi-Site Compatible </li>
                                </ul>
                                <div style="margin-top:40px;">

                                    <a href="https://wordpress.org/plugins/arprice-responsive-pricing-table/" target="_blank"  class="bpa-learnmore-btn arp-plugin"> Learn More </a>
                                    <?php if ((is_plugin_active('arprice-responsive-pricing-table/arprice-responsive-pricing-table.php')) || file_exists( WP_PLUGIN_DIR . '/arprice-responsive-pricing-table/arprice-responsive-pricing-table.php')  ) { ?>
                                        <el-button class="el-button bpa-btn bpa-install-btn arp-plugin" disabled="is_disabled">
                                            <span class="bpa-btn__label"> Installed </span> 
                                        <?php } else { ?>
                                            <el-button class="el-button bpa-btn bpa-install-btn arp-plugin" @click="bpa_download_plugins('arprice')" :class="(is_display_arprice_save_loader == '1') ? 'bpa-btn--is-loader' : ''" :disabled="is_disabled">
                                            <span class="bpa-btn__label"> Install </span> 
                                        <?php }  ?>
                                        <div class="bpa-btn--loader__circles">                    
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                    </el-button>
                                </div>
                            </div>
                        </div>
					</el-col>
				</el-row>
            </div>
        </el-container>
    </div>
</el-main>