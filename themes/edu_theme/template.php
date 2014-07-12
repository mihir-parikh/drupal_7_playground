<?php
/**
 * Manipulate page.tpl.php variables
 */
function edu_theme_preprocess_page(&$variables){
    $variables["edu_theme_subheading"] = theme_get_setting("edu_theme_subheading");
}