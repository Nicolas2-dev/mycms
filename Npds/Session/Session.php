<?php

declare(strict_types=1);

namespace Npds\Session;

use Npds\Config\Config;
use Npds\Support\Facades\Request;


/**
 * Class Session
 */
class Session 
{

    /**
     * Instance Session.
     *
     * @var \Npds\Session $instance
     */
    protected static Session $instance;


    /**
     * Constructeur.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get instance class Session.
     *
     * @return \Npds\Session $instance
     */
    public static function getInstance()
    {
        if (isset(static::$instance)) {
            return static::$instance;
        }

        return static::$instance = new static();
    }
 
    /**
     * Mise à jour la table session
     *
     * @return  void
     */
    public function session_manage()
    {
        global $cookie, $REQUEST_URI;

        $guest = 0;
        $ip = Request::getip();

        $username = isset($cookie[1]) ? $cookie[1] : $ip;

        if ($username == $ip) {
            $guest = 1;
        }

        // geoloc
        include(module_path('geoloc/geoloc.conf'));

        if ($geo_ip == 1) {
            include module_path('geoloc/geoloc_refip.php');
        }

        $past = time() - 300;

        sql_query("DELETE FROM " . sql_prefix('session') . " WHERE time < '$past'");

        // to be defined in config.php ...           
        $gulty_robots = array('facebookexternalhit', 
                              'Amazonbot', 
                              'ClaudeBot', 
                              'bingbot', 
                              'Applebot', 
                              'AhrefsBot'); 
        
        foreach ($gulty_robots as $robot) {
            if (!empty($_SERVER['HTTP_USER_AGENT']) && strpos($_SERVER['HTTP_USER_AGENT'], $robot) !== false) {

                $result = sql_query("SELECT agent 
                                     FROM " . sql_prefix('session') . " 
                                     WHERE agent REGEXP '" . $robot . "'");

                if (sql_num_rows($result) > 3) {
                    header($_SERVER["SERVER_PROTOCOL"] . ' 429 Too Many Requests');

                    echo 'Too Many Requests';
                    die;
                }
            }
        }

        $result = sql_query("SELECT time 
                             FROM " . sql_prefix('session') . " 
                             WHERE username='$username'");

        if ($row = sql_fetch_assoc($result)) {
            if ($row['time'] < (time() - 30)) {

                sql_query("UPDATE " . sql_prefix('session') . " 
                           SET username='$username', 
                               time='" . time() . "', 
                               host_addr='$ip', 
                               guest='$guest', 
                               uri='$REQUEST_URI', 
                               agent='" . getenv("HTTP_USER_AGENT") . "' 
                           WHERE username='$username'");

                if ($guest == 0) {
                    sql_query("UPDATE " . sql_prefix('users') . " 
                               SET user_lastvisit='" . (time() + (int) Config::get('npds.gmt') * 3600) . "' 
                               WHERE uname='$username'");
                }
            }
        } else {
            sql_query("INSERT INTO " . sql_prefix('session') . " (username, time, host_addr, guest, uri, agent) 
                       VALUES ('$username', '" . time() . "', '$ip', '$guest', '$REQUEST_URI', '" . getenv("HTTP_USER_AGENT") . "')");
        }
    }

}
