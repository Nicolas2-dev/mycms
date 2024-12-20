<?php

namespace Npds\Support\Facades;

use Npds\Cache\Cache as CacheManager;


/**
 * Undocumented class
 */
class Cache
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
        $instance = CacheManager::getInstance();

        return call_user_func_array(array($instance, $method), $parameters);
    }

}
