<?php

namespace Npds\Url;


/**
 * Undocumented class
 */
class Url 
{

    /**
     * Instance Url.
     *
     * @var \Npds\Url\Url $instance
     */
    protected static Url $instance;

    /**
     * Constructeur.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get instance class Url.
     *
     * @return \Npds\Url\Url $instance
     */
    public static function getInstance()
    {
        if (isset(static::$instance)) {
            return static::$instance;
        }

        return static::$instance = new static();
    }

    /**
     * Permet une redirection javascript en lieu et place de header("location: ...")
     *
     * @param   string  $urlx  Url destination
     *
     * @return  void 
     */
    public function redirect_url(string $urlx)
    {
        echo "<script type=\"text/javascript\">\n";
        echo "  //<![CDATA[\n";
        echo "      document.location.href='" . $urlx . "';\n";
        echo "  //]]>\n";
        echo "</script>";
    }

}
