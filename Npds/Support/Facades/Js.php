<?php

namespace Npds\Support\Facades;

use Npds\Assets\Js as JsManager;


/**
 * Undocumented class
 */
class Js
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
        $instance = JsManager::getInstance();

        return call_user_func_array(array($instance, $method), $parameters);
    }

}
