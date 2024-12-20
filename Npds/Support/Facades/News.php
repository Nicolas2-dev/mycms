<?php

declare(strict_types=1);

namespace Npds\Support\Facades;

use Npds\News\News as NewsManager;


/**
 * Undocumented class
 */
class News
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
        $instance = NewsManager::getInstance();

        return call_user_func_array(array($instance, $method), $parameters);
    }

}
