<?php

namespace Npds\Support\Facades;

use Npds\Spam\spam as spamManager;


/**
 * Undocumented class
 */
class Spam
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
        $instance = spamManager::getInstance();

        return call_user_func_array(array($instance, $method), $parameters);
    }

}
