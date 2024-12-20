<?php

namespace Npds\Support\Facades;

use Npds\Editeur\Editeur as EditeurManager;


/**
 * Undocumented class
 */
class Editeur
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
        $instance = EditeurManager::getInstance();

        return call_user_func_array(array($instance, $method), $parameters);
    }

}
