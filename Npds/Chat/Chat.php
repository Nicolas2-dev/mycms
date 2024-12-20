<?php

declare(strict_types=1);

namespace Npds\Chat;

use Npds\Block\Block;
use Npds\Cache\Cache;
use Npds\Crypt\Crypt;
use Npds\Http\Request;
use Npds\Security\Hack;
use Npds\Support\Sanitize;


/**
 * Undocumented class
 */
class Chat 
{

    /**
     * Instance Chat.
     *
     * @var \Npds\Chat\Chat $instance
     */
    protected static Chat $instance;

    /**
     * Instance Block.
     *
     * @var  Npds\Block\Block $instance
     */
    protected Block $block;

    /**
     * Instance Crypt.
     *
     * @var  Npds\Crypt\Crypt $instance
     */
    protected Crypt $crypt;

    /**
     * Instance Cache.
     *
     * @var  Npds\Cache\Cache $instance
     */
    protected Cache $cache;
    
    /**
     * Instance Hack.
     *
     * @var  Npds\Security\Hack $instance
     */
    protected Hack $security;


    /**
     * Constructeur.
     */
    public function __construct()
    {
        $this->block = Block::getInstance();

        $this->crypt = Crypt::getInstance();

        $this->cache = Cache::getInstance();

        $this->security = Hack::getInstance();
    }

    /**
     * Get instance class Chat.
     *
     * @return \Npds\Chat $instance
     */
    public static function getInstance()
    {
        if (isset(static::$instance)) {
            return static::$instance;
        }

        return static::$instance = new static();
    }

    /**
     * Retourne le nombre de connecté au Chat.
     *
     * @param   string  $pour  [$pour description]
     *
     * @return  string|int
     */
    public function if_chat(string $pour)
    {
        $auto = $this->block->autorisation_block("params#" . $pour);

        $dimauto = count($auto);

        $numofchatters = 0;

        if ($dimauto <= 1) {
            $result = sql_query("SELECT DISTINCT ip 
                                FROM " . sql_prefix('chatbox') . " 
                                WHERE id='" . $auto[0] . "' 
                                AND date >= " . (time() - (60 * 3)) . "");

            $numofchatters = sql_num_rows($result);
        }

        return $numofchatters;
    }

    /**
     * Insère un record dans la table Chat on utilise id pour filtrer les messages
     *
     * @param   string  $username  [$username description]
     * @param   string  $message   [$message description]
     * @param   int     $dbname    [$dbname description]
     * @param   int     $id        l'id du groupe
     *
     * @return  [type]             [return description]
     */
    public function insertChat(string $username, string $message, int $dbname, int $id)
    {
        if ($message != '') {
            $username = $this->security->remove(stripslashes(Sanitize::FixQuotes(strip_tags(trim($username)))));
            $message =  $this->security->remove(stripslashes(Sanitize::FixQuotes(strip_tags(trim($message)))));

            $ip = Request::getip();

            //settype($id, 'integer');
            //settype($dbname, 'integer');

            sql_query("INSERT INTO " . sql_prefix('chatbox ') . "
                    VALUES ('" . $username . "', '" . $ip . "', '" . $message . "', '" . time() . "', '$id', " . $dbname . ")");
        }
    }

}
