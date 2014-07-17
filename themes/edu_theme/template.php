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
    
    //Test for a path
    $regex = "node/*";
    //Given the drupal internal path, return the alias set by the administrator
    $path = drupal_get_path_alias($_GET["q"]);
    //Check if the path matches any pattern or a set of pattern
    $page_match = drupal_match_path($path, $regex);
    //If alias and internal paths are not same. I.e. if there is an alias for path
    if($path != $_GET["q"]){
        //If alias has "node" or Drupal internal path has "node"
        $page_match = $page_match || drupal_match_path($_GET["q"], $regex);
    }
    if($page_match){
        drupal_add_css(drupal_get_path("theme", "edu_theme")."/style.css");
    }
    
    //Test for a role
    $role = "administrator";
    if(in_array($role, $variables["user"]->roles)){
        drupal_add_js(drupal_get_path("theme", "edu_theme")."/edu_theme.js");
    }
}