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

  $form['libraries_logo'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Show MIT Libraries Logo'),
    '#default_value' => theme_get_setting('libraries_logo'),
    '#description'   => t("Should the MIT Libraries' logo be displayed at the top of the site?"),
  );

  $form['search_header'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Show search in header'),
    '#default_value' => theme_get_setting('search_header'),
    '#description'   => t("Should the Google CSE search form be displayed in the site header?"),
  );

}
