<?php

namespace Npds\Support\Facades;

use Npds\Http\Request as RequestManager;


/**
 * Undocumented class
 */
class Request
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
        $instance = RequestManager::getInstance();

        return call_user_func_array(array($instance, $method), $parameters);
    }

}
