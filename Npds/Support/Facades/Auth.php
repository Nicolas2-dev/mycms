<?php

declare(strict_types=1);

namespace Npds\Support\Facades;

use Npds\Auth\Auth as AuthManager;


/**
 * Undocumented class
 */
class Auth
{

    /**
     * Undocumented function
     *
     * @param [type] $method
     * @param [type] $parameters
     * @return void
     */
    public static function __callStatic(string $method, array $parameters)
    {
        $instance = AuthManager::getInstance();

        return call_user_func_array(array($instance, $method), $parameters);
    }

}
