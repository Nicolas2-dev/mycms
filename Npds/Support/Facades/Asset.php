<?php

namespace Npds\Support\Facades;

use Npds\Assets\Assets as AssetManager;


/**
 * Undocumented class
 */
class Asset
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
        $instance = AssetManager::getInstance();

        return call_user_func_array(array($instance, $method), $parameters);
    }

}
