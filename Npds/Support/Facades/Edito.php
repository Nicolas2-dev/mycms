<?php

namespace Npds\Support\Facades;

use Npds\Edito\Edito as EditoManager;


/**
 * Undocumented class
 */
class Edito
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
        $instance = EditoManager::getInstance();

        return call_user_func_array(array($instance, $method), $parameters);
    }

}
