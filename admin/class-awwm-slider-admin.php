<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.linkedin.com/in/abdulwahabpk/
 * @since      1.0.0
 *
 * @package    Awwm_Slider
 * @subpackage Awwm_Slider/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Awwm_Slider
 * @subpackage Awwm_Slider/admin
 * @author     AWWM.PL <wahab83.pk@gmail.com>
 */
class Awwm_Slider_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/awwm-slider-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/awwm-slider-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	* Creates a new custom post type
	*
	* @since 1.0.0
	* @access public
	* @uses register_post_type()
	*/
	public static function awwm_slide_cpt() {
		$cap_type = 'post';
		$plural = 'AWWM Sliders';
		$single = 'AWWM Slider';
		$cpt_name = 'awwm-slider';
		$opts['can_export'] = TRUE;
		$opts['capability_type'] = $cap_type;
		$opts['description'] = '';
		$opts['exclude_from_search'] = TRUE;
		$opts['has_archive'] = FALSE;
		$opts['hierarchical'] = FALSE;
		$opts['map_meta_cap'] = TRUE;
		$opts['menu_icon'] = 'dashicons-businessman';
		$opts['menu_position'] = 25;
		$opts['public'] = TRUE;
		$opts['publicly_querable'] = TRUE;
		$opts['query_var'] = TRUE;
		$opts['register_meta_box_cb'] = '';
		$opts['rewrite'] = FALSE;
		$opts['show_in_admin_bar'] = TRUE;
		$opts['show_in_menu'] = TRUE;
		$opts['show_in_nav_menu'] = TRUE;
 
		$opts['labels']['add_new'] = esc_html__( "Add New {$single}", 'wisdom' );
		$opts['labels']['add_new_item'] = esc_html__( "Add New {$single}", 'wisdom' );
		$opts['labels']['all_items'] = esc_html__( $plural, 'wisdom' );
		$opts['labels']['edit_item'] = esc_html__( "Edit {$single}" , 'wisdom' );
		$opts['labels']['menu_name'] = esc_html__( $plural, 'wisdom' );
		$opts['labels']['name'] = esc_html__( $plural, 'wisdom' );
		$opts['labels']['name_admin_bar'] = esc_html__( $single, 'wisdom' );
		$opts['labels']['new_item'] = esc_html__( "New {$single}", 'wisdom' );
		$opts['labels']['not_found'] = esc_html__( "No {$plural} Found", 'wisdom' );
		$opts['labels']['not_found_in_trash'] = esc_html__( "No {$plural} Found in Trash", 'wisdom' );
		$opts['labels']['parent_item_colon'] = esc_html__( "Parent {$plural} :", 'wisdom' );
		$opts['labels']['search_items'] = esc_html__( "Search {$plural}", 'wisdom' );
		$opts['labels']['singular_name'] = esc_html__( $single, 'wisdom' );
		$opts['labels']['view_item'] = esc_html__( "View {$single}", 'wisdom' );
	register_post_type( strtolower( $cpt_name ), $opts );
	} // awwm_slide_cpt()

	// =============Add Meta Box ========

	function cf_sliders_meta_box() {
		add_meta_box( 
			'cf-slider-meta-box', 
			'Popup Content', 
			array($this, 'cf_slider_details'), 
			'awwm-slider', 
			'normal', 
			'high' 
		);
	}

	// Function to display what is inside of our meta box
	function cf_slider_details( $post ) {
		// Retrieve saved metadata if it exists
		$cf_slider_age = get_post_meta( $post->ID, '_cf_slider_age', true );
		// Create a nonce field for verifisliderion
    		wp_nonce_field( 'cf_submit_slider', 'cf_slider_check' );
    		// The form inside our meta box
		echo '<table class="form-table">
			<tr valign="top">
				<td>
					'.wp_editor( htmlspecialchars_decode($cf_slider_age), 'cf_slider_age', array("media_buttons" => true) ).'
				</td>
			</tr>
		</table>';
	}

	// Update/Save slider metadata

	function save_slider_metadata( $post_id ) {
		// Verify if this is an auto save routine.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		//Check permissions
		if ( !current_user_can( 'publish_posts' ) ) { // Check for capabilities, not role
			wp_die( 'Insufficient Privileges: Sorry, you do not have the capabilities access to this page. Please go back.' );
		}
		// Check nonce named cf_slider_check
		// Verify this came from the our screen and with proper authorization
		if ( !isset( $_POST['cf_slider_check'] )  || !wp_verify_nonce(  $_POST['cf_slider_check'], 'cf_submit_slider' ) ) {
			return;
		}
		// OK, we're authentislidered: we need to save the data
		// Verify the meta data is set
		if ( isset( $_POST['cf_slider_age'] ) ) {
			// Save meta data
			 $data=htmlspecialchars($_POST['cf_slider_age']);
			update_post_meta( $post_id, '_cf_slider_age', $data );
		}
	}


}
