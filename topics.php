<?php

use Npds\Support\Facades\Url;
use Npds\Support\Facades\Theme;
use Npds\Support\Facades\Language;
use Npds\Support\Facades\Metalang;


if (!function_exists("Mysql_Connexion")) {
    include("Boot/grab_globals.php");
}

settype($op, 'string');

if ($op != "maj_subscribe") {

    Theme::header();

    $inclusion = false;

    if (file_exists("themes/$theme/html/topics.html")) {
        $inclusion = "themes/$theme/html/topics.html";

    } elseif (file_exists("themes/default/html/topics.html")) {
        $inclusion = "themes/default/html/topics.html";
    } else {
        echo 'html/topics.html / not find !<br />';
    }

    if ($inclusion) {
        ob_start();
            include($inclusion);
            $Xcontent = ob_get_contents();
        ob_end_clean();

        echo Metalang::meta_lang(Language::aff_langue($Xcontent));
    }

    include("footer.php");
} else {
    if ($subscribe) {
        if ($user) {
            $result = sql_query("DELETE FROM " . sql_prefix('subscribe') . " 
                                 WHERE uid='$cookie[0]' 
                                 AND topicid!=NULL");

            $selection = sql_query("SELECT topicid 
                                    FROM " . sql_prefix('topics') . " 
                                    ORDER BY topicid");

            while (list($topicid) = sql_fetch_row($selection)) {
                if (isset($Subtopicid)) {

                    if (array_key_exists($topicid, $Subtopicid)) {

                        if ($Subtopicid[$topicid] == "on") {
                            $resultX = sql_query("INSERT INTO " . sql_prefix('subscribe') . " (topicid, uid) 
                                                  VALUES ('$topicid','$cookie[0]')");
                        }
                    }
                }
            }

            Url::redirect_url("topics.php");
        }
    }
}
