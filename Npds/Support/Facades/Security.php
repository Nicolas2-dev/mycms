<?php

namespace Npds\Support\Facades;

use Npds\Security\Hack as SecurityManager;


/**
 * Undocumented class
 */
class Security
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
        $instance = SecurityManager::getInstance();

        return call_user_func_array(array($instance, $method), $parameters);
    }

}
