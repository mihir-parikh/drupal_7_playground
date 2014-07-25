<?php
/**
 * @file Edu overrides theme settings callbacks
 */

/**
 * Implements hook_form_FORM_ID_alter()
 */
function edu_theme_overrides_form_system_theme_settings_alter(&$form, &$form_state){
    $form["background_input_fields"] = array(
        "#type" => "textfield",
        "#title" => "Background color for input fields",
        "#default_value" => theme_get_setting("background_input_fields"),
        "#description" => "Select background color for input fields.",
        "#weight" => -3
    );
}