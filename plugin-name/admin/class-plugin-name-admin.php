<?php
defined( 'ABSPATH' ) || exit;

/**
 * Plugin admin functionality.
 * 
 * @since 1.0.0
 * 
 * @author Author Name
 */

class Plugin_Name_Admin {

	/**
	 * Plugin name.
	 * 
	 * @access private
	 * 
	 * @var string $plugin_name
	 */
	private $plugin_name;

	/**
	 * Plugin version.
	 * 
	 * @access private
	 * 
	 * @var string $version
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 * 
	 * @param string $plugin_name
	 * 
	 * @param string $version
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register admin styles.
	 */
	public function enqueue_styles() {

		/**
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, PLUGIN_NAME_DIR_URL . 'css/plugin-name-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register admin js.
	 */
	public function enqueue_scripts() {

		/**
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, PLUGIN_NAME_DIR_URL . 'js/plugin-name-admin.js', array( 'jquery' ), $this->version, false );

	}

}
