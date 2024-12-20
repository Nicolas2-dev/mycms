<?php

declare(strict_types=1);

namespace Npds\Http;


class Controller
{

    /**
     * [callAction description]
     *
     * @param   string  $method      [$method description]
     * @param   array   $parameters  [$parameters description]
     *
     * @return  mixed
     */
    public function callAction(string $method, array $parameters)
    {
        return call_user_func_array(array($this, $method), $parameters);
    }

}
