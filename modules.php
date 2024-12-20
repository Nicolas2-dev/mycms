<?php

declare(strict_types=1);

use Npds\Support\Access;

include("Boot/grab_globals.php");


/**
 * [filtre_module description]
 *
 * @param   string  $strtmp  [$strtmp description]
 *
 * @return  bool
 */
function filtre_module(string $strtmp)
{
    if (strstr($strtmp, '..') || 
    stristr($strtmp, 'script') || 
    stristr($strtmp, 'cookie') || 
    stristr($strtmp, 'iframe') || 
    stristr($strtmp, 'applet') || 
    stristr($strtmp, 'object')) 
    {
        Access::error();
    } else {
        return $strtmp != '' ? true : false;
    }
}

if (filtre_module($ModPath) and filtre_module($ModStart)) {
    
    if (!function_exists("Mysql_Connexion")) {
        include("Boot/grab_globals.php");
    }

    $module_path = module_path($ModPath . '/' . $ModStart . '.php');

    if (file_exists($module_path)) {
        include($module_path);
        die();
    } else {
        Access::error();
    }
} else {
    Access::error();
}
