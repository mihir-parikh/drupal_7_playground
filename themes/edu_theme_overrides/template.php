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

