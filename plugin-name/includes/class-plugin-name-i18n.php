<?php
defined( 'ABSPATH' ) || exit;

/**
 * Define internationalization functionality.
 * 
 * @since 1.0.0
 * 
 * @author Author Name
 */

class Plugin_Name_i18n {
	
	/**
	 * Load plugin text domain for translation.
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain( 'plugin-name', false, PLUGIN_NAME_DIR_BASENAME . '/languages/' );

	}
	
}
