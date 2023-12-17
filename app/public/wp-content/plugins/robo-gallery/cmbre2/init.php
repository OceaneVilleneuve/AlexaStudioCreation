<?php
/**
 * Bootstraps the CMBRE2 process
 *
 * @category  WordPress_Plugin
 * @package   CMBRE2
 * @author    WebDevStudios
 * @license   GPL-2.0+
 * @link      http://webdevstudios.com
 */
 if ( ! defined( 'WPINC' ) ) exit;
if ( ! class_exists( 'CMBRE2_Bootstrap_206', false ) ) {

	/**
	 * Handles checking for and loading the newest version of CMBRE2
	 *
	 * @since  2.0.0
	 *
	 * @category  WordPress_Plugin
	 * @package   CMBRE2
	 * @author    WebDevStudios
	 * @license   GPL-2.0+
	 * @link      http://webdevstudios.com
	 */
	class CMBRE2_Bootstrap_206 {

		/**
		 * Current version number
		 * @var   string
		 * @since 1.0.0
		 */
		const VERSION = '2.0.6';

		/**
		 * Current version hook priority.
		 * Will decrement with each release
		 *
		 * @var   int
		 * @since 2.0.0
		 */
		const PRIORITY = 9993;

		/**
		 * Single instance of the CMBRE2_Bootstrap_206 object
		 *
		 * @var CMBRE2_Bootstrap_206
		 */
		public static $single_instance = null;

		/**
		 * Creates/returns the single instance CMBRE2_Bootstrap_206 object
		 *
		 * @return CMBRE2_Bootstrap_206 Single instance object
		 *@since  2.0.0
		 */
		public static function initiate() {
			if ( null === self::$single_instance ) {
				self::$single_instance = new self();
			}
			return self::$single_instance;
		}

		/**
		 * Starts the version checking process.
		 * Creates CMBRE2_LOADED definition for early detection by other scripts
		 *
		 * Hooks CMBRE2 inclusion to the init hook on a high priority which decrements
		 * (increasing the priority) with each version release.
		 *
		 * @since 2.0.0
		 */
		private function __construct() {
			/**
			 * A constant you can use to check if CMBRE2 is loaded
			 * for your plugins/themes with CMBRE2 dependency
			 */
			if ( ! defined( 'CMBRE2_LOADED' ) ) {
				define( 'CMBRE2_LOADED', true );
			}
			add_action( 'init', array( $this, 'include_cmb' ), self::PRIORITY );
		}

		/**
		 * A final check if CMBRE2 exists before kicking off our CMBRE2 loading.
		 * CMBRE2_VERSION and CMBRE2_DIR constants are set at this point.
		 *
		 * @since  2.0.0
		 */
		public function include_cmb() {
			if ( class_exists( 'CMBRE2', false ) ) {
				return;
			}

			if ( ! defined( 'CMBRE2_VERSION' ) ) {
				define( 'CMBRE2_VERSION', self::VERSION );
			}

			if ( ! defined( 'CMBRE2_DIR' ) ) {
				define( 'CMBRE2_DIR', trailingslashit( dirname( __FILE__ ) ) );
			}

			$this->l10ni18n();

			// Include helper functions
			require_once 'includes/helper-functions.php';

			// Now kick off the class autoloader
			spl_autoload_register( 'cmbre2_autoload_classes' );

			// Kick the whole thing off
			require_once 'bootstrap.php';
		}

		/**
		 * Registers CMBRE2 text domain path
		 * @since  2.0.0
		 */
		public function l10ni18n() {
			$loaded = load_plugin_textdomain( 'cmbre2', false, '/languages/' );
			if ( ! $loaded ) {
				$loaded = load_muplugin_textdomain( 'cmbre2', '/languages/' );
			}
			if ( ! $loaded ) {
				$loaded = load_theme_textdomain( 'cmbre2', '/languages/' );
			}

			if ( ! $loaded ) {
				$locale = apply_filters( 'plugin_locale', get_locale(), 'cmbre2' );
				$mofile = dirname( __FILE__ ) . '/languages/cmbre2-' . $locale . '.mo';
				load_textdomain( 'cmbre2', $mofile );
			}
		}

	}

	// Make it so...
	CMBRE2_Bootstrap_206::initiate();
	
}
