<?php

namespace Npds\Support;

use Npds\Config\Config;


class Referer
{

    /**
     * 
     */
    public static function update()
    {
        if (Config::get('npds.httpref') == 1) {
            $referer = htmlentities(strip_tags(removeHack(getenv("HTTP_REFERER"))), ENT_QUOTES, 'UTF-8');

            if ($referer != '' and !strstr($referer, "unknown") and !stristr($referer, $_SERVER['SERVER_NAME'])) {
                sql_query("INSERT INTO " . sql_prefix('referer') . " 
                        VALUES (NULL, '$referer')");
            }
        } 
    }

}
