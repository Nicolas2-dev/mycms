<?php

namespace Npds\Support\Facades;

use Npds\Date\Date as DateManager;


/**
 * Undocumented class
 */
class Date
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
        $instance = DateManager::getInstance();

        return call_user_func_array(array($instance, $method), $parameters);
    }

}
