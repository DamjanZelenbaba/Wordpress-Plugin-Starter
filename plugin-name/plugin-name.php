<?php
defined( 'ABSPATH' ) || exit;

/**
 * Plugin Name
 *
 * @package           PluginPackage
 * @author            Your Name
 * @copyright         2019 Your Name or Company Name
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Plugin Name
 * Plugin URI:        https://example.com/plugin-name
 * Description:       Description of the plugin.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Your Name
 * Author URI:        https://example.com
 * Text Domain:       plugin-slug
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI:        https://example.com/my-plugin/
 */

/**
 * Plugin version.
 * 
 * @since 1.0.0
 * 
 * @author Author Name
 */
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * Plugin directory path.
 * 
 * @since 1.0.0
 * 
 * @author Author Name
 */
define( 'PLUGIN_NAME_DIR_PATH', plugin_dir_path( __FILE__ ) );

/**
 * Plugin directory URL.
 * 
 * @since 1.0.0
 * 
 * @author Author Name
 */
define( 'PLUGIN_NAME_DIR_URL', plugin_dir_url( __FILE__ ) );

/**
 * Plugin directory basename.
 * 
 * @since 1.0.0
 * 
 * @author Author Name
 */
define( 'PLUGIN_NAME_DIR_BASENAME', plugin_basename( __DIR__ ) );

/**
 * Code that runs during plugin activation.
 * 
 * This action is documented in includes/class-plugin-name-activator.php
 * 
 * @since 1.0.0
 * 
 * @author Author Name
 */
register_activation_hook( __FILE__, 'activate_plugin_name' );

function activate_plugin_name() {
	require_once PLUGIN_NAME_DIR_PATH . 'includes/class-plugin-name-activator.php';
	Plugin_Name_Activator::activate();
}

/**
 * Code that runs during plugin deactivation.
 * 
 * This action is documented in includes/class-plugin-name-deactivator.php
 * 
 * @since 1.0.0
 * 
 * @author Author Name
 */
register_deactivation_hook( __FILE__, 'deactivate_plugin_name' );

function deactivate_plugin_name() {
	require_once PLUGIN_NAME_DIR_PATH . 'includes/class-plugin-name-deactivator.php';
	Plugin_Name_Deactivator::deactivate();
}

/**
 * Core plugin class.
 * 
 * @since 1.0.0
 * 
 * @author Author Name
 */
require PLUGIN_NAME_DIR_PATH . 'includes/class-plugin-name.php';

/**
 * Begins execution of the plugin.
 * 
 * @since 1.0.0
 * 
 * @author Author Name
 */
$plugin = new Plugin_Name();
$plugin->run();
