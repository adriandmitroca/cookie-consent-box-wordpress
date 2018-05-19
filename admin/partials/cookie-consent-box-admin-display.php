<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @since      1.0.0
 *
 * @package    Cookie_Consent_Box
 * @subpackage Cookie_Consent_Box/admin/partials
 */

$options                = get_option( $this->plugin_name );
$background_color       = ! empty( $options['background_color'] ) ? $options['background_color'] : null;
$text_color             = ! empty( $options['text_color'] ) ? $options['text_color'] : null;
$privacy_policy_page_id = ! empty( $options['privacy_policy_page_id'] ) ? $options['privacy_policy_page_id'] : 0;
$container_width        = ! empty( $options['container_width'] ) ? $options['container_width'] : null;
?>

<div class="wrap">
    <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
    <form method="post" action="options.php">
		<?php
		settings_fields( $this->plugin_name );
		do_settings_sections( $this->plugin_name );
		?>

        <table class="form-table tools-cookie-consent-options">
            <tbody>
            <!-- Background Color -->
            <tr>
                <th scope="row">
                    Background Color
                </th>
                <td>
                    <input type="text" class="<?php echo $this->plugin_name; ?>-color-picker"
                           id="<?php echo $this->plugin_name; ?>-background_color"
                           name="<?php echo $this->plugin_name; ?>[background_color]"
                           value="<?php echo $background_color; ?>"/>
                </td>
            </tr>

            <!-- Text Color -->
            <tr>
                <th scope="row">
                    Text Color
                </th>
                <td>
                    <input type="text" class="<?php echo $this->plugin_name; ?>-color-picker"
                           id="<?php echo $this->plugin_name; ?>-text_color"
                           name="<?php echo $this->plugin_name; ?>[text_color]"
                           value="<?php echo $text_color; ?>"/>
                </td>
            </tr>

            <!-- Privacy Policy Page -->
            <tr>
                <th scope="row">
                    Privacy Policy Page
                </th>
                <td>
					<?php wp_dropdown_pages( array(
						'selected' => $privacy_policy_page_id,
						'name'     => $this->plugin_name . '[privacy_policy_page_id]'
					) ); ?>
                </td>
            </tr>

            <!-- Container Width -->
            <tr>
                <th scope="row">
                    Container Width
                </th>
                <td>
                    <fieldset>
                        <input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-container_width"
                               name="<?php echo $this->plugin_name; ?>[container_width]"
                               placeholder="1140"
                               value="<?php if ( ! empty( $container_width ) ) {
							       echo $container_width;
						       } ?>"/>
                        <span><?php esc_attr_e( 'Width of your page container (in pixels)', $this->plugin_name ); ?></span>
                    </fieldset>
                </td>
            </tr>
            </tbody>
        </table>

		<?php submit_button( __( 'Save all changes', $this->plugin_name ), 'primary', 'submit', true ); ?>
    </form>
</div>
