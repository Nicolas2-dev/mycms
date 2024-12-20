<?php

declare(strict_types=1);

namespace Npds\Support\Facades;

use Npds\Url\Url as UrlManager;


/**
 * Undocumented class
 */
class Url
{

    /**
     * Undocumented function
     *
     * @param [type] $method
     * @param [type] $parameters
     * @return void
     */
    public static function __callStatic(string $method, array $parameters)
    {
        $instance = UrlManager::getInstance();

        return call_user_func_array(array($instance, $method), $parameters);
    }

}
