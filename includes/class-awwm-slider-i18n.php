<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.linkedin.com/in/abdulwahabpk/
 * @since      1.0.0
 *
 * @package    Awwm_Slider
 * @subpackage Awwm_Slider/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Awwm_Slider
 * @subpackage Awwm_Slider/includes
 * @author     AWWM.PL <wahab83.pk@gmail.com>
 */
class Awwm_Slider_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'awwm-slider',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
