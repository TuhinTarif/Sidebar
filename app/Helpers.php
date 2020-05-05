<?php

function is_path($path)
{
    return call_user_func_array('Request::is', (array) $path);
}

function is_path_active($path, $active=true, $false=false)
{
    return call_user_func_array('Request::is', (array) $path) ? $active : $false;
}

function is_route_active($routeNamed, $active=true, $falseCondition=false, $extraRules=null)
{
    $route = call_user_func_array('Route::getFacadeRoot', []);

    if(is_array($routeNamed))
    {
        $condition = in_array($route->currentRouteName(), $routeNamed);
    }
    else
    {
        $condition = $route->currentRouteName() === $routeNamed;
    }

    if(!is_null($extraRules))
    {
        $condition = $condition && $extraRules;
    }

    return $condition ? $active : $falseCondition;
}