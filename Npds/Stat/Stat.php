<?php

declare(strict_types=1);

namespace Npds\Stat;

use Npds\Theme\Theme;
use Npds\Support\Sanitize;


/**
 * Class Stat
 */
class Stat 
{

    /**
     * Instance Stat.
     *
     * @var \Npds\Stat\Stat $instance
     */
    protected static Stat $instance;

    /**
     * Instance Theme.
     *
     * @var  Npds\Theme\Theme
     */
    protected Theme $theme;


    /**
     * Constructeur.
     */
    public function __construct()
    {
        $this->theme = Theme::getInstance();
    }

    /**
     * Get instance class Stat.
     *
     * @return \Npds\Stat\Stat $instance
     */
    public static function getInstance()
    {
        if (isset(static::$instance)) {
            return static::$instance;
        }

        return static::$instance = new static();
    }
 
    /**
     * Retourne un tableau contenant les nombres pour les statistiques du site (stats.php)
     *
     * @return  array
     */
    public function req_stat()
    {
        // Les membres
        $result = sql_query("SELECT uid FROM " . sql_prefix('users'));

        $xtab[0] = $result ? (sql_num_rows($result) - 1) : '0';
        if ($result) {
            sql_free_result($result);
        }

        // Les Nouvelles (News)
        $result = sql_query("SELECT sid FROM " . sql_prefix('stories'));

        $xtab[1] = $result ? sql_num_rows($result) : '0';
        if ($result) {
            sql_free_result($result);
        }

        // Les Critiques (Reviews))
        $result = sql_query("SELECT id FROM " . sql_prefix('reviews'));

        $xtab[2] = $result ? sql_num_rows($result) : '0';
        if ($result) {
            sql_free_result($result);
        }

        // Les Forums
        $result = sql_query("SELECT forum_id FROM " . sql_prefix('forums'));

        $xtab[3] = $result ? sql_num_rows($result) : '0';
        if ($result) {
            sql_free_result($result);
        }

        // Les Sujets (topics)
        $result = sql_query("SELECT topicid FROM " . sql_prefix('topics'));
        
        $xtab[4] = $result ? sql_num_rows($result) : '0';
        if ($result) {
            sql_free_result($result);
        }

        // Nombre de pages vues
        $result = sql_query("SELECT count 
                            FROM " . sql_prefix('counter') . " 
                            WHERE type='total'");

        list($totalz) = sql_fetch_row($result);
        $xtab[5] = $totalz++;

        sql_free_result($result);

        return $xtab;
    }

    /**
     * [generatePourcentageAndTotal description]
     *
     * @param   int  $count  [$count description]
     * @param   int  $total  [$total description]
     *
     * @return  array
     */
    public function generatePourcentageAndTotal(int $count, int $total)
    {
        $tab[] = Sanitize::wrh($count);
        $tab[] = substr(sprintf('%f', 100 * $count / $total), 0, 5);
    
        return $tab;
    }

    /**
     * [themeDistinct description]
     *
     * @return  void
     */
    public function themeDistinct()
    {
        $this->theme->themeDistinct();
    }

}
