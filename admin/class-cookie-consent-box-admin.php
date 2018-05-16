<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Cookie_Consent_Box
 * @subpackage Cookie_Consent_Box/admin
 * @author     Adrian Dmitroca <dmitroca.adrian@gmail.com>
 */
class Cookie_Consent_Box_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $plugin_name The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $version The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 *
	 * @param      string $plugin_name The name of this plugin.
	 * @param      string $version The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style( 'wp-color-picker' );
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script(
			$this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/cookie-consent-box-admin.js', array(
				'jquery',
				'wp-color-picker',
			), $this->version, false
		);

	}

	public function add_plugin_admin_menu() {
		add_options_page(
			'Cookie Consent Box',
			'Cookie Consent Box',
			'manage_options',
			$this->plugin_name, array(
				$this,
				'display_plugin_setup_page',
			)
		);
	}

	/**
	 * Add settings action link to the plugins page.
	 *
	 * @since    1.0.0
	 *
	 * @param $links
	 *
	 * @return array
	 */
	public function add_action_links( $links ) {
		$settings_link = array(
			'<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_name ) . '">' . __( 'Settings', $this->plugin_name ) . '</a>',
		);

		return array_merge( $settings_link, $links );
	}

	/**
	 * Render the settings page for this plugin.
	 *
	 * @since    1.0.0
	 */
	public function display_plugin_setup_page() {
		include_once 'partials/cookie-consent-box-admin-display.php';
	}

	public function validate( $input ) {
		$valid = array();

		// Background Color
		$valid['background_color'] = ( isset( $input['background_color'] ) && ! empty( $input['background_color'] ) ) ? sanitize_text_field( $input['background_color'] ) : '';

		if ( ! empty( $valid['background_color'] ) && ! $this->validate_hex_color( $valid['background_color'] ) ) {
			add_settings_error(
				'background_color',
				'background_color_texterror',
				'Please enter a valid hex value color',
				'error'
			);
		}

		// Text Color
		$valid['text_color'] = ( isset( $input['text_color'] ) && ! empty( $input['text_color'] ) ) ? sanitize_text_field( $input['text_color'] ) : '';

		if ( ! empty( $valid['text_color'] ) && ! $this->validate_hex_color( $valid['text_color'] ) ) {
			add_settings_error(
				'text_color',
				'text_color_texterror',
				'Please enter a valid hex value color',
				'error'
			);
		}

		$valid['privacy_policy_url'] = esc_url( $input['privacy_policy_url'] );

		$valid['container_width'] = sanitize_text_field( $input['container_width'] );

		return $valid;
	}

	private function validate_hex_color( $value ) {
		return preg_match( '/^#[a-f0-9]{6}$/i', $value );
	}

	public function options_update() {
		register_setting( $this->plugin_name, $this->plugin_name, array( $this, 'validate' ) );
	}
}
