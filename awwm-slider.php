<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.linkedin.com/in/abdulwahabpk/
 * @since             1.0.0
 * @package           Awwm_Slider
 *
 * @wordpress-plugin
 * Plugin Name:       awwm-slider
 * Plugin URI:        https://www.pixxelfactory.net/jInvertScroll/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            AWWM.PL
 * Author URI:        https://www.linkedin.com/in/abdulwahabpk/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       awwm-slider
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
define( 'AWWM_SLIDER_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-awwm-slider-activator.php
 */
function activate_awwm_slider() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-awwm-slider-activator.php';
	Awwm_Slider_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-awwm-slider-deactivator.php
 */
function deactivate_awwm_slider() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-awwm-slider-deactivator.php';
	Awwm_Slider_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_awwm_slider' );
register_deactivation_hook( __FILE__, 'deactivate_awwm_slider' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-awwm-slider.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_awwm_slider() {

	$plugin = new Awwm_Slider();
	$plugin->run();

}
run_awwm_slider();
