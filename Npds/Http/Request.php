<?php

declare(strict_types=1);

namespace Npds\Http;

use Npds\Support\Arr;
use Npds\Http\HttpProtect;


/**
 * Undocumented class
 */
class Request 
{

    /**
     * Instance Request.
     *
     * @var \Npds\Request\Request $instance
     */
    protected static Request $instance;

    /**
     * 
     *
     * @var string
     */
    protected $method;

    /**
     * 
     *
     * @var array
     */
    protected $headers;

    /**
     * 
     *
     * @var array
     */
    protected $server;

    /**
     * 
     *
     * @var array
     */
    protected $query;

    /**
     * 
     *
     * @var array
     */
    protected $post;

    /**
     * 
     *
     * @var array
     */
    protected $files;

    /**
     * 
     *
     * @var array
     */
    protected $cookies;


    /**
     * 
     *
     * @param   string $method   [$method description]
     * @param   array  $headers  [$headers description]
     * @param   array  $server   [$server description]
     * @param   array  $query    [$query description]
     * @param   array  $post     [$post description]
     * @param   array  $files    [$files description]
     * @param   array  $cookies  [$cookies description]
     *
     * @return  void
     */
    public function __construct(string $method, array $headers, array $server, array $query, array $post, array $files, array $cookies)
    {
        //
        $this->method = strtoupper($method);

        //
        $this->headers = array_change_key_case($headers);

        //
        $this->server  = $server;

        //
        $this->query   = $query;

        //
        $this->post    = $post;

        //
        $this->files   = $files;

        //
        $this->cookies = $cookies;
    }

    /**
     * 
     *
     * @return  \Npds\Request
     */
    public static function getInstance()
    {
        if (isset(static::$instance)) {
            return static::$instance;
        }

        // Get the HTTP method.
        $method = self::getHttpMethod();

        // Get the request headers.
        $headers = apache_request_headers();

        array_walk_recursive($_GET, [HttpProtect::class, 'addslashes_GPC']);
        array_walk_recursive($_GET, [HttpProtect::class, 'url_protect']);
        array_walk_recursive($_POST, [HttpProtect::class, 'addslashes_GPC']);

        return static::$instance = new static($method, $headers, $_SERVER, $_GET, $_POST, $_FILES, $_COOKIE);
    }

    /**
     * Get the HTTP method.
     *
     * @return  [type]  [return description]
     */
    public static function getHttpMethod()
    {
        $method = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : 'GET';

        if (isset($_SERVER['HTTP_X_HTTP_METHOD_OVERRIDE'])) {
            $method = $_SERVER['HTTP_X_HTTP_METHOD_OVERRIDE'];

        } elseif (isset($_REQUEST['_method'])) {
            $method = $_REQUEST['_method'];
        }

        return $method;
    }

    /**
     * 
     *
     * @return  string
     */
    public static function getip()
    {
        if (isset($_SERVER)) {
            if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
               $realip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
               $realip = $_SERVER['HTTP_CLIENT_IP'];
            } else {
               $realip = $_SERVER['REMOTE_ADDR'];
            }
        } else {
            if (getenv('HTTP_X_FORWARDED_FOR')) {
                $realip = getenv('HTTP_X_FORWARDED_FOR');
            } elseif (getenv('HTTP_CLIENT_IP')) {
                $realip = getenv('HTTP_CLIENT_IP');
            } else { 
                $realip = getenv('REMOTE_ADDR');
            }
        }

        if (strpos($realip, ",") > 0) {
            $realip = substr($realip, 0, strpos($realip, ",") - 1);
        }

        return trim($realip);
    }

    /**
     * 
     *
     * @return  string|bool
     */
    public function ajax()
    {
        if (! is_null($header = Arr::get($this->server, 'HTTP_X_REQUESTED_WITH'))) {
            return strtolower($header) === 'xmlhttprequest';
        }

        return false;
    }

    /**
     * 
     *
     * @return  mixed
     */
    public function previous()
    {
        return Arr::get($this->server, 'HTTP_REFERER');
    }

    /**
     * 
     *
     * @param   mixed  $key  [$key description]
     *
     * @return  mixed
     */
    public function server(mixed $key = null)
    {
        if (is_null($key)) {
            return $this->server;
        }

        return Arr::get($this->server, $key);
    }

    /**
     * 
     *
     * @param   mixed  $key  [$key description]
     *
     * @return  array
     */
    public function getServer()
    {
        return $this->server;
    }

    /**
     * 
     *
     * @param   mixed  $key      [$key description]
     * @param   mixed  $default  [$default description]
     *
     * @return  mixed
     */
    public function input(mixed $key, mixed $default = null)
    {
        $input = ($this->method == 'GET') ? $this->query : $this->post;

        return Arr::get($input, $key, $default);
    }
    
    /**
     * 
     *
     * @return  array
     */
    public function inputAll()
    {
        return $this->post;
    }

    /**
     * 
     *
     * @param   mixed  $key      [$key description]
     * @param   mixed  $default  [$default description]
     *
     * @return  mixed
     */
    public function query(mixed $key = null, mixed $default = null)
    {
        if (is_null($key)) {
            return $this->query;
        }

        return Arr::get($this->query, $key, $default);
    }

    /**
     * 
     *
     * @return  array
     */
    public function queryAll()
    {
        return $this->query;
    }

    /**
     * 
     *
     * @return  array
     */
    public function files()
    {
        return $this->files;
    }

    /**
     * 
     *
     * @param   mixed  $key  [$key description]
     *
     * @return  mixed
     */
    public function file(mixed $key)
    {
        return Arr::get($this->files, $key);
    }

    /**
     * 
     *
     * @param   mixed  $key  [$key description]
     *
     * @return  bool
     */
    public function hasFile(mixed $key)
    {
        return Arr::has($this->files, $key);
    }

    /**
     * 
     *
     * @return  string
     */
    public function cookies()
    {
        return $this->cookies;
    }

    /**
     * 
     *
     * @param   mixed  $key      [$key description]
     * @param   mixed  $default  [$default description]
     *
     * @return  mixed
     */
    public function cookie(mixed $key, mixed $default = null)
    {
        return Arr::get($this->cookies, $key, $default);
    }

    /**
     * 
     *
     * @param   mixed  $key  [$key description]
     *
     * @return  mixed
     */
    public function hasCookie(mixed $key)
    {
        return Arr::has($this->cookies, $key);
    }

}
