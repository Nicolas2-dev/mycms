<?php

namespace Npds\Cache;


/**
 * Undocumented class
 */
class Cache 
{

    /**
     * Instance Cache.
     *
     * @var \Npds\Cache\Cache $instance
     */
    protected static Cache $instance;


    /**
     * Constructeur.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get instance class Cache.
     *
     * @return \Npds\Cache\Cache $instance
     */
    public static function getInstance()
    {
        if (isset(static::$instance)) {
            return static::$instance;
        }

        return static::$instance = new static();
    }
 
    /**
     * Ces fonctions sont en dehors de la Classe pour permettre un appel sans instanciation d'objet.
     *
     * @param   string  $Xquery     [$Xquery description]
     * @param   int     $retention  [$retention description]
     *
     * @return  array
     */
    public function Q_Select(string $Xquery, int $retention = 3600)
    {
        global $SuperCache, $cache_obj;

        if (($SuperCache) and ($cache_obj)) {
            $row = $cache_obj->CachingQuery($Xquery, $retention);

            return $row;
        } else {
            $result = @sql_query($Xquery);
            
            $tab_tmp = array();

            while ($row = sql_fetch_assoc($result)) {
                $tab_tmp[] = $row;
            }

            return $tab_tmp;
        }
    }

    /**
     * [PG_clean description]
     *
     * @param   string  $request  [$request description]
     *
     * @return  void
     */
    public function PG_clean(string $request)
    {
        global $CACHE_CONFIG;

        $page = md5($request);

        $dh = opendir($CACHE_CONFIG['data_dir']);

        while (false !== ($filename = readdir($dh))) {
            if ($filename === '.' or $filename === '..' or (strpos($filename, $page) === FALSE)) {
                continue;
            }

            unlink($CACHE_CONFIG['data_dir'] . $filename);
        }

        closedir($dh);
    }

    /**
     * [Q_Clean description]
     *
     * @return  void
     */
    public function Q_Clean()
    {
        global $CACHE_CONFIG;

        $dh = opendir($CACHE_CONFIG['data_dir'] . "sql");

        while (false !== ($filename = readdir($dh))) {
            if ($filename === '.' or $filename === '..') {
                continue;
            }

            if (is_file($CACHE_CONFIG['data_dir'] . "sql/" . $filename)) {
                unlink($CACHE_CONFIG['data_dir'] . "sql/" . $filename);
            }
        }

        closedir($dh);

        $fp = fopen($CACHE_CONFIG['data_dir'] . "sql/.htaccess", 'w');

        @fputs($fp, "Deny from All");

        fclose($fp);
    }

    /**
     * [SC_clean description]
     *
     * @return  void
     */
    public function SC_clean()
    {
        global $CACHE_CONFIG;

        $dh = opendir($CACHE_CONFIG['data_dir']);

        while (false !== ($filename = readdir($dh))) {
            if (
                $filename === '.'
                or $filename === '..'
                or $filename === 'ultramode.txt'
                or $filename === 'net2zone.txt'
                or $filename === 'sql'
                or $filename === 'index.html'
            )
                continue;

            if (is_file($CACHE_CONFIG['data_dir'] . $filename)) {
                unlink($CACHE_CONFIG['data_dir'] . $filename);
            }
        }

        closedir($dh);

        $this->Q_Clean();
    }

    /**
     * Indique le status de SuperCache
     *
     * @return  string
     */
    public function SC_infos()
    {
        global $SuperCache, $npds_sc;
         
        if ($SuperCache) {
            // ?? Pourquoi cette ligne et cette variable $npds_sc puisque meme rendue au final !
            if ($npds_sc) {
                return '<span class="small">' . translate(".:Page >> Super-Cache:.") . '</span>';
            } else {
                return '<span class="small">' . translate(".:Page >> Super-Cache:.") . '</span>';
            }
        }
    }

}
