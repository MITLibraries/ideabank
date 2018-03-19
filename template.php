<?php

//
// Implements hook_css_alter().
//
function ideabank_css_alter(&$css) {

    if (!user_is_logged_in()) {
        $theme_path = drupal_get_path('theme', 'ideabank');

        // Load excluded CSS files from theme.
        $excludes = _ideabank_alter_files_list_by_type(
                        _ideabank_theme_get_info('exclude'),
                        'css');

        $css = array_diff_key($css, $excludes);
    }
}


//
// Filter the files list by type
//
function _ideabank_alter_files_list_by_type($files, $type) {
    $output = array();

    foreach($files as $key => $value) {
        if (isset($files[$key][$type])) {
            foreach ($files[$key][$type] as $file => $name) {
                $output[$name] = FALSE;
            }
        }
    }
    return $output;
}

//
// Get setting under [info] in the theme info
//
function _ideabank_theme_get_info($setting_name, $theme = NULL) {

    // If no key is given, use the current theme if we can determine it.
    if (!isset($theme)) {
        $theme = !empty($GLOBALS['theme_key']) ? $GLOBALS['theme_key'] : '';
    }

    $output = array();

    if ($theme) {
        $themes       = list_themes();
        $theme_object = $themes[$theme];

        // Create a list which includes the current theme and all its base themes.
        if (isset($theme_object->base_themes)) {
            $theme_keys = array_keys($theme_object->base_themes);
            $theme_keys[] = $theme;
        } else {
            $theme_keys = array($theme);
        }

        foreach ($theme_keys as $theme_key) {
            if (!empty($themes[$theme_key]->info[$setting_name])) {
                $output[$setting_name] = $themes[$theme_key]->info[$setting_name];
            }
        }
    }

    return $output;
}


//
// Implements hook_html_head_alter().
//
function ideabank_html_head_alter(&$head_elements) {

    // remove meta tags
    unset($head_elements['system_meta_generator']);

    foreach ($head_elements as $key => $element) {
        //if (isset($element['#attributes']['rel']) && $element['#attributes']['rel'] == 'canonical') {
        //  unset($head_elements[$key]);
        //}
        if (isset($element['#attributes']['rel']) && $element['#attributes']['rel'] == 'shortlink') {
          unset($head_elements[$key]);
        }
    }

}


function ideabank_form_comment_form_alter(&$form, &$form_state) {
    $form['author']['#access'] = FALSE;
}
