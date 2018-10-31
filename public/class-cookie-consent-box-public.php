<?php

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Cookie_Consent_Box
 * @subpackage Cookie_Consent_Box/public
 * @author     Adrian Dmitroca <dmitroca.adrian@gmail.com>
 */
class Cookie_Consent_Box_Public {

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
	 * @param      string $plugin_name The name of the plugin.
	 * @param      string $version The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;
		$this->options     = get_option( $this->plugin_name );
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style(
			$this->plugin_name,
			plugin_dir_url( __FILE__ ) . 'css/cookie-consent-box.css',
			array(),
			$this->version,
			'all'
		);
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script(
			$this->plugin_name,
			plugin_dir_url( __FILE__ ) . 'js/cookie-consent-box.min.js',
			array(),
			$this->version,
			true
		);

		wp_localize_script(
			$this->plugin_name, 'CookieBoxConfig', array(
				'language'           => $this->get_language(),
				'backgroundColor'    => $this->options['background_color'],
				'textColor'          => $this->options['text_color'],
				'url'                => $this->get_url(),
				'linkTarget'         => ! empty( $this->options['link_target'] ) ? $this->options['link_target'] : null,
				'cookieExpireInDays' => ! empty( $this->options['cookie_expire_in_days'] ) ? $this->options['cookie_expire_in_days'] : null,
				'containerWidth'     => $this->options['container_width'],
				'content'            => ! empty( $this->options['customized_content'] ) ? $this->options['content'] : null,
			)
		);
	}

	private function get_language() {
		$parts = explode( '_', get_locale() );

		return ! empty( $parts ) ? $parts[0] : 'en';
	}

	private function get_url() {
		if ( ! isset( $this->options['link_type'] ) || $this->options['link_type'] === 'page' ) {
			return get_permalink( $this->options['privacy_policy_page_id'] );
		} elseif ( $this->options['link_type'] === 'file' ) {
			return wp_get_attachment_url( $this->options['privacy_policy_file_id'] );
		} elseif ( $this->options['link_type'] === 'none' ) {
			return null;
		}

		return;
	}

	public function script_loader_tag( $tag, $handle ) {
		if ( $this->plugin_name !== $handle ) {
			return $tag;
		}

		return str_replace( ' src', ' defer async src', $tag );
	}
}
