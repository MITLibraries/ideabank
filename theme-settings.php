<?php

/**
 * @file
 * Theme settings.
 */

/**
 * Adds background image control to theme settings.
 */
function ideabank_form_system_theme_settings_alter(&$form, $form_state) {

  // This puts all defined controls in a single fieldset, to match the way
  // other controls are grouped.
  $form['ideabank'] = array(
    '#type' => 'fieldset',
    '#title' => t('Ideabank settings'),
    '#description' => t('These options will control how various aspects of the site will be (or will not be) displayed.'),
    '#access' => user_access('administer site configuration') && user_access('access administration pages'),
  );

  // This enables the site builder to choose which background image is
  // displayed on all pages.
  $form['ideabank']['background_image'] = array(
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

  // This determines whether the MIT Libaries' logo is displayed in the site
  // masthead.
  $form['ideabank']['libraries_logo'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Show MIT Libraries Logo'),
    '#default_value' => theme_get_setting('libraries_logo'),
    '#description'   => t("Should the MIT Libraries' logo be displayed at the top of the site?"),
  );

  // This determines whether the search form (provided by a Google search
  // appliance) is loaded in the site header.
  $form['ideabank']['search_header'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Show search in header'),
    '#default_value' => theme_get_setting('search_header'),
    '#description'   => t("Should the Google CSE search form be displayed in the site header?"),
  );

}
