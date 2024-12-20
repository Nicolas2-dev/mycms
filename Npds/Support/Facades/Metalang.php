<?php

declare(strict_types=1);

namespace Npds\Support\Facades;

use Npds\Metalang\Metalang as MetalangManager;


/**
 * Undocumented class
 */
class Metalang
{

    /**
     * Undocumented function
     *
     * @param string $method
     * @param array  $parameters
     * 
     * @return void
     */
    public static function __callStatic(string $method, array $parameters)
    {
        $instance = MetalangManager::getInstance();

        return call_user_func_array(array($instance, $method), $parameters);
    }

}
