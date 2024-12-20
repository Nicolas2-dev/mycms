<?php

declare(strict_types=1);

namespace Npds\Password;


/**
 * Undocumented class
 */
class Password 
{

    /**
     * Instance Password.
     *
     * @var \Npds\Password $instance
     */
    protected static Password $instance;

    /**
     * Constructeur.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get instance class Password.
     *
     * @return \Npds\Password $instance
     */
    public static function getInstance()
    {
        if (isset(static::$instance)) {
            return static::$instance;
        }

        return static::$instance = new static();
    }

    #autodoc getOptimalBcryptCostParameter($pass, $AlgoCrypt, $min_ms=100) : permet de calculer le coût algorythmique optimum pour la procédure de hashage ($AlgoCrypt) d'un mot de pass ($pass) avec un temps minimum alloué ($min_ms)
    function getOptimalBcryptCostParameter($pass, $AlgoCrypt, $min_ms = 100)
    {
        for ($i = 8; $i < 13; $i++) {
            $calculCost = ['cost' => $i];
            $time_start = microtime(true);

            password_hash($pass, $AlgoCrypt, $calculCost);

            $time_end = microtime(true);

            if (($time_end - $time_start) * 1000 > $min_ms) {
                return $i;
            }
        }
    }

}
