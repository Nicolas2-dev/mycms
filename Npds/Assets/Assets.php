<?php

namespace Npds\Assets;

use Npds\Config\Config;


/**
 * 
 */
class Assets  
{

    /**
     * Instance Assets.
     *
     * @var \Npds\Assets\Assets  $instance
     */
    protected static Assets  $instance;

    /**
     * [ASSET_PATH description]
     *
     * @var [type]
     */
    const ASSETS_PATH = '/public/assets/';


    /**
     * Constructeur.
     */
    public function __construct()
    {

    }

    /**
     * Get instance class Asset.
     *
     * @return \Npds\Assets\Assets $instance
     */
    public static function getInstance()
    {
        if (isset(static::$instance)) {
            return static::$instance;
        }

        return static::$instance = new static();
    }

    /**
     * Retourne l'url des assetsdu site.
     *
     * @param string $path
     * @return string
     */
    public function url(string $path)
    {
        return Config::get('npds.nuke_url') . static::ASSETS_PATH . ltrim($path, '/');
    }
    
}
