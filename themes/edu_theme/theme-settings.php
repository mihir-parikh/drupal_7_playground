<?php

/**
 * @file
 * Theme configuration functions for edu_theme.
 */

/**
 * Implements hook_form_FORM_ID_alter().
 */
function edu_theme_form_system_theme_settings_alter(&$form, &$form_state){
    $form["edu_theme_subheading"] = array(
        "#type" => "textfield", 
        "#weight" => -2,         
        "#title" => "Edu theme sub-heading", 
        "#description" => "Displays sub-heading below main heading on every page of Edu theme", 
        "#default_value" => theme_get_setting("edu_theme_subheading")        
    );
}