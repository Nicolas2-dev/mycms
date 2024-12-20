<?php

namespace Npds\Filesystem;


/**
 * Undocumented class
 */
class FileSystem 
{

    /**
     * Instance FileSystem.
     *
     * @var \Npds\FileSystem\FileSystem $instance
     */
    protected static FileSystem $instance;


    /**
     * Constructeur.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get instance class FileSystem.
     *
     * @return \Npds\FileSystem $instance
     */
    public static function getInstance()
    {
        if (isset(static::$instance)) {
            return static::$instance;
        }

        return static::$instance = new static();
    } 

    /**
     * Controle de réponse c'est pas encore assez fin
     *
     * @param   string  $url            [$url description]
     * @param   int     $response_code  [$response_code description]
     *
     * @return  bool
     */
    public function file_contents_exist(string $url, int $response_code = 200)
    {
        $headers = get_headers($url);

        if (substr($headers[0], 9, 3) == $response_code) {
            return true;
        } else {
            return false;
        }
    }

}
