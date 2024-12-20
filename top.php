<?php

use Npds\Cache\SuperCacheEmpty;
use Npds\Cache\SuperCacheManager;


if (!function_exists("Mysql_Connexion")) {
    include("Boot/grab_globals.php");
}

if ($SuperCache) { 
    $cache_obj = new SuperCacheManager();
} else {
    $cache_obj = new SuperCacheEmpty();
}

include("header.php");

if (($SuperCache) and (!$user)) {
    $cache_obj->startCachingPage();
}

if (($cache_obj->genereting_output == 1) or ($cache_obj->genereting_output == -1) or (!$SuperCache) or ($user)) {
    $inclusion = false;

    if (file_exists(theme_path($theme .'/html/top.html'))) {
        $inclusion = theme_path($theme .'/html/top.html');
    } elseif (file_exists(theme_path('default/html/top.html'))) {
        $inclusion = theme_path('default/html/top.html');
    } else {
        echo theme_path($theme .'/html/top.html'). ' or '. theme_path('default/html/top.html') .' / not find !<br />';
    }

    if ($inclusion) {
        ob_start();
            include($inclusion);
            $Xcontent = ob_get_contents();
        ob_end_clean();

        echo meta_lang(aff_langue($Xcontent));
    }
}

// -- SuperCache
if (($SuperCache) and (!$user)) {
    $cache_obj->endCachingPage();
}

include("footer.php");
