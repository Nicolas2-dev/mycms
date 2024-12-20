<?php

declare(strict_types=1);

namespace Npds\Pollbooth;


/**
 * Undocumented class
 */
class Pollbooth 
{

    /**
     * Instance Pollbooth.
     *
     * @var \Npds\Pollbooth $instance
     */
    protected static Pollbooth $instance;

    /**
     * Constructeur.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get instance class Pollbooth.
     *
     * @return \Npds\Pollbooth $instance
     */
    public static function getInstance()
    {
        if (isset(static::$instance)) {
            return static::$instance;
        }

        return static::$instance = new static();
    }

    /**
     * Bloc Sondage
     * 
     * syntaxe :
     *      function#pollnewest
     *      params#ID_du_sondage OU vide (dernier sondage créé)
     *
     * @param   int   $id  [$id description]
     *
     * @return  void
     */
    public function PollNewest(int $id = 0)
    {
        // snipe : multi-poll evolution
        if ($id != 0) {
            settype($id, "integer");

            list($ibid, $pollClose) = $this->pollSecur($id);

            if ($ibid) {
                pollMain($ibid, $pollClose);
            }

        } elseif ($result = sql_query("SELECT pollID 
                                    FROM " . sql_prefix('poll_data') . " 
                                    ORDER BY pollID 
                                    DESC LIMIT 1")) {

            list($pollID) = sql_fetch_row($result);
            list($ibid, $pollClose) = $this->pollSecur($pollID);

            if ($ibid) {
                pollMain($ibid, $pollClose);
            }
        }
    }

    /**
     * Assure la gestion des sondages membres
     *
     * @param   int|string  $pollID  [$pollID description]
     *
     * @return  array
     */
    private function pollSecur(int|string $pollID)
    {
        global $user;

        $pollClose = '';

        $result = sql_query("SELECT pollType 
                            FROM " . sql_prefix('poll_data') . " 
                            WHERE pollID='$pollID'");
        
        if (sql_num_rows($result)) {
            list($pollType) = sql_fetch_row($result);
            
            $pollClose = (($pollType / 128) >= 1 ? 1 : 0);
            $pollType = $pollType % 128;
            
            if (($pollType == 1) and !isset($user)) {
                $pollClose = 99;
            }
        }

        return array($pollID, $pollClose);
    }

}
