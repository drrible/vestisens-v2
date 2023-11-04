<?php


use Carbon\Carbon;

if (!function_exists('help_get_front_date')) {
     function help_get_front_date($dateVal){
        return  Carbon::parse($dateVal)->format('d.m.Y');
    }
}
