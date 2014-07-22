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

