<?php

/**
 * @wordpress-plugin
 * Plugin Name:       Cookie Consent Box
 * Plugin URI:        https://wordpress.org/plugins/cookie-consent-box/
 * Description:       Lightweight and good looking cookie consent box that helps you to be GDPR complaint.
 * Version:           1.0.0
 * Author:            Adrian Dmitroca
 * Author URI:        https://radicalwebdesign.co.uk
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       cookie-consent-box
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'CCB_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-cookie-consent-box-activator.php
 */
function activate_cookie_consent_box() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-cookie-consent-box-activator.php';
	Cookie_Consent_Box_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-cookie-consent-box-deactivator.php
 */
function deactivate_cookie_consent_box() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-cookie-consent-box-deactivator.php';
	Cookie_Consent_Box_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_cookie_consent_box' );
register_deactivation_hook( __FILE__, 'deactivate_cookie_consent_box' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-cookie-consent-box.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_cookie_consent_box() {

	$plugin = new Cookie_Consent_Box();
	$plugin->run();

}

run_cookie_consent_box();
