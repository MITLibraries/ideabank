<?php

/**
 * @file
 * Theme settings.
 */

/**
 * Adds background image control to theme settings.
 */
function ideabank_form_system_theme_settings_alter(&$form, $form_state) {
  $form['background_image'] = array(
    '#type'          => 'select',
    '#title'         => t('Background'),
    '#options'       => array(
      0 => t('None'),
      1 => t('Barker'),
      2 => t('Lobby 7'),
    ),
    '#default_value' => theme_get_setting('background_image'),
    '#description'   => t("What image should be used as a background? Choosing 'None' will result in a gray gradient being displayed."),
  );
}
