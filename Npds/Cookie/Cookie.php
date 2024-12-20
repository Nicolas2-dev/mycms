<?php

declare(strict_types=1);

namespace Npds\Cookie;


/**
 * Undocumented class
 */
class Cookie 
{

    /**
     * Instance Cookie.
     *
     * @var \Npds\Cookie\Cookie $instance
     */
    protected static Cookie $instance;


    /**
     * Constructeur.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get instance class Cookie.
     *
     * @return \Npds\Cookie $instance
     */
    public static function getInstance()
    {
        if (isset(static::$instance)) {
            return static::$instance;
        }

        return static::$instance = new static();
    }

    /**
     * Décode le cookie membre et vérifie certaines choses (password)
     *
     * @param   mixed  $user  [$user description]
     *
     * @return  array|bool
     */
    public static function cookiedecode(mixed $user)
    {
        global $language;

        $stop = false;

        if (array_key_exists("user", $_GET)) {
            if ($_GET['user'] != '') {
                $stop = true;
                $user = "BAD-GET";
            }
        } else if (isset($HTTP_GET_VARS)) {
            // if (array_key_exists("user", $HTTP_GET_VARS) and ($HTTP_GET_VAR['user'] != '')) {
            if (array_key_exists("user", $HTTP_GET_VARS)) {
                $stop = true;
                $user = "BAD-GET";
            }
        }

        if ($user) {
            $cookie = explode(':', base64_decode($user));

            settype($cookie[0], "integer");

            if (trim($cookie[1]) != '') {
                $result = sql_query("SELECT pass, user_langue 
                                    FROM " . sql_prefix('users') . " 
                                    WHERE uname='$cookie[1]'");
                
                if (sql_num_rows($result) == 1) {
                    list($pass, $user_langue) = sql_fetch_row($result);
                    
                    if (($cookie[2] == md5($pass)) and ($pass != '')) {
                        if ($language != $user_langue) {
                            sql_query("UPDATE " . sql_prefix('users') . " 
                                    SET user_langue='$language' 
                                    WHERE uname='$cookie[1]'");
                        }

                        return $cookie;
                    } else {
                        $stop = true;
                    }
                } else {
                    $stop = true;
                }
            } else {
                $stop = true;
            }

            if ($stop) {
                setcookie('user', '', 0);
                unset($user);
                unset($cookie);

                header("Location: index.php");
            }
        }
    }

}
