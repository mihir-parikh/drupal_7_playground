<?php
/**
 * Manipulate page.tpl.php variables
 */
function edu_theme_preprocess_page(&$variables){
    $variables["edu_theme_subheading"] = theme_get_setting("edu_theme_subheading");
    
    //Test for article node type
    if(isset($variables["node"])){
        if($variables["node"]->type == "article"){
            drupal_add_css(drupal_get_path("theme", "edu_theme")."/style.css");
        }
    }
}