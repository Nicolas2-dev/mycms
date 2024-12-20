<?php

/************************************************************************/
/* DUNE by NPDS                                                         */
/* ===========================                                          */
/*                                                                      */
/* DYNAMIC THEME engine for NPDS                                        */
/* NPDS Copyright (c) 2002-2024 by Philippe Brunier                     */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 3 of the License.       */
/************************************************************************/
global $theme, $Start_Page;

$rep = false;

$Start_Page = str_replace('/', '', $Start_Page);

settype($ContainerGlobal, 'string');

if (file_exists("Themes/" . $theme . "/html/header.html")) {
    $rep = $theme;
} elseif (file_exists("Themes/default/html/header.html")) {
    $rep = 'default';
} else {
    echo 'header.html manquant / not find !<br />';
    die();
}

if ($rep) {
    if (file_exists("Themes/default/include/body_onload.inc") or file_exists("Themes/$theme/include/body_onload.inc")) {
        $onload_init = ' onload="init();"';
    } else {
        $onload_init = '';
    }

    if (!$ContainerGlobal) {
        echo '<body' . $onload_init . ' class="body" data-bs-theme="' . $theme_darkness . '">';
    } else {
        echo '<body' . $onload_init . ' data-bs-theme="' . $theme_darkness . '">';
        echo $ContainerGlobal;
    }

    ob_start();
    // landing page
    if (stristr($_SERVER['REQUEST_URI'], $Start_Page) and file_exists("Themes/" . $rep . "/html/header_landing.html")) {
        include("Themes/" . $rep . "/html/header_landing.html");
    } else {
        include("Themes/" . $rep . "/html/header.html");
    }

    $Xcontent = ob_get_contents();
    ob_end_clean();

    echo meta_lang(aff_langue($Xcontent));
}
