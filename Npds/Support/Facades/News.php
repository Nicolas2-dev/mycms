<?php

namespace Npds\Support\Facades;

use Npds\News\News as NewsManager;


/**
 * Undocumented class
 */
class News
{

    /**
     * Undocumented function
     *
     * @param [type] $method
     * @param [type] $parameters
     * @return void
     */
    public static function __callStatic($method, $parameters)
    {
        $instance = NewsManager::getInstance();

        return call_user_func_array(array($instance, $method), $parameters);
    }

}
