<?php

namespace Npds\Support\Facades;

use Npds\Groupe\Groupe as GroupeManager;


/**
 * Undocumented class
 */
class Groupe
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
        $instance = GroupeManager::getInstance();

        return call_user_func_array(array($instance, $method), $parameters);
    }

}
