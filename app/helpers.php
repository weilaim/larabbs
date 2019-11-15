<?php

function route_class(){
    return str_replace('.','-',Route::currentRouteName());
}

function category_nav_active($category_id)
{
    return active_class((if_route('categories.show') && if_route_param('category', $category_id)));
}

function sbr_conten($centent){
    return mb_substr(strip_tags($centent),0,80).'。';
}

// app\Observers
function make_excerpt($value, $length = 200)
{
    $excerpt = trim(preg_replace('/\r\n|\r|\n+/', ' ', strip_tags($value)));
    return Str::limit($excerpt, $length);
}
