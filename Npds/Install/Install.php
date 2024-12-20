<?php

namespace Npds\Install;


/**
 * Undocumented class
 */
class Install 
{

    /**
     * Instance Install.
     *
     * @var \Npds\Install\Install $instance
     */
    protected static Install $instance;


    /**
     * Constructeur.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get instance class Install.
     *
     * @return \Npds\Install $instance
     */
    public static function getInstance()
    {
        if (isset(static::$instance)) {
            return static::$instance;
        }

        return static::$instance = new static();
    }

    /**
     * [checkInstall description]
     *
     * @return  void
     */
    public static function check()
    {
        if (file_exists("storage/IZ-Xinstall.ok")) {
            if (file_exists("install.php") or is_dir("install")) {
                echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml">
                    <head>
                        <title>NPDS IZ-Xinstall - Installation Configuration</title>
                    </head>
                    <body>
                        <div style="text-align: center; font-size: 20px; font-family: Arial; font-weight: bold; color: #000000"><br />
                            NPDS IZ-Xinstall - Installation &amp; Configuration
                        </div>
                        <div style="text-align: center; font-size: 20px; font-family: Arial; font-weight: bold; color: #ff0000"><br />
                            Vous devez supprimer le r&eacute;pertoire "install" ET le fichier "install.php" avant de poursuivre !<br />
                            You must remove the directory "install" as well as the file "install.php" before continuing!
                        </div>
                    </body>
                </html>';
                die();
            }
        } else {
            if (file_exists("install.php") and is_dir("install")) {
                header("location: install.php");
            }
        }
    }

}
