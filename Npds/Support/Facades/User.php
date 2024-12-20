<?php

namespace Npds\Support\Facades;

use Npds\User\User as UserManager;


/**
 * Undocumented class
 */
class User
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
        $instance = UserManager::getInstance();

        return call_user_func_array(array($instance, $method), $parameters);
    }

}
