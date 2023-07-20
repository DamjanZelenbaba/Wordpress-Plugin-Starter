<?php
defined( 'ABSPATH' ) || exit;

/**
 * Core plugin class
 * 
 * @since 1.0.0
 * 
 * @author Author Name
 */

class Plugin_Name {

	/**
	 * Loader responsible for registering all hooks.
	 * 
	 * @access protected
	 * 
	 * @var Plugin_Name_Loader
	 */
	protected $loader;

	/**
	 * Plugin name.
	 * 
	 * @access protected
	 * 
	 * @var string $plugin_name
	 */
	protected $plugin_name;

	/**
	 * Plugin version.
	 * 
	 * @access protected
	 * 
	 * @var string $version
	 */
	protected $version;

	/**
	 * Initialize the class and set its properties and methods.
	 */
	public function __construct() {

		$this->version = PLUGIN_NAME_VERSION;
		$this->plugin_name = 'plugin-name';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load required dependencies for this plugin.
	 * 
	 * @access private
	 */
	private function load_dependencies() {

		/**
		 * Class for arranging all actions and filters.
		 */
		require_once PLUGIN_NAME_DIR_PATH . 'includes/class-plugin-name-loader.php';

		/**
		 * Class for internationalization.
		 */
		require_once PLUGIN_NAME_DIR_PATH . 'includes/class-plugin-name-i18n.php';

		/**
		 * Class for admin functionality.
		 */
		require_once PLUGIN_NAME_DIR_PATH . 'admin/class-plugin-name-admin.php';

		/**
		 * Class for public functionality.
		 */
		require_once PLUGIN_NAME_DIR_PATH . 'public/class-plugin-name-public.php';

		$this->loader = new Plugin_Name_Loader();

	}

	/**
	 * Define plugin locale for internationalization.
	 * 
	 * @access private
	 */
	private function set_locale() {

		$plugin_i18n = new Plugin_Name_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all hooks related to the admin area.
	 * 
	 * @access private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Plugin_Name_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}

	/**
	 * Register all hooks related to the public area.
	 * 
	 * @access private
	 */
	private function define_public_hooks() {

		$plugin_public = new Plugin_Name_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}

	/**
	 * Run the loader to execute all hooks.
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * Plugin unique identifier.
	 * 
	 * @return string
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * Class reference for arranging all actions and filters.
	 * 
	 * @return Plugin_Name_Loader
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve plugin version.
	 * 
	 * @return string
	 */
	public function get_version() {
		return $this->version;
	}

}
