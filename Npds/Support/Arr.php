<?php

declare(strict_types=1);

namespace Npds\Support;


class Arr
{

    
    public static function set(array &$array, $path, $value)
    {
        $segments = explode('.', $path);

        while (count($segments) > 1) {
            $segment = array_shift($segments);

            if (!isset($array[$segment]) || !is_array($array[$segment])) {
                $array[$segment] = [];
            }

            $array =& $array[$segment];
        }

        $array[array_shift($segments)] = $value;
    }


    public static function has(array $array, $path)
    {
        $segments = explode('.', $path);

        foreach ($segments as $segment) {
            if (!is_array($array) || !isset($array[$segment])) {
                return false;
            }

            $array = $array[$segment];
        }

        return true;
    }


    public static function get(array $array, $path, $default = null)
    {
        $segments = explode('.', $path);

        foreach ($segments as $segment) {
            if (!is_array($array) || !isset($array[$segment])) {
                return $default;
            }

            $array = $array[$segment];
        }

        return $array;
    }


    public static function remove(array &$array, $path)
    {
        $segments = explode('.', $path);

        while (count($segments) > 1) {
            $segment = array_shift($segments);

            if (!isset($array[$segment]) || !is_array($array[$segment])) {
                return false;
            }

            $array =& $array[$segment];
        }
        
        unset($array[array_shift($segments)]);

        return true;
    }


    public static function rand(array $array)
    {
        return $array[array_rand($array)];
    }


    public static function isAssoc(array $array)
    {
        return count(array_filter(array_keys($array), 'is_string')) === count($array);
    }


    public static function value(array $array, $key)
    {
        return array_map(function ($value) use ($key) {
            return is_object($value) ? $value->$key : $value[$key];
        }, $array);
    }

}
