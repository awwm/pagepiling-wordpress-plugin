<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.linkedin.com/in/abdulwahabpk/
 * @since      1.0.0
 *
 * @package    Awwm_Slider
 * @subpackage Awwm_Slider/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Awwm_Slider
 * @subpackage Awwm_Slider/public
 * @author     AWWM.PL <wahab83.pk@gmail.com>
 */
class Awwm_Slider_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Awwm_Slider_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Awwm_Slider_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/awwm-slider-public.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'page-piling', plugin_dir_url( __FILE__ ) . 'css/jquery.pagepiling.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,700,800&display=swap', false );
		wp_enqueue_style( 'jqueryuistyle', 'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css', false );
	}
 
	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Awwm_Slider_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Awwm_Slider_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_script( 'jqueryui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'pagepilingjs', plugin_dir_url( __FILE__ ) . 'js/jquery.pagepiling.min.js', array( 'jquery' ), $this->version, false ); 
		wp_enqueue_script( 'awwm-sliderjs', plugin_dir_url( __FILE__ ) . 'js/awwm-slider-public.js', array( ), $this->version, true );

	}

	/**
	* Returns a post object of random quotes
	*
	* @param array $params An array of optional parameters
	* quantity Number of quote posts to return
	*
	* @return object A post object
	*/
 
	public function get_awwm_slides($params) {
		$return = '';
		$args = array(
			'post_type' => 'awwm-slider',
			//'posts_per_page' => $params,
			'orderby' => 'date',
			'order'   => 'ASC'
		);
 
		$query = new WP_Query( $args );
 
		if ( is_wp_error( $query ) ) {
			$return = 'Oops!...No posts for you!';
		} else {
			$return = $query->posts;
		}
 
		return $return;
	} // get_awwm_slides()

	/**
	* Registers all shortcodes at once
	*
	* @return [type] [description]
	*/
 
	public function register_shortcodes() {
		add_shortcode( 'awwm-slider', array( $this, 'display_slides' ) );
	} // register_shortcodes()

	
	/**
	* Processes shortcode awwm-slider
	*
	* @param array $atts The attributes from the shortcode
	*
	*
	* @return mixed $output Output of the buffer
	*/
 
	public function display_slides( $atts = array() ) {
		ob_start();
 
			$args = shortcode_atts( array(
				'num-quotes' => 6,
				'quotes-title' => 'Words of Wisdom',),
				$atts
			);
 
			$items = $this->get_awwm_slides($args['num-quotes']);
			//var_dump($items);
 
			if ( is_array( $items ) || is_object( $items ) ) {  
				include ('partials/awwm-slider-public-display.php');
			
			} else {
				echo $items;
			}
 
			$output = ob_get_contents();
		ob_end_clean();
 
		return $output;
 
	} // get_awwm_slides()


}
