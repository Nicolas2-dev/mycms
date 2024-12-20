<?php

namespace Npds\Support\Facades;

use Npds\Code\Code as CodeManager;


/**
 * Undocumented class
 */
class Code
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
        $instance = CodeManager::getInstance();

        return call_user_func_array(array($instance, $method), $parameters);
    }

}
