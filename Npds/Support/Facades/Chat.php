<?php

namespace Npds\Support\Facades;

use Npds\Chat\Chat as ChatManager;


/**
 * Undocumented class
 */
class Chat
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
        $instance = ChatManager::getInstance();

        return call_user_func_array(array($instance, $method), $parameters);
    }

}