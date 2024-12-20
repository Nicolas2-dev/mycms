<?php

namespace Npds\Support\Facades;

use Npds\Theme\Theme as ThemeManager;

/**
 * Undocumented class
 */
class Theme
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
        $instance = ThemeManager::getInstance();

        return call_user_func_array(array($instance, $method), $parameters);
    }

}
