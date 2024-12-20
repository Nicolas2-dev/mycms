<?php

namespace Npds\Support\Facades;

use Npds\Online\Online as OnlineManager;


/**
 * Undocumented class
 */
class Online
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
        $instance = OnlineManager::getInstance();

        return call_user_func_array(array($instance, $method), $parameters);
    }

}
