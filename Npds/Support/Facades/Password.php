<?php

namespace Npds\Support\Facades;

use Npds\Password\Password as PasswordManager;


/**
 * Undocumented class
 */
class Password
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
        $instance = PasswordManager::getInstance();

        return call_user_func_array(array($instance, $method), $parameters);
    }

}
