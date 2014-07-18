<?php

//Add "THEME_LINK()" to every link
function edu_theme_overrides_preprocess_link(&$variables){
//    $variables["text"] .= "THEME_LINK()";
}

function edu_theme_overrides_preprocess_image(&$variables){
    $variables["path"] = "misc/druplicon.png";
}

