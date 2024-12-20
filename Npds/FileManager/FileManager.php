<?php

declare(strict_types=1);

namespace Npds\FileManager;

use Npds\Config\Config;


/**
 * Undocumented class
 */
class FileManager 
{

    /**
     * Instance Filemanager.
     *
     * @var \Npds\FileManager\fileManager $instance
     */
    protected static FileManager $instance;

    /**
     * Filemanager.
     * 
     * @var $filemanager
     */
    protected bool $filemanager = false;


    /**
     * Constructeur.
     */
    public function __construct()
    {
        if ($config = $this->loadConfig()) {
            $this->filemanager = $config['filemanager'];
        }
    }

    /**
     * Get instance class Filemanager.
     *
     * @return \Npds\FileManager\FileManager $instance
     */
    public static function getInstance()
    {
        if (isset(static::$instance)) {
            return static::$instance;
        }

        return static::$instance = new static();
    } 

    /**
     * Load configuration filmanager.
     *
     * @return bool|array
     */
    public function loadConfig()
    {
        if (Config::has('fileManager')) {
            return Config::get('fileManager');
        }

        return false;
    }

    /**
     * Return l'état du filemanger.
     *
     * @return bool
     */
    public function getStatus()
    {
        return $this->filemanager;
    }
    
    /**
     * Modification de l'état du filemanager
     *
     * @param bool $statut
     * @return void
     */
    public function setStatut(bool $statut)
    {
        $this->filemanager = $statut;
    }

}
