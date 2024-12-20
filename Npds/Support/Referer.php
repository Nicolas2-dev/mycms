<?php

declare(strict_types=1);

namespace Npds\Support;

use Npds\Config\Config;
use Npds\Support\Facades\Security;


/**
 * Class Referer
 */
class Referer
{

    /**
     * [update description]
     *
     * @return  void
     */
    public static function update()
    {
        if (Config::get('npds.httpref') == 1) {
            $referer = htmlentities(strip_tags(Security::remove(getenv("HTTP_REFERER"))), ENT_QUOTES, 'UTF-8');

            if ($referer != '' and !strstr($referer, "unknown") and !stristr($referer, $_SERVER['SERVER_NAME'])) {
                sql_query("INSERT INTO " . sql_prefix('referer') . " 
                        VALUES (NULL, '$referer')");
            }
        } 
    }

}
