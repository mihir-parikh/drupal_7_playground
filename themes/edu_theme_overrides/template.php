<?php

//Add "THEME_LINK()" to every link
function edu_theme_overrides_preprocess_link(&$variables){
//    $variables["text"] .= "THEME_LINK()";
    if(strpos($variables["text"], "Read more") !== FALSE){
        $variables["text"] = str_replace("Read more", "Click me!", $variables["text"]);
    }
}

function edu_theme_overrides_preprocess_image(&$variables){
//    global $user;
//    if($user->uid == 0){
//        $variables["path"] = "misc/druplicon.png";
//    }    
}

//Use different templates based on conditions
function edu_theme_overrides_preprocess_page(&$variables){    
    //The following log in page will be displayed for anonymous user
    if($variables["user"]->uid == 0 && $_GET["q"] != "user"){
        //Adding a new variable in preprocess function which will be available in page.tpl.php
        $variables["log_in"] = l("log in", "user");
        //For any anonymous users, this template file will be displayed
        $variables["theme_hook_suggestions"][] = "page__anonymous";
    }
    
    if(isset($variables["node"])){
        $variables["theme_hook_suggestions"][] = "page__".$variables["node"]->type;
    }
    
    //Combination of both of the above condition
    if($variables["user"]->uid == 0 && $_GET["q"] != "user"){
        if(isset($variables["node"])){
            $variables["theme_hook_suggestions"][] = "page__anonymous__".$variables["node"]->type;
        }
    }
}

//Override theme_image()
function edu_theme_overrides_image($variables) {
  $attributes = $variables['attributes'];
  $attributes['src'] = file_create_url($variables['path']);

  foreach (array('width', 'height', 'alt', 'title') as $key) {

    if (isset($variables[$key])) {
      $attributes[$key] = $variables[$key];
    }
  }

  return '<img' . drupal_attributes($attributes) . ' /><p>Overriding theme_image()</p>';
}

function edu_theme_overrides_username($variables) {
  //Override original $variables['name']
  $variables['name'] = $variables['name']." OVERRIDDEN!";
  if (isset($variables['link_path'])) {
    // We have a link path, so we should generate a link using l().
    // Additional classes may be added as array elements like
    // $variables['link_options']['attributes']['class'][] = 'myclass';
    $output = l($variables['name'] . $variables['extra'], $variables['link_path'], $variables['link_options']);
  }
  else {
    // Modules may have added important attributes so they must be included
    // in the output. Additional classes may be added as array elements like
    // $variables['attributes_array']['class'][] = 'myclass';
    $output = '<span' . drupal_attributes($variables['attributes_array']) . '>' . $variables['name'] . $variables['extra'] . '</span>';
  }
  return $output;
}