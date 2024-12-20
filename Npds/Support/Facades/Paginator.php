<?php

namespace Npds\Support\Facades;

use Npds\Paginator\Paginator as PaginatorManager;


/**
 * Undocumented class
 */
class Paginator
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
        $instance = PaginatorManager::getInstance();

        return call_user_func_array(array($instance, $method), $parameters);
    }

}
