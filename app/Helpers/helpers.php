<?php

if(!function_exists('user')){

    function user($guard = null)
    {

        if (Auth::guard($guard)->check()) {
            return Auth::guard($guard)->user();
        }

        return null;
    }
}