<?php

declare(strict_types=1);

namespace Npds\Log;

use Npds\Http\Request;


/**
 * Undocumented class
 */
class Log 
{

    /**
     * Instance Log.
     *
     * @var \Npds\Log\Log $instance
     */
    protected static Log $instance;

    
    /**
     * Constructeur.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get instance class Log.
     *
     * @return \Npds\Log\Log $instance
     */
    public static function getInstance()
    {
        if (isset(static::$instance)) {
            return static::$instance;
        }

        return static::$instance = new static();
    }

    /**
     * Pour écrire dans un fichier log.
     *
     * @param   string  $fic_log  [$fic_log description]
     * @param   string  $req_log  [$req_log description]
     * @param   string  $mot_log  [$mot_log description]
     *
     * @return  void
     */
    public function Ecr_Log(string $fic_log, string $req_log, string $mot_log) {
        // $Fic_log= the file name :
        //  => "security" for security maters
        //  => ""
        // $req_log= a phrase describe the infos
        //
        // $mot_log= if "" the Ip is recorded, else extend status infos
        $logfile = storage_path('slogs/'. $fic_log .'.log');

        $fp = fopen($logfile, 'a');
        flock($fp, 2);
        fseek($fp, filesize($logfile));

        if ($mot_log == "") {
            $mot_log = "IP => ". Request::getip();
        }

        $ibid = sprintf("%-10s %-60s %-10s\r\n",
                        date("d/m/Y H:i:s",
                        time()),
                        basename($_SERVER['PHP_SELF'])." => ".strip_tags(urldecode($req_log)), strip_tags(urldecode($mot_log))); // pourquoi urldecode ici ?
        
        fwrite($fp, $ibid);
        flock($fp, 3);
        fclose($fp);
    }

}
