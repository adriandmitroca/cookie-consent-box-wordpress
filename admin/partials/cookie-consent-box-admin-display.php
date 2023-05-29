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

$options = get_option($this->plugin_name);
$background_color = ! empty($options['background_color']) ? $options['background_color'] : null;
$text_color = ! empty($options['text_color']) ? $options['text_color'] : null;
$link_type = ! empty($options['link_type']) ? $options['link_type'] : 'page';
$link_target = ! empty($options['link_target']) ? $options['link_target'] : '_blank';
$privacy_policy_page_id = ! empty($options['privacy_policy_page_id']) ? $options['privacy_policy_page_id'] : 0;
$privacy_policy_file_id = ! empty ($options['privacy_policy_file_id']) ? $options['privacy_policy_file_id'] : null;
$container_width = ! empty($options['container_width']) ? $options['container_width'] : null;
$cookie_expire_in_days = ! empty($options['cookie_expire_in_days']) ? $options['cookie_expire_in_days'] : null;
$customized_content = ! empty($options['customized_content']) ? $options['customized_content'] : false;
$content = ! empty($options['content']) ? $options['content'] : [];
?>

<div class="wrap">
  <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
  <form method="post" action="options.php">
      <?php
      settings_fields($this->plugin_name);
      do_settings_sections($this->plugin_name);
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
          Read More Link Type
        </th>
        <td>
          <select name="<?php echo $this->plugin_name ?>[link_type]">
            <option value="page" <?= $link_type === 'page' ? 'selected' : '' ?>>Page</option>
            <option value="file" <?= $link_type === 'file' ? 'selected' : '' ?>>Attachment</option>
            <option value="none" <?= $link_type === 'none' ? 'selected' : '' ?>>None</option>
          </select>
        </td>
      </tr>

      <!-- Privacy Policy Page -->
      <tr>
        <th scope="row">
          Read More Link Target
        </th>
        <td>
          <select name="<?php echo $this->plugin_name ?>[link_target]">
            <option value="_blank" <?= $link_target === '_blank' ? 'selected' : '' ?>>_blank (new tab)</option>
            <option value="_self" <?= $link_target === '_self' ? 'selected' : '' ?>>_self (current tab)</option>
          </select>
        </td>
      </tr>

      <!-- Privacy Policy Page -->
      <tr data-link-type="page">
        <th scope="row">
          Privacy Policy Page
        </th>
        <td>
            <?php wp_dropdown_pages([
              'selected' => $privacy_policy_page_id,
              'name'     => $this->plugin_name . '[privacy_policy_page_id]'
            ]); ?>
        </td>
      </tr>

      <!-- Privacy Policy File -->
      <tr data-link-type="file">
        <th scope="row">
          Privacy Policy File
        </th>
        <td>
          <label for="<?php echo $this->plugin_name ?>-privacy_policy_file">
            <input type="hidden" id="privacy_policy_file_id"
                   name="<?php echo $this->plugin_name; ?>[privacy_policy_file_id]"
                   value="<?php echo $privacy_policy_file_id; ?>"/>
            <input id="upload_privacy_policy_file_button" type="button" class="button"
                   value="<?php _e('Upload File', $this->plugin_name); ?>"/>
          </label>
          <div id="upload_privacy_policy_file_preview"
               class="wp_cbf-upload-preview <?php if (empty($privacy_policy_file_id))
                   echo 'hidden' ?>">
            <p>
              Selected File: <a
                      href="<?php echo $privacy_policy_file_id ? wp_get_attachment_url($privacy_policy_file_id) : '' ?>"
                      target="_blank">
                Privacy Policy
              </a>
            </p>
          </div>
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
                   value="<?php if ( ! empty($container_width)) {
                       echo $container_width;
                   } ?>"/>
            <span><?php esc_attr_e('Width of your page container (in pixels)', $this->plugin_name); ?></span>
          </fieldset>
        </td>
      </tr>

      <!-- Cookie Expire In Days -->
      <tr>
        <th scope="row">
          Cookie Expire In Days
        </th>
        <td>
          <fieldset>
            <input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-cookie_expire_in_days"
                   name="<?php echo $this->plugin_name; ?>[cookie_expire_in_days]"
                   placeholder="365"
                   value="<?php if ( ! empty($cookie_expire_in_days)) {
                       echo $cookie_expire_in_days;
                   } ?>"/>
          </fieldset>
        </td>
      </tr>

      <tr>
        <th scope="row">
          Customized Content
        </th>
        <td>
          <fieldset>
            <input type="hidden" name="<?php echo $this->plugin_name; ?>-customized_content" value="0">
            <input type="checkbox" class="regular-text" id="<?php echo $this->plugin_name; ?>-customized_content"
                   name="<?php echo $this->plugin_name; ?>[customized_content]"
                   value="1" <?php echo $customized_content ? 'checked="true"' : '' ?>"/>
          </fieldset>
        </td>
      </tr>

      <tr data-custom-content>
        <th scope="row">
          Content: Title
        </th>
        <td>
          <fieldset>
            <input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-content-title"
                   name="<?php echo $this->plugin_name; ?>[content][title]"
                   value="<?php echo ! empty($content) ? esc_textarea($content['title']) : '' ?>"/>
          </fieldset>
        </td>
      </tr>

      <tr data-custom-content>
        <th scope="row">
          Content: Body
        </th>
        <td>
          <fieldset>
                  <textarea class="regular-text" id="<?php echo $this->plugin_name; ?>-content-content"
                            name="<?php echo $this->plugin_name; ?>[content][content]"><?php echo ! empty($content) ? esc_textarea($content['content']) : '' ?></textarea>
          </fieldset>
        </td>
      </tr>

      <tr data-custom-content>
        <th scope="row">
          Content: Accept Button
        </th>
        <td>
          <fieldset>
            <input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-content-accept"
                   name="<?php echo $this->plugin_name; ?>[content][accept]"
                   value="<?php echo ! empty($content) ? esc_textarea($content['accept']) : '' ?>"/>
          </fieldset>
        </td>
      </tr>

      <tr data-custom-content>
        <th scope="row">
          Content: Learn more link
        </th>
        <td>
          <fieldset>
            <input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-content-learnMore"
                   name="<?php echo $this->plugin_name; ?>[content][learnMore]"
                   value="<?php echo ! empty($content) ? esc_textarea($content['learnMore']) : '' ?>"/>
          </fieldset>
        </td>
      </tr>
      </tbody>
    </table>

      <?php submit_button(__('Save all changes', $this->plugin_name), 'primary', 'submit', true); ?>
  </form>
</div>
