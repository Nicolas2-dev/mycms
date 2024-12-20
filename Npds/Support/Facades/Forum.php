<?php

namespace Npds\Support\Facades;

use Npds\Forum\Forum as ForumManager;


/**
 * Undocumented class
 */
class Forum
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
        $instance = ForumManager::getInstance();

        return call_user_func_array(array($instance, $method), $parameters);
    }

}
