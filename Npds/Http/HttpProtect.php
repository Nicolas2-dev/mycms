<?php

declare(strict_types=1);

namespace Npds\Http;

use Npds\Config\Config;
use Npds\Support\Access;


/**
 * HttpProtect class
 */
class HttpProtect
{

    /**
     * [$bad_uri_name description]
     *
     * @var array
     */
    protected static array $bad_uri_name = [
        'GLOBALS', 
        '_SERVER', 
        '_REQUEST', 
        '_GET', 
        '_POST', 
        '_FILES', 
        '_ENV', 
        '_COOKIE', 
        '_SESSION'
    ];


    /**
     * [addslashes_GPC description]
     *
     * @param   mixed  $arr  [$arr description]
     *
     * @return
     */
    public static function addslashes_GPC(mixed &$arr)
    {
        $arr = addslashes($arr);
    }
    
    /**
     * [url_protect description]
     *
     * @param   mixed  $arr  [$arr description]
     * @param   mixed  $key  [$key description]
     *
     * @return  void
     */
    public static function url_protect(mixed $arr, mixed $key)
    {
        $arr = rawurldecode($arr);
        $RQ_tmp = strtolower($arr);
        $RQ_tmp_large = strtolower($key) . "=" . $RQ_tmp;

        $bad_uri_content = Config::get('urlprotect.bad_uri_content');

        if (
            in_array($RQ_tmp, $bad_uri_content)
            or
            in_array($RQ_tmp_large, $bad_uri_content)
            or
            in_array($key, static::bad_uri_key(), true)
            or
            count(static::badname_in_uri()) > 0
        ) {
            Access::denied();
        }
    }

    /**
     * [post_protect description]
     *
     * @param   mixed  $arr  [$arr description]
     * @param   mixed  $key  [$key description]
     *
     * @return  void
     */
    public static function post_protect(mixed $arr, mixed $key)
    {
        $bad_uri_key = static::bad_uri_key();

        $badname_in_uri = static::badname_in_uri();

        $bad_uri_content = Config::get('urlprotect.bad_uri_content');
    
        if(
            in_array($key, $bad_uri_key,true)
            OR
            count($badname_in_uri)>0
        ) {
            unset($bad_uri_content);
            unset($bad_uri_key);
            unset($badname_in_uri);

            Access::denied();
        }
    }

    /**
     * [bad_uri_key description]
     *
     * @return  array
     */
    private static function bad_uri_key()
    {
        return array_keys($_SERVER);
    }
    
    /**
     * [badname_in_uri description]
     *
     * @return  array
     */
    private static function badname_in_uri() 
    {
        return array_intersect(array_keys($_GET), static::$bad_uri_name);
    }

}
